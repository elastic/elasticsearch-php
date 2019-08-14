<?php
/**
* Generate parameter docs
*
* @author Enrico Zimuel (enrico.zimuel@elastic.co)
*/
declare(strict_types = 1);

use GitWrapper\GitWrapper;

require_once dirname(__DIR__) . '/vendor/autoload.php';

if (!isset($argv[1])) {
    print_usage_msg();
    exit(1);
}
$version = 'v' . $argv[1];

$gitWrapper = new GitWrapper();
$git = $gitWrapper->workingCopy(dirname(__DIR__) . '/util/elasticsearch');

$git->run('fetch', ['--tags']);
$tags = explode("\n", $git->run('tag'));
if (!in_array($version, $tags)) {
    printf("Error: the version %s specified doesnot exist\n", $version);
    exit(1);
}

$git->run('checkout', [$version]);

$result = $git->run(
    'ls-files',
    [ "rest-api-spec/src/main/resources/rest-api-spec/api/*.json" ]
);
$files = explode("\n", $result);
$endpoints = [];
foreach ($files as $file) {
    if (empty($file)) {
        continue;
    }
    $endpoints[] = basename($file, '.json');
}
foreach ($files as $file) {
    if (empty($file)) {
        continue;
    }
    $endpoint = basename($file, '.json');
    if ($endpoint === '_common') {
        continue;
    }

    try {
        $json = json_decode(
            $git->run('show', [':' . trim($file)]),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    } catch (JsonException $e) {
        printf("Error: %s\n", $e->getMessage());
        exit(1);
    }

    echo renderComment($json[$endpoint], $endpoint);
    printf("\n");
}

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check (e.g. 7.0.0)\n");
}

function renderComment(array $json, string $endpoint): string
{
    if (!isset($json['url']['params']) && !isset($json['url']['parts'])) {
        return '';
    }
    $space = getMaxLengthBodyPartsParams($json);

    $result = "/**\n";
    $result .= " * Endpoint: $endpoint\n";
    $result .= " *\n * @see {$json['documentation']}\n *\n";

    $params  = " * \$params[\n";
    $values  = extractBody($json, $space);
    $values .= extractParts($json, $space);
    $values .= extractParams($json, $space);
    $params .= $values . " * ]\n */\n";

    if (empty($values)) {
        return $result . " */\n";
    }
    return $result . $params;
}

function extractBody(array $json, int $space): string
{
    if (isset($json['body']) && isset($json['body']['description'])) {
        return sprintf(
            " *   'body' %s=> '(string) %s%s',\n",
            str_repeat(' ', $space - 4),
            $json['body']['description'],
            isset($json['body']['required']) && $json['body']['required'] ? ' (Required)' : ''
        );
    }
    return '';
}

function extractParts(array $json, int $space): string
{
    $result = '';
    if (!isset($json['url']['parts'])) {
        return $result;
    }
    foreach ($json['url']['parts'] as $part => $values) {
        $result .= sprintf(
            " *   '%s' %s=> '(%s) %s%s',\n",
            $part,
            str_repeat(' ', $space - strlen($part)),
            $values['type'],
            $values['description'],
            isset($values['required']) && $values['required'] ? ' (Required)' : ''
        );
    }
    return $result;
}

function extractParams(array $json, int $space): string
{
    $result = '';
    if (!isset($json['url']['params'])) {
        return $result;
    }
    foreach ($json['url']['params'] as $param => $values) {
        $result .= sprintf(
            " *   '%s' %s=> '(%s) %s%s%s%s',\n",
            $param,
            str_repeat(' ', $space - strlen($param)),
            $values['type'],
            $values['description'],
            isset($values['required']) && $values['required'] ? ' (Required)' : '',
            isset($values['options']) ? sprintf(" (Options = %s)", implode(',', $values['options'])) : '',
            isset($values['default']) ? sprintf(" (Default = %s)", $values['type'] === 'boolean' ? ($values['default'] ? 'true' : 'false') : $values['default']) : ''
        );
    }
    return $result;
}

function getMaxLengthBodyPartsParams(array $json): int
{
    $max = isset($json['body']) ? 4 : 0;
    if (isset($json['url']['parts'])) {
        foreach ($json['url']['parts'] as $part => $values) {
            if (strlen($part) > $max) {
                $max = strlen($part);
            }
        }
    }
    if (isset($json['url']['params'])) {
        foreach ($json['url']['params'] as $param => $values) {
            if (strlen($param) > $max) {
                $max = strlen($param);
            }
        }
    }
    return $max;
}
