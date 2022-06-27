<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

use Elastic\Transport\Exception\NoNodeAvailableException;
use Elastic\Elasticsearch\Util\YamlTests;
use Elastic\Elasticsearch\Tests\Utility;

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $client = Utility::getClient();
} catch (RuntimeException $e) {
    printf("ERROR: I cannot find STACK_VERSION and TEST_SUITE environment variables\n");
    exit(1);
}

try {
    $serverInfo = $client->info();
} catch (NoNodeAvailableException $e) {
    printf ("ERROR: Host %s is offline\n", Utility::getHost());
    exit(1);
}
$version = $serverInfo['version']['number'];
$buildHash = $serverInfo['version']['build_hash']; 

// Check if the rest-spec folder with the build hash exists
if (!is_dir(sprintf("%s/rest-spec/%s", __DIR__, $buildHash))) {
    printf("ERROR: I cannot find the rest-spec for build hash %s\n", $buildHash);
    printf("You need to execute 'php util/RestSpecRunner.php'\n");
    exit(1);
}

$stack = getenv('TEST_SUITE');
printf ("*****************************************\n");
printf ("** Bulding YAML tests for %s suite\n", strtoupper($stack));
printf ("*****************************************\n");
printf ("Using Elasticsearch %s version\n", $version);
printf ("With build hash %s\n", $buildHash);

$yamlOutputTest = __DIR__ . '/../tests/Yaml';
$yamlTestFolder = sprintf("%s/rest-spec/%s/rest-api-spec/test/%s", __DIR__, $buildHash, strtolower($stack));

$test = new YamlTests($yamlTestFolder, $yamlOutputTest, $version, $stack);
$result = $test->build();

printf ("Generated %d PHPUnit files and %d tests.\n", $result['files'], $result['tests']);
printf ("Files saved in %s\n", realpath($yamlOutputTest . '/' . ucfirst($stack)));
printf ("\n");
