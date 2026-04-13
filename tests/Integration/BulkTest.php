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

namespace Elastic\Elasticsearch\Tests\Integration;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Helper\Bulk;
use Elastic\Elasticsearch\Helper\Vectors;
use Elastic\Elasticsearch\Tests\Utility;
use PHPUnit\Framework\TestCase;


function readIndex($client, $index) {
    $response = $client->indices()->refresh([
        'index' => $index,
    ]);
    $response = $client->search([
        'index' => $index,
        'body' => ['query' => ['match_all' => new \ArrayObject([])]]
    ]);
    return $response;
}

/**
 * @group integration
 */
class BulkTest extends TestCase
{
    const TEST_INDEX = 'test';

    protected Client $client;
    
    public function setUp(): void
    {
        $this->client = Utility::getClient();
    }

    public function tearDown(): void
    {
        $this->client->indices()->delete([
            'index' => self::TEST_INDEX
        ]);
    }

    public function testBulkIndexWithId()
    {
        $response = $this->client->bulk([
            'body' => [
                [ 
                    "index" => [
                        "_index" => self::TEST_INDEX, 
                        "_id"    => "1" 
                    ],
                ],
                [ "foo" => "bar" ],
                [ 
                    "index" => [
                        "_index" => self::TEST_INDEX, 
                        "_id"    => "2" 
                    ],
                ],
                [ "baz" => "boo" ]
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(2, $response['items']);
    }

    public function testBulkIndexWithoutId()
    {
        $response = $this->client->bulk([
            'body' => [
                [ 
                    "index" => [
                        "_index" => self::TEST_INDEX
                    ],
                ],
                [ "foo" => "bar" ],
                [ 
                    "index" => [
                        "_index" => self::TEST_INDEX
                    ],
                ],
                [ "baz" => "boo" ]
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(2, $response['items']);
    }

    public function testBulkIndexWithBase64Vector()
    {
        $response = $this->client->indices()->create([
            'index' => self::TEST_INDEX,
            'body' => [
                'mappings' => [
                    'properties' => [
                        'title' => ['type' => 'text'],
                        'emb' => ['type' => 'dense_vector'],
                    ],
                ],
            ],
        ]);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->client->indices()->refresh([
            'index' => self::TEST_INDEX,
        ]);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->client->bulk([
            'body' => [
                [
                    "index" => [
                        "_index" => self::TEST_INDEX
                    ],
                ],
                [
                    "text" => "text one",
                    "emb" => Vectors::packDenseVector([1.0, 2.0])
                ],
                [
                    "index" => [
                        "_index" => self::TEST_INDEX
                    ],
                ],
                [
                    "text" => "text two",
                    "emb" => Vectors::packDenseVector([3.4, 5.6])
                ],
            ]
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(2, $response['items']);
    }

    public function testBulkHelperFlushByCount()
    {
        function flushByCountActions($client, $index) {
            yield Bulk::create_action(['data' => 'one']);
            yield Bulk::create_action(['data' => 'two'], '2');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'three']);
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'fuor'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 4);

            yield Bulk::update_action(['data' => 'four'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 4);

            yield Bulk::delete_action('2');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 3);
        }

        $count = Bulk::bulk(
            $this->client, self::TEST_INDEX,
            flushByCountActions($this->client, self::TEST_INDEX), 2
        );
        $this->assertEquals($count, 6);

        $response = readIndex($this->client, self::TEST_INDEX);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, $response['hits']['total']['value']);
        foreach ($response['hits']['hits'] as $hit) {
            switch ($hit['_source']['data']) {
                case 'one':
                    break;
                case 'three':
                    break;
                case 'four':
                    $this->assertEquals($hit['_id'], '4');
                    break;
                default:
                    $this->assertFalse(true, 'Unexpected data: ' . $hit['_source']['data']);
                    break;
            }
        }
    }

    public function testBulkHelperFlushBySize()
    {
        function flushBySizeActions($client, $index) {
            yield Bulk::create_action(['data' => 'one']);
            yield Bulk::create_action(['data' => 'two'], '2');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'three']);
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'fuor'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 4);

            yield Bulk::update_action(['data' => 'four'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 4);

            yield Bulk::delete_action('2');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 4);
        }

        $count = Bulk::bulk(
            $this->client, self::TEST_INDEX,
            flushBySizeActions($this->client, self::TEST_INDEX), 500, 40
        );
        $this->assertEquals($count, 6);

        $response = readIndex($this->client, self::TEST_INDEX);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, $response['hits']['total']['value']);
        foreach ($response['hits']['hits'] as $hit) {
            switch ($hit['_source']['data']) {
                case 'one':
                    break;
                case 'three':
                    break;
                case 'four':
                    $this->assertEquals($hit['_id'], '4');
                    break;
                default:
                    $this->assertFalse(true, 'Unexpected data: ' . $hit['_source']['data']);
                    break;
            }
        }
    }


    public function testBulkHelperExplicitFlush()
    {
        function explicitFlushActions($client, $index) {
            yield Bulk::create_action(['data' => 'one']);
            yield Bulk::create_action(['data' => 'two'], '2');
            yield Bulk::flush_action();
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'three']);
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::index_action(['data' => 'fuor'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::update_action(['data' => 'four'], '4');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::delete_action('2');
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 2);

            yield Bulk::flush_action();
            $response = readIndex($client, $index);
            assert($response->getStatusCode() == 200);
            assert($response['hits']['total']['value'] == 3);
        }

        $count = Bulk::bulk(
            $this->client, self::TEST_INDEX,
            explicitFlushActions($this->client, self::TEST_INDEX)
        );
        $this->assertEquals($count, 6);

        $response = readIndex($this->client, self::TEST_INDEX);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, $response['hits']['total']['value']);
        foreach ($response['hits']['hits'] as $hit) {
            switch ($hit['_source']['data']) {
                case 'one':
                    break;
                case 'three':
                    break;
                case 'four':
                    $this->assertEquals($hit['_id'], '4');
                    break;
                default:
                    $this->assertFalse(true, 'Unexpected data: ' . $hit['_source']['data']);
                    break;
            }
        }
    }
}
