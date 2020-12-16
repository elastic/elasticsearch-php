<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */

declare(strict_types = 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Elasticsearch\Common\Exceptions\ElasticsearchException;

$fileToParse = require 'examples_to_parse.php';
if (empty($fileToParse)) {
    die('There are no code example to convert, please check the file "examples_to_parse.php"');
}

$start = microtime(true);
if (!isset($argv[1])) {
    printUsageMsg();
    exit(1);
}
printf("----\nGENERATE DOC EXAMPLES\n----\n");

if (!file_exists($argv[1])) {
    die('The file specified does not exist!');
}
printf("Reading specification from %s\n", $argv[1]);
try {
    $spec = json_decode(file_get_contents($argv[1]), true);
} catch (JsonException $e) {
    throw new Exception(sprintf(
        "The json file %s contains an error: %s\n",
        $argv[1],
        $e->getMessage()
    ));
}

$parsed = 0;
$langs = [];
$digests = [];

printf("Removing asciidoc from %s/docs/examples\n", dirname(__DIR__));
removeAllFiles(dirname(__DIR__) . '/docs/examples/*.asciidoc');

printf("Output folder: %s/docs/examples\n\n", dirname(__DIR__));
foreach ($spec as $source) {
    if ($source['lang'] !== 'console') {
        continue;
    }
    // count the digests
    if (!isset($digests[$source['digest']])) {
        $digests[$source['digest']] = [];
    }
    $digests[$source['digest']][] = $source['source_location']['file'];
    // take stats about languages
    foreach ($source['found'] as $l) {
        if (!isset($langs[$l])) {
            $langs[$l] = 0;
        }
        $langs[$l]++;
    }
    if (!in_array($source['source_location']['file'], $fileToParse)) {
        continue;
    }
    
    printf("Reading source: %s\n", $source['source_location']['file']);
    $head = sprintf("// %s:%d\n", $source['source_location']['file'], $source['source_location']['line']);
    $head .= "\n[source, php]\n----\n";

    $code = getClientSourceCode($source['parsed_source']);
    checkIfCodeHasValidSyntax($code);

    $exampleFile = sprintf("%s/docs/examples/%s.asciidoc", dirname(__DIR__), $source['digest']);
    file_put_contents($exampleFile, $head . $code . "----\n");
    printf("File generated: %s.asciidoc\n", $source['digest']);
    $parsed++;
}
$end = microtime(true);

// Count only the digests to prevent double count in code examples
$tot = count($digests);

printf("\nLanguage statistics:\n");
foreach ($langs as $lang => $num) {
    printf("%-8s: %4d (%.2f%% completed)\n", $lang, $num, (100/$tot)*$num);
}
printf("\n");

printf("Total source examples: %d\n", $tot);
printf("Generated %d source examples in %.3f seconds\n", $parsed, $end - $start);

// END 

/**
 * Generate the client source code from the parsed_source field
 */
function getClientSourceCode(array $parsedSource): string
{
    $tab4 = str_repeat(' ', 4);
    $code = '';
    foreach ($parsedSource as $source) {
        if (isset($source['params']) || isset($source['body'])) {
            $code .= '$params = [' . "\n";
            $code .= prettyPrintArray($source['params'] ?? [], 4);
            if (isset($source['body'])) {
                $code .= sprintf("%s'body' => [\n", $tab4);
                $code .= prettyPrintArray($source['body'], 8);
                $code .= sprintf("%s],\n", $tab4);
            }
            $code .= "];\n";
        }
        $code .= '$response = $client->' . normalizeApiName($source['api']);
        $code .= empty($source['params']) && empty($source['body']) ? '();' : '($params);';
        $code .= "\n";
    }
    return $code;
}

/**
 * Print an associative array as source code
 * Note: it removes the number keys in scalar array
 */
function prettyPrintArray(array $input, int $space): string
{
    $output = '';
    $tab = str_repeat(' ', $space);
    foreach ($input as $key => $value) {
        if (is_int($key)) {
            $output .= sprintf("%s", $tab);
        } else {
            $output .= sprintf("%s'%s' => ", $tab, $key);
        }
        if (is_array($value)) {
            $output .= "[\n";
            $output .= prettyPrintArray($value, $space + 4);
            $output .= sprintf("%s],\n", $tab);
        } else {
            if (is_string($value)) {
                $value = "'" . str_replace("'", "\'", $value) . "'";
            } if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
            $output .= sprintf("%s,\n", $value);
        }
    }
    return $output;
}

/**
 * Normalize the api name for invoking the equivalent endpoint
 */
function normalizeApiName(string $api): string
{
    $result = str_replace('_', '', lcfirst(ucwords($api, '_')));
    return str_replace('.', '()->', $result);
}

/**
 * Check if the generated code has a valid PHP syntax using Elasticsearch\Client
 */
function checkIfCodeHasValidSyntax(string $code): void
{
    $script = sprintf("require_once '%s/vendor/autoload.php';\n", dirname(__DIR__));
    $script .= '$client = Elasticsearch\ClientBuilder::create()->build();' . "\n";
    try {
        eval($script . $code);
    } catch (ElasticsearchException $e) {
    } catch (Error $e) {
        throw new Exception(sprintf(
            "The generated code:\n%s\nhas the following parse error:\n%s",
            $code,
            $e->getMessage()
        ));
    }
}

/**
 * Remove all files in a folder
 */
function removeAllFiles(string $folder): void
{
    $files = glob($folder); 
    foreach($files as $file) { 
        if(is_file($file)) {
            unlink($file); 
        }
    }
}

/**
 * Print the usage message in console
 */
function printUsageMsg(): void
{
    printf("Usage: php %s <PATH_TO_JSON>\n", basename(__FILE__));
    printf("where <PATH_TO_JSON> is the `alternatives_report.spec.json` path file\n");
}
