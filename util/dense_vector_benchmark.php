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
ini_set('memory_limit', '1024M');

require_once __DIR__ . '/../vendor/autoload.php';

use Elastic\Elasticsearch\Helper\Vectors;

$ELASTICSEARCH_URL = '';
$chunk_sizes = array(100, 250, 500, 1000);
$repetitions = 20;
$json_output = FALSE;
$runs = 3;
$dataset_file = '';
$rest_index = null;
$dataset = [];
$index = 'benchmark';

function upload($client, $index, $dataset, $chunk_size, $repetitions, $packed) {
    // create index
    if ($client->indices()->exists(['index' => $index])->getStatusCode() != 404) {
        $client->indices()->delete(['index' => $index]);
    }
    $client->indices()->create([
        'index' => $index,
        'body' => [
            'mappings' => [
                'properties' => [
                    'docid' => [
                        'type' => 'keyword',
                    ],
                    'title' => [
                        'type' => 'text',
                    ],
                    'text' => [
                        'type' => 'text',
                    ],
                    'emb' => [
                        'type' => 'dense_vector',
                        'index_options' => [
                            'type' => 'flat',
                        ],
                    ],
                ],
            ],
        ],
    ]);
    $client->indices()->refresh(['index' => $index]);

    // run the bulk upload
    $len = sizeof($dataset);
    $params = ['body' => []];
    $start = microtime(true);
    for ($i = 1; $i <= $len * $repetitions; $i++) {
        $doc = $dataset[($i - 1) % $len];
        $params['body'][] = ['index' => ['_index' => $index]];
        $params['body'][] = [
            'docid' => $doc['docid'],
            'title' => $doc['title'],
            'text' => $doc['text'],
            'emb' => $packed ? Vectors::packDenseVector($doc['emb']) : $doc['emb'],
        ];
        if ($i % $chunk_size == 0) {
            $response = $client->bulk($params);
            if ($response['errors']) {
                echo 'Error during bulk upload. Exiting';
                exit(1);
            }
            $params = ['body' => []];
            unset($response);
        }
    }
    if (!empty($params['body'])) {
        $response = $client->bulk($params);
        if ($response['errors']) {
            echo 'Error during bulk upload. Exiting';
            exit(1);
        }
        unset($params);
        unset($response);
    }
    return microtime(true) - $start;
}

$opts = getopt('s:r:', array('url:', 'json', 'runs:', 'help'), $rest_index);
if (array_key_exists('help', $opts)) {
    echo 'Usage: ' . $argv[0] . '[-s CHUNK_SIZES] [-r REPETITIONS] [--url URL] [--json] [--runs RUNS] DATASET_FILE\n';
    echo '  -s CHUNK_SIZES List of chunk sizes to use, separated by commas (default: 100,250,500,1000)\n';
    echo '  -r REPETITIONS Number of times the dataset is repeated (default: 20)\n';
    echo '  --url URL      The Elasticsearch connection URL\n';
    echo '  --json         Output benchmark results in JSON format\n';
    echo '  --runs         Number of runs that are averaged for each chunk size (default: 3)\n';
    exit(0);
}
if (!array_key_exists('url', $opts)) {
    echo 'Error: --url argument is required.';
    exit(1);
}
else {
    $ELASTICSEARCH_URL = $opts['url'];
}
if (array_key_exists('s', $opts)) {
    $chunk_sizes = array_map(fn($v) => intval($v), explode(',', $opts['s']));
}
if (array_key_exists('r', $opts)) {
    $repetitions = intval($opts['r']);
}
if (array_key_exists('json', $opts)) {
    $json_output = TRUE;
}
if (array_key_exists('runs', $opts)) {
    $runs = intval($opts['runs']);
}
if (!$argv[$rest_index]) {
    echo 'Error';
    exit(1);
}
else {
    $dataset_file = $argv[$rest_index];
}

// read CSV dataset
$f = fopen($dataset_file, 'rt');
while (!feof($f)) {
    $line = fgets($f);
    if ($line !== FALSE) {
        $dataset[] = json_decode($line, true);
    }
}
fclose($f);

// initialize client
$client = Elastic\Elasticsearch\ClientBuilder::create()
    ->setHosts([$ELASTICSEARCH_URL])
    ->build();

// run the benchmark
$results = [];
foreach ($chunk_sizes as $chunk_size) {
    if (!$json_output) {
        echo 'Uploading ' . $dataset_file . ' with chunk size ' . $chunk_size . "...\n";
    }
    $normal_runs = [];
    $packed_runs = [];
    for ($run = 0; $run < $runs; $run++) {
        $normal_runs[] = upload($client, $index, $dataset, $chunk_size, $repetitions, FALSE);
        $packed_runs[] = upload($client, $index, $dataset, $chunk_size, $repetitions, TRUE);
    }
    $t = array_sum($normal_runs) / $runs;
    $pt = array_sum($packed_runs) / $runs;
    $result = [
        'dataset_size' => sizeof($dataset) * $repetitions,
        'chunk_size' => $chunk_size,
        'float32' => [
            'duration' => intval($t * 1000 + 0.5),
        ],
        'base64' => [
            'duration' => intval($pt * 1000 + 0.5),
        ],
    ];
    $results[] = $result;
    if (!$json_output) {
        echo 'Size:            ' . $result['dataset_size'] . "\n";
        echo 'float duration:  ' . number_format($t, 2) . 's (' . number_format($result['dataset_size'] / $t, 2) . " docs/s)\n";
        echo 'base64 duration: ' . number_format($pt, 2) . 's (' . number_format($result['dataset_size'] / $pt, 2) . " docs/s)\n";
        echo 'Speed up:        ' . number_format($t / $pt, 2) . "x\n";
    }
}

if ($json_output) {
    echo json_encode($results, JSON_PRETTY_PRINT);
}
