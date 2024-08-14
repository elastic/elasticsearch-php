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
use Elastic\Elasticsearch\Tests\Utility;
use PHPUnit\Framework\TestCase;

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
}