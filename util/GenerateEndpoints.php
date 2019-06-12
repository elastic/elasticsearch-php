<?php
/**
* Generate the API endpoints
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

    printf("Endpoint: %s ...", $endpoint);
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

    printf("%s\n", getFilePathByEndpoint($endpoint, $endpoints));
    continue;

    if (preg_match('/^[a-z]+$/', $endpoint)) {
        $class = file_get_contents(__DIR__ . '/EndpointClassSkeleton');
        $class = str_replace(':params', extractParameters($json[$endpoint]), $class);
        $class = str_replace(':endpoint', ucfirst($endpoint), $class);
        $class = str_replace(':method', $json[$endpoint]['methods'][0], $class);
        file_put_contents(__DIR__ . '/Endpoints/'. ucfirst($endpoint) . '.php', $class);
    } elseif (preg_match('/^[a-z]+\.')) {

    }
    printf(" done\n");
}

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check (e.g. 7.0.0)\n");
}

function extractParameters(array $json): string
{
    if (!isset($json['url']['params'])) {
        return '';
    }
    $tab = str_repeat(' ', 12);
    $result = '';
    foreach (array_keys($json['url']['params']) as $param) {
        $result .=  "'$param'," . "\n" . $tab;
    }
    return rtrim(trim($result), ',');
}

function getFilePathByEndpoint(string $endpoint, array $endpoints): string
{
    if (preg_match('/^[a-z]+$/', $endpoint)) {
        return ucfirst($endpoint);
    } elseif (preg_match('/^(([a-z]+)\_)+([a-z]+)$/', $endpoint, $matches)) {
        $result = '';
        for($i=1; $i<count($matches); $i++) {
            $result .= ucfirst($matches[$i]);
        }
        return $result;
    } elseif (preg_match('/^([a-z]+)\.([a-z]+)$/', $endpoint, $matches)) {
        return ucfirst($matches[1]) . '/' . ucfirst($matches[2]);
    } elseif (preg_match('/^([a-z]+)\.([a-z]+)\_([a-z]+)$/', $endpoint, $matches)) {
        return areMoreEndpointStartAndEndBy($matches[1], $matches[3], $endpoints)
            ? ucfirst($matches[1]) . '/' . ucfirst($matches[3]) . '/' . ucfirst($matches[2])
            : ucfirst($matches[1]) . '/' . ucfirst($matches[2]) . ucfirst($matches[3]);
    }
    return '';
}

function areMoreEndpointStartAndEndBy(string $start, string $end, array $endpoints): bool
{
    $i = 0;
    foreach ($endpoints as $ep) {
        if (preg_match('/^' . $start . '\.[a-z]+\_' . $end . '$/', $ep)) {
            $i++;
        }
        if ($i > 1) {
            return true;
        }
    }
    return false;
}
