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

use GitWrapper\GitWrapper;
use Elasticsearch\Util\ClientEndpoint;
use Elasticsearch\Util\Endpoint;
use Elasticsearch\Util\NamespaceEndpoint;
use Elasticsearch\Tests\Utility;

require_once dirname(__DIR__) . '/vendor/autoload.php';



removeDirectory(__DIR__ . '/../src/Elasticsearch/Endpoints', [
    __DIR__ . '/../src/Elasticsearch/Endpoints/AbstractEndpoint.php',
]);
removeDirectory(__DIR__ . '/../src/Elasticsearch/Namespaces', [
    __DIR__ . '/../src/Elasticsearch/Namespaces/AbstractNamespace.php',
    __DIR__ . '/../src/Elasticsearch/Namespaces/BooleanRequestWrapper.php',
    __DIR__ . '/../src/Elasticsearch/Namespaces/NamespaceBuilderInterface.php'
]);

die();
printf ("Generating endpoints for Elasticsearch\n");
printf ("---\n");

$start = microtime(true);

$client = Utility::getClient();

$serverInfo = $client->info();
$version = $serverInfo['version']['number'];
$buildHash = $serverInfo['version']['build_hash']; 

if (version_compare($version, '7.4.0', '<')) {
    printf("Error: the ES version must be >= 7.4.0\n");
    exit(1);
}

$gitWrapper = new GitWrapper();
$git = $gitWrapper->workingCopy(dirname(__DIR__) . '/util/elasticsearch');

$git->run('checkout', [$buildHash]);
$result = $git->run(
    'ls-files',
    [
        "rest-api-spec/src/main/resources/rest-api-spec/api/*.json",
        "x-pack/plugin/src/test/resources/rest-api-spec/api/*.json"
    ]
);
$files = explode("\n", $result);
$outputDir = __DIR__ . "/output/$version";

// Remove the output directory
printf ("Removing %s folder\n", $outputDir);
removeDirectory($outputDir);
mkdir($outputDir);

$endpointDir = "$outputDir/Endpoints/";
printf ("Creating folder %s\n", $endpointDir);
mkdir ($endpointDir);

$countEndpoint = 0;
$namespaces = [];

// Generate endpoints
foreach ($files as $file) {
    if (empty($file) || (basename($file) === '_common.json')) {
        continue;
    }
    printf("Generation %s...", basename($file));

    $endpoint = new Endpoint($file, $git->run('show', [':' . trim($file)]), $version);

    $dir = $endpointDir . NamespaceEndpoint::normalizeName($endpoint->namespace);
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    file_put_contents(
        sprintf("%s/%s.php", $dir, $endpoint->getClassName()),
        $endpoint->renderClass()
    );

    printf("done\n");

    $namespaces[$endpoint->namespace][] = $endpoint;
    $countEndpoint++;
}

// Generate namespaces
$namespaceDir = "$outputDir/Namespaces/";
printf ("Creating folder %s\n", $namespaceDir);
mkdir($namespaceDir);

$countNamespace = 0;
$clientFile = "$outputDir/Client.php";

foreach ($namespaces as $name => $endpoints) {
    if (empty($name)) {
        $clientEndpoint = new ClientEndpoint(array_keys($namespaces), $version);
        foreach ($endpoints as $ep) {
            $clientEndpoint->addEndpoint($ep);
        }
        file_put_contents(
            $clientFile,
            $clientEndpoint->renderClass()
        );
        $countNamespace++;
        continue;
    }
    $namespace = new NamespaceEndpoint($name, $version);
    foreach ($endpoints as $ep) {
        $namespace->addEndpoint($ep);
    }
    file_put_contents(
        $namespaceDir . $namespace->getNamespaceName() . 'Namespace.php',
        $namespace->renderClass()
    );
    $countNamespace++;
}

# Clean
$end = microtime(true);
printf("\nGenerated %d endpoints and %d namespaces in %.3f seconds\n.", $countEndpoint, $countNamespace, $end - $start);
printf ("---\n");

printf("Backup Endpoints and Namespaces in /src");

$file = Client::Version;

$zip = new ZipArchive();
$ret = $zip->open('application.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
if ($ret !== TRUE) {
    printf('Failed with code %d', $ret);
} else {
    $options = array('add_path' => 'sources/', 'remove_all_path' => TRUE);
    $zip->addGlob('*.{php,txt}', GLOB_BRACE, $options);
    $zip->close();
}
// End

function print_usage_msg(): void
{
    printf("Usage: php %s <ES_VERSION>\n", basename(__FILE__));
    printf("where <ES_VERSION> is the Elasticsearch version to check (version must be >= 7.4.0).\n");
}

// Remove directory recursively
function removeDirectory($directory, array $omit = [])
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            if (!in_array($file, $omit)) {
                //removeDirectory($file);
                printf("Elimino directory %s\n", $file);
            }
        } else {
            if (!in_array($file, $omit)) {
                //unlink($file);
                printf("Elimino file %s\n", $file);
            }
        }
    }
    if (is_dir($directory) && empty($omit)) {
        //rmdir($directory);
        printf("Elimino directory %s\n", $directory);
    }
}

# Copy files and directory recursively
function copyAll(string $src, string $dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                copyAll($src . '/' . $file, $dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 