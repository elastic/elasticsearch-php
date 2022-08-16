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

namespace Elasticsearch\Tests;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Tests\ClientBuilder\ArrayLogger;
use Psr\Log\LogLevel;

/**
 * Class ClientTest
 *
 * @subpackage Tests
 * @group Integration
 */
class ClientIntegrationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * ArrayLogger
     */
    private $logger;

    /**
     * @var string
     */
    private $host;

    public function setUp(): void
    {
        $this->host = Utility::getHost();
        if (null == $this->host) {
            $this->markTestSkipped('I cannot execute integration test without TEST_SUITE env');
        }
        $this->logger = new ArrayLogger();
    }

    private function getClient(): Client
    {
        $client = ClientBuilder::create()
            ->setHosts([$this->host])
            ->setLogger($this->logger);

        $testSuite = $_SERVER['TEST_SUITE'] 
            ?? $_ENV['TEST_SUITE']
            ?? getenv('TEST_SUITE');
        if ($testSuite === 'platinum') {
            $client->setSSLVerification(false);
        }
        return $client->build();
    }

    public function testLogRequestSuccessHasInfoNotEmpty()
    {
        $client = $this->getClient();

        $result = $client->info();

        $this->assertNotEmpty($this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestSuccessHasPortInInfo()
    {
        $client = $this->getClient();

        $result = $client->info();

        $this->assertStringContainsString('"port"', $this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestFailHasWarning()
    {
        $client = $this->getClient();

        try {
            $result = $client->get([
                'index' => 'foo',
                'id' => 'bar'
            ]);
        } catch (Missing404Exception $e) {
            $this->assertNotEmpty($this->getLevelOutput(LogLevel::WARNING, $this->logger->output));
        }
    }

    public function testIndexCannotBeEmptyStringForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => '',
            'id' => 'test'
            ]
        );
    }

    public function testIdCannotBeEmptyStringForDelete()
    {
        $client = $this->getClient();

        $this->expectException(BadRequest400Exception::class);

        $client->delete(
            [
            'index' => 'test',
            'id' => ''
            ]
        );
    }

    public function testIndexCannotBeArrayOfEmptyStringsForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => ['', '', ''],
            'id' => 'test'
            ]
        );
    }

    public function testIndexCannotBeArrayOfNullsForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => [null, null, null],
            'id' => 'test'
            ]
        );
    }

    /**
     * @see https://github.com/elastic/elasticsearch/blob/master/rest-api-spec/src/main/resources/rest-api-spec/api/search_mvt.json
     */
    public function testSupportMapBoxVectorTiles()
    {
        $client = $this->getClient();
        
        if (Utility::getVersion($client) < '7.15') {
            $this->markTestSkipped(sprintf(
                "The %s test requires Elasticsearch 7.15+",
                __FUNCTION__
            ));
        }

        // Create a museums index with a custom mappings
        $client->indices()->create([
            'index' => 'museums',
            'body' => [
                "mappings" => [
                    "properties" => [
                        "location" => ["type" => "geo_point"],
                        "name" => ["type" => "keyword"],
                        "price" => ["type" => "long"],
                        "included" => ["type" => "boolean"]
                    ]
                ]
            ]
        ]);

        // Bulk some documents
        $body = [
            [ "index" => [ "_id" => "1" ]],
            [ "location" => "52.374081,4.912350", "name" => "NEMO Science Museum",  "price" => 1750, "included" => true ],
            [ "index" => [ "_id" => "2" ]],
            [ "location" => "52.369219,4.901618", "name" => "Museum Het Rembrandthuis", "price" => 1500, "included" => false ],
            [ "index" => [ "_id" => "3" ]],
            [ "location" => "52.371667,4.914722", "name" => "Nederlands Scheepvaartmuseum", "price" => 1650, "included" => true ],
            [ "index" => [ "_id" => "4" ]],
            [ "location" => "52.371667,4.914722", "name" => "Amsterdam Centre for Architecture", "price" => 0, "included" => true ]
        ];
        $client->bulk([
            'index' => 'museums',
            'refresh' => true,
            'body' => $body
        ]);

        $body = [
            "grid_precision" => 2,
            "fields" => ["name", "price"],
            "query" => [
                "term" => [
                    "included" => true
                ]
            ],
            "aggs" => [
                "min_price" => [
                    "min" => [
                        "field" => "price"
                    ]
                ],
                "max_price" => [
                    "max" => [
                        "field" => "price"
                    ]
                ],
                "avg_price" => [
                    "avg" => [
                        "field" => "price"
                    ]
                ]
            ]
        ];

        // Searches a vector tile for geospatial values. Returns results as a binary Mapbox vector tile.
        $response = $client->searchMvt([
            'index' => 'museums',
            'field' => 'location',
            'zoom' => 13,
            'x' => 4207,
            'y' => 2692,
            'body' => $body
        ]);

        // Remove the index museums
        $client->indices()->delete([
            'index' => 'museums'
        ]);

        $this->assertIsString($response);
        $this->assertStringContainsString('NEMO Science Museum', $response);
    }

    private function getLevelOutput(string $level, array $output): string
    {
        foreach ($output as $out) {
            if (false !== strpos($out, $level)) {
                return $out;
            }
        }
        return '';
    }
}
