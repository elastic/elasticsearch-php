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

require 'vendor/autoload.php';

use Elastic\Elasticsearch\Tests\BuildUnitTest;

const TEST_TO_SKIP = 'test_to_skip.php';

function isFolderEmpty(string $folder): bool {
    $files = scandir($folder);
    // scandir returns at least '.' and '..' even if folder is empty
    return count($files) === 2;
}

/**
 * Remove the _ froma string converting all the words in uppercase
 */
function normalizeName(string $item): string
{
    return ucfirst(str_replace('_', '', ucwords($item, '_')));
}

const TEST_GROUP = ['serverless', 'stack'];

if ($argc < 4) {
    printf("Usage: php %s <test-folder> <group> <output-folder>\n\n", basename(__FILE__));
    printf("where <test-folder> is the directory containing the elasticsearch-client-tests,\n");
    printf("<group> if the test group: serverless or stack\n");
    printf("and <output-folder> is the output folder containing the PHPUnit tests generated.\n");
    exit(1);
}
if ($argv[1][0] !== '/') {
    $testFolder = sprintf("%s/%s", getcwd(), $argv[1]);
}
if (!is_dir($testFolder)) {
    printf("Error: the folder %s does not exist!\n", $testFolder);
    exit(1);
}

$testGroup = strtolower($argv[2]);
if (!in_array($testGroup, ['serverless', 'stack'])) {
    printf("Error: the test group %s is not valid, it must be one of [%s]\n", implode(',', TEST_GROUP));
    exit(1);
}

if ($argv[1][0] !== '/') {
    $outputFolder = sprintf("%s/%s", getcwd(), $argv[3]);
}
if (!is_dir($outputFolder)) {
    mkdir($outputFolder);
}
if (!isFolderEmpty($outputFolder)) {
    printf("Error: the folder %s exists and it's not empty!\n", $outputFolder);
    exit(1);
}

$testToSkip = [];
if (is_file(__DIR__ . '/' . TEST_TO_SKIP)) {
    $testToSkip = require __DIR__ . '/' . TEST_TO_SKIP;
}

$it = new RecursiveDirectoryIterator($testFolder);
// Iterate over the Yaml test files
foreach (new RecursiveIteratorIterator($it) as $file) {


    // Check for folder and create a new one in $outputFolder
    if ($file->isDir()) {
        continue;
    }

    if ($file->getExtension() !== 'yml') {
        continue;
    }

    // Check for test to be skipped
    $relativePath = substr($file->getPathname(), strlen($testFolder)+1);
    if (in_array($relativePath, $testToSkip)) {
        printf("Skipped: %s\n", $file->getPathname());
        continue;
    }

    $folderName = normalizeName(basename(dirname($file->getPathname())));
    $unitTestFolder = $folderName === 'Tests' ? $outputFolder : sprintf("%s/%s", $outputFolder, $folderName);
    if (!is_dir($unitTestFolder)) {
        mkdir($unitTestFolder);
    }
    $namespace = $folderName === 'Tests' ? basename($outputFolder) : sprintf("%s\%s", basename($outputFolder), $folderName);
    $test = new BuildUnitTest($file->getPathname(), $testGroup, $namespace);
    $unitTest = $test->build();
    if (empty($unitTest)) {
        printf("Skipped (not %s): %s\n", $testGroup, $file->getPathname());
        continue;
    }
    $phpCode = (string) $unitTest;
    $classes = $unitTest->getClasses();
    $testFileName = sprintf("%s/%s.php", $unitTestFolder, key($classes));
    file_put_contents($testFileName, sprintf("<?php\n%s", $phpCode));
    // Check for PHP syntax
    try {
        eval($phpCode);
    } catch (ParseError $e) {
        throw new Exception(sprintf(
            "The PHP code generate for %s is not valid: %s",
            $file->getPathname(),
            $e->getMessage()
        ));
    }
}