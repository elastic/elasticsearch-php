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

use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\NoNodesAvailableException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Util\ClientEndpoint;
use Elasticsearch\Util\Endpoint;
use Elasticsearch\Util\NamespaceEndpoint;
use Elasticsearch\Tests\Utility;

require_once dirname(__DIR__) . '/vendor/autoload.php';

try {
    $client = Utility::getClient();
} catch (RuntimeException $e) {
    printf("ERROR: I cannot find STACK_VERSION and TEST_SUITE environment variables\n");
    exit(1);
}

try {
    $serverInfo = $client->info();
} catch (NoNodesAvailableException $e) {
    printf ("ERROR: Host %s is offline\n", Utility::getHost());
    exit(1);
}
$version = $serverInfo['version']['number'];
$buildHash = $serverInfo['version']['build_hash']; 

if (version_compare($version, '7.4.0', '<')) {
    printf("Error: the ES version must be >= 7.4.0\n");
    exit(1);
}

$backupFileName = sprintf(
    "%s/backup_endpoint_namespace_%s.zip", 
    __DIR__,
    Client::VERSION
);

printf ("Backup Endpoints and Namespaces in:\n%s\n", $backupFileName);
backup($backupFileName);

$start = microtime(true);
printf ("Generating endpoints for Elasticsearch\n");

$success = true;
// Check if the rest-spec folder with the build hash exists
if (!is_dir(sprintf("%s/rest-spec/%s", __DIR__, $buildHash))) {
    printf("ERROR: I cannot find the rest-spec for build hash %s\n", $buildHash);
    printf("You need to execute 'php util/RestSpecRunner.php'\n");
    exit(1);
}

$files = glob(sprintf("%s/rest-spec/%s/rest-api-spec/api/*.json", __DIR__, $buildHash));

$outputDir = __DIR__ . "/output";
if (!file_exists($outputDir)) {
    mkdir($outputDir);
}

$endpointDir = "$outputDir/Endpoints/";
if (!file_exists($endpointDir)) {
    mkdir($endpointDir);
}

$countEndpoint = 0;
$namespaces = [];

// Generate endpoints
foreach ($files as $file) {
    if (empty($file) || (basename($file) === '_common.json')) {
        continue;
    }
    printf("Generating %s...", basename($file));

    $endpoint = new Endpoint($file, file_get_contents($file), $version, $buildHash);

    $dir = $endpointDir . NamespaceEndpoint::normalizeName($endpoint->namespace);
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    $outputFile = sprintf("%s/%s.php", $dir, $endpoint->getClassName());
    file_put_contents(
        $outputFile,
        $endpoint->renderClass()
    );
    if (!isValidPhpSyntax($outputFile)) {
        printf("Error: syntax error in %s\n", $outputFile);
        exit(1);
    }

    printf("done\n");

    $namespaces[$endpoint->namespace][] = $endpoint;
    $countEndpoint++;
}

// Generate namespaces
$namespaceDir = "$outputDir/Namespaces/";
if (!file_exists($namespaceDir)) {
    mkdir($namespaceDir);
}

$countNamespace = 0;
$clientFile = "$outputDir/Client.php";

foreach ($namespaces as $name => $endpoints) {
    if (empty($name)) {
        $clientEndpoint = new ClientEndpoint(array_keys($namespaces), $version, $buildHash);
        foreach ($endpoints as $ep) {
            $clientEndpoint->addEndpoint($ep);
        }
        file_put_contents(
            $clientFile,
            $clientEndpoint->renderClass()
        );
        if (!isValidPhpSyntax($clientFile)) {
            printf("Error: syntax error in %s\n", $clientFile);
            exit(1);
        }
        $countNamespace++;
        continue;
    }
    $namespace = new NamespaceEndpoint($name, $version, $buildHash);
    foreach ($endpoints as $ep) {
        $namespace->addEndpoint($ep);
    }
    $namespaceFile = $namespaceDir . $namespace->getNamespaceName() . 'Namespace.php';
    file_put_contents(
        $namespaceFile,
        $namespace->renderClass()
    );
    if (!isValidPhpSyntax($namespaceFile)) {
        printf("Error: syntax error in %s\n", $namespaceFile);
        exit(1);
    }
    $countNamespace++;
}

$destDir = __DIR__ . "/../src/Elasticsearch";

printf("Copying the generated files to %s\n", $destDir);
cleanFolders();
moveSubFolder($outputDir . "/Endpoints", $destDir . "/Endpoints");
moveSubFolder($outputDir . "/Namespaces", $destDir . "/Namespaces");
rename($outputDir . "/Client.php", $destDir . "/Client.php");

$end = microtime(true);
printf("\nGenerated %d endpoints and %d namespaces in %.3f seconds\n", $countEndpoint, $countNamespace, $end - $start);
printf("\n");

removeDirectory($outputDir);

/**
 * ---------------------------------- FUNCTIONS ----------------------------------
 */

/**
 * Remove a directory recursively
 */
function removeDirectory($directory, array $omit = [])
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            if (!in_array($file, $omit)) {
                removeDirectory($file, $omit);
            }
        } else {
            if (!in_array($file, $omit)) {
                @unlink($file);
            }
        }
    }
    if (is_dir($directory)) {
        @rmdir($directory);
    }
}

/**
 * Remove Endpoints, Namespaces and Client in src/Elasticsearch
 */
function cleanFolders()
{
    removeDirectory(__DIR__ . '/../src/Elasticsearch/Endpoints', [
        __DIR__ . '/../src/Elasticsearch/Endpoints/AbstractEndpoint.php',
    ]);
    removeDirectory(__DIR__ . '/../src/Elasticsearch/Namespaces', [
        __DIR__ . '/../src/Elasticsearch/Namespaces/AbstractNamespace.php',
        __DIR__ . '/../src/Elasticsearch/Namespaces/BooleanRequestWrapper.php',
        __DIR__ . '/../src/Elasticsearch/Namespaces/NamespaceBuilderInterface.php'
    ]);
    @unlink(__DIR__ . '/../src/Elasticsearch/Client.php');
}

/**
 * Move subfolder
 */
function moveSubFolder(string $origin, string $destination)
{
    foreach (glob("{$origin}/*") as $file) {
        rename($file, $destination . "/" . basename($file));
    }
}

/**
 * Backup Endpoints, Namespaces and Client in src/Elasticsearch
 */
function backup(string $fileName)
{
    $zip = new ZipArchive();
    $result = $zip->open($fileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    if ($result !== true) {
        printf("Error opening the zip file %s: %s\n", $fileName, $result);
        exit(1);
    } else {
        $zip->addFile(__DIR__ . '/../src/Elasticsearch/Client.php', 'Client.php');
        $zip->addGlob(__DIR__ . '/../src/Elasticsearch/Namespaces/*.php', GLOB_BRACE, [ 
            'remove_path' => __DIR__ . '/../src/Elasticsearch'
        ]);
        // Add the Endpoints (including subfolders)
        foreach(glob(__DIR__ . '/../src/Elasticsearch/Endpoints/*') as $file) {
            if (is_dir($file)) {
                $zip->addGlob("$file/*.php", GLOB_BRACE, [ 
                    'remove_path' => __DIR__ . '/../src/Elasticsearch'
                ]);
            } else {
                $zip->addGlob("$file", GLOB_BRACE, [ 
                    'remove_path' => __DIR__ . '/../src/Elasticsearch'
                ]);
            }
        }
        $zip->close();
    }
}

/**
 * Restore Endpoints, Namespaces and Client in src/Elasticsearch
 */
function restore(string $fileName)
{
    $zip = new ZipArchive();
    $result = $zip->open($fileName);
    if ($result !== true) {
        printf("Error opening the zip file %s: %s\n", $fileName, $result);
        exit(1);
    }
    $zip->extractTo(__DIR__ . '/../src/Elasticsearch');
    $zip->close();
}

/**
 * Check if the generated code has a valid PHP syntax
 */
function isValidPhpSyntax(string $filename): bool
{
    if (file_exists($filename)) {
        $result = exec("php -l $filename");
        return false !== strpos($result, "No syntax errors");
    }
    return false;
}