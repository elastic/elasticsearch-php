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
class AliasTest extends TestCase
{
    const NAME_INDICES = [
        'test1_elasticsearch_php',
        'test2_elasticsearch_php',
        'test3_elasticsearch_php'
    ];
    
    const NAME_ALIAS = 'alias_elasticsearch_php';

    protected Client $client;
    
    public function setUp(): void
    {
        $this->client = Utility::getClient();
    }

    public function getIndexNames(): array
    {
        $data = [];
        foreach (self::NAME_INDICES as $index) {
            $data[] = [$index];
        }
        return $data;
    }

    /**
     * @dataProvider getIndexNames
     */
    public function testCreateIndex(string $index)
    {
        $response = $this->client->indices()->create([
            'index' => $index
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @depends testCreateIndex
     */
    public function testCreateAlias()
    {
        $response = $this->client->indices()->putAlias([
            'index' => self::NAME_INDICES,
            'name' => self::NAME_ALIAS
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @depends testCreateAlias
     */
    public function testGetAlias()
    {
        $response = $this->client->indices()->getAlias([
            'index' => self::NAME_INDICES
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(3, count($response->asArray()));
        $aliases = array_keys($response->asArray());
        sort($aliases);
        $this->assertEquals(self::NAME_INDICES, $aliases);
    }
    
    /**
     * @depends testCreateAlias
     */
    public function testDeleteAlias()
    {
        $response = $this->client->indices()->deleteAlias([
            'index' => self::NAME_INDICES,
            'name' => self::NAME_ALIAS
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @depends testCreateIndex
     */
    public function testDeleteIndex()
    {
        $response = $this->client->indices()->delete([
            'index' => self::NAME_INDICES
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}