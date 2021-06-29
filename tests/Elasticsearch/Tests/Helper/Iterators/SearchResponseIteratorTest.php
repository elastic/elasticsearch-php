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

namespace Elasticsearch\Tests\Helper\Iterators;

use Elasticsearch\Client;
use Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Mockery as m;

/**
 * Class SearchResponseIteratorTest
 *
 */
class SearchResponseIteratorTest extends \PHPUnit\Framework\TestCase
{

    public function tearDown(): void
    {
        m::close();
    }

    public function testWithNoResults()
    {
        $search_params = [
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => [
                'query' => [
                    'match_all' => new \stdClass
                ]
            ]
        ];

        $mock_client = m::mock(Client::class);

        $mock_client->shouldReceive('search')
            ->twice()
            ->with($search_params)
            ->andReturn(['_scroll_id' => 'scroll_id_01']);

        $mock_client->shouldReceive('clearScroll')
            ->twice()
            ->withAnyArgs();

        $responses = new SearchResponseIterator($mock_client, $search_params);

        $this->assertCount(0, $responses);
    }

    public function testWithHits()
    {
        $search_params = [
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => [
                'query' => [
                    'match_all' => new \stdClass
                ]
            ]
        ];

        $mock_client = m::mock(Client::class);

        $mock_client->shouldReceive('search')
            ->once()
            ->ordered()
            ->with($search_params)
            ->andReturn(
                [
                '_scroll_id' => 'scroll_id_01',
                'hits' => [
                    'hits' => [
                        [
                            'foo' => 'bar'
                        ]
                    ]
                ]
                ]
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id'  => 'scroll_id_01',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn(
                [
                    '_scroll_id' => 'scroll_id_02',
                    'hits' => [
                        'hits' => [
                            [
                                'foo' => 'bar'
                            ]
                        ]
                    ]
                ]
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id' => 'scroll_id_02',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn(
                [
                    '_scroll_id' => 'scroll_id_03',
                    'hits' => [
                        'hits' => [
                            [
                                'foo' => 'bar'
                            ]
                        ]
                    ]
                ]
            );

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'body' => [
                        'scroll_id' => 'scroll_id_03',
                        'scroll' => '5m'
                    ]
                ]
            )
            ->andReturn(
                [
                    '_scroll_id' => 'scroll_id_04',
                    'hits' => [
                        'hits' => []
                    ]
                ]
            );

        $mock_client->shouldReceive('scroll')
            ->never()
            ->with(
                [
                    'body' => [
                        'scroll_id'  => 'scroll_id_04',
                        'scroll' => '5m'
                    ]
                ]
            );

        $mock_client->shouldReceive('clearScroll')
            ->once()
            ->ordered()
            ->withAnyArgs();

        $responses = new SearchResponseIterator($mock_client, $search_params);
        $count = 0;
        $i = 0;
        foreach ($responses as $response) {
            $count += count($response['hits']['hits']);
            $this->assertEquals($response['_scroll_id'], sprintf("scroll_id_%02d", ++$i));
        }
        $this->assertEquals(3, $count);
    }
}
