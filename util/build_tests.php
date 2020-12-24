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

use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Util\YamlTests;
use Elasticsearch\Tests\Utility;

require __DIR__ . '/../vendor/autoload.php';

if (!isset($argv[2])) {
    printf ("Usage: php %s <ES_VERSION> <TEST_SUITE>\n", $argv[0]);
    printf ("where <ES_VERSION> is Elasticsearch semantic version and <TEST_SUITE> is 'oss' or 'xpack'\n");
    exit(1);
}
$version = $argv[1];
if (false !== strpos($version, '.x')) {
    $client = Utility::getClient();
    try {
        $result = $client->info();
        $version = $result['version']['number'] ?? '';
    } catch (ElasticsearchException $e) {
        printf ("The %s specified is not a valid semantic version number.\n", $version);
        exit(1);
    }
}
$version = str_replace('-snapshot', '', strtolower($version));

if (!version_compare($version, '0.0.1', '>=')) {
    printf ("The argument <ES_VERSION> should be a valid semantic version number\n");
    exit(1);
}

$stack = $argv[2];
if (!in_array($argv[2], ['oss', 'xpack'])) {
    printf ("The argument <TEST_SUITE> should be 'oss' or 'xpack'\n");
    exit(1);
}
printf ("*****************************************\n");
printf ("** Bulding YAML tests for %s suite\n", strtoupper($stack));
printf ("*****************************************\n");
printf ("Using %s version for Elasticsearch\n", $version);

$yamlOutputTest = __DIR__ . '/../tests/Elasticsearch/Tests/Yaml';
$yamlTestFolder = strtolower($stack) === 'oss'
    ? __DIR__ . '/elasticsearch/rest-api-spec/src/main/resources/rest-api-spec/test'
    : __DIR__ . '/elasticsearch/x-pack/plugin/src/test/resources/rest-api-spec/test';

$test = new YamlTests($yamlTestFolder, $yamlOutputTest, $version, $stack);
$result = $test->build();

printf("Generated %d PHPUnit files and %d tests.\n", $result['files'], $result['tests']);
printf("Files saved in %s\n", realpath($yamlOutputTest . '/' . ucfirst($stack)));