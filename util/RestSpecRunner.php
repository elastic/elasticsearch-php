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
use Elastic\Elasticsearch\Tests\Utility;

// Set the default timezone. While this doesn't cause any tests to fail,
// PHP can complains if it is not set in 'date.timezone' of php.ini.
date_default_timezone_set('UTC');

require dirname(__DIR__) . '/vendor/autoload.php';

printf("********************************************************\n");
printf("** Download the YAML test from Elasticsearch artifacts\n");
printf("********************************************************\n");
printf("Executing %s...\n", basename(__FILE__));

$client = Utility::getClient();

printf ("Getting the Elasticsearch build_hash:\n");
try {
    $serverInfo = $client->info();
    print_r($serverInfo->asArray());
} catch (NoNodeAvailableException $e) {
    printf ("ERROR: Host %s is offline\n", Utility::getHost());
    exit(1);
}
$version = $serverInfo['version']['number'];

$artifactFile = sprintf("rest-resources-zip-%s.zip", $version);
$buildHash = $serverInfo['version']['build_hash'];
$tempFilePath = sprintf("%s/%s.zip", sys_get_temp_dir(), $buildHash);

if (!file_exists($tempFilePath)) {
    // Download of Elasticsearch rest-api artifacts
    $json = file_get_contents("https://artifacts-api.elastic.co/v1/versions/$version");
    if (empty($json)) {
        printf ("ERROR: I cannot download the artifcats from https://artifacts-api.elastic.co/v1/versions/%s\n", $version);
        exit(1);
    }
    $content = json_decode($json, true);
    $found = false;
    foreach ($content['version']['builds'] as $builds) {
        if ($builds['projects']['elasticsearch']['commit_hash'] === $buildHash) {
            // Download the artifact ZIP file (rest-resources-zip-$version.zip)
            printf("Download %s\n", $builds['projects']['elasticsearch']['packages'][$artifactFile]['url']);
            if (!copy($builds['projects']['elasticsearch']['packages'][$artifactFile]['url'], $tempFilePath)) {
                printf ("ERROR: failed to download %s\n", $artifactFile);
            }
            $found = true;
            break;
        }
    }
    if (!$found) {
        $build = $content['version']['builds'][0]; // pick the most recent
        $resource = $build["projects"]["elasticsearch"]["packages"][sprintf("rest-resources-zip-%s.zip", $version)]['url'];
        if (!copy($resource, $tempFilePath)) {
            printf ("ERROR: failed to download %s\n", $resource);
        }
    }
} else {
    printf("The file %s already exists\n", $tempFilePath);
}

if (!file_exists($tempFilePath)) {
    printf("ERROR: I cannot download file %s\n", $tempFilePath);
    exit(1);
}
$zip = new ZipArchive();
$zip->open($tempFilePath);
printf("Extracting %s\ninto %s/rest-spec/%s\n", $tempFilePath, __DIR__, $buildHash);
$zip->extractTo(sprintf("%s/rest-spec/%s", __DIR__, $buildHash));
$zip->close();

printf ("Rest-spec API installed successfully!\n\n");