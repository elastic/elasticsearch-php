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

namespace Elastic\Elasticsearch\Tests\Helper\Iterators;

use Elastic\Elasticsearch\Helper\Iterators\SearchHitIterator;
use Elastic\Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class SearchResponseIteratorTest
 *
 */
class SearchHitIteratorTest extends TestCase
{
    /**
     * @var SearchResponseIterator
     */
    private $searchResponse;

    public function setUp(): void
    {
        $this->searchResponse = Mockery::mock(SearchResponseIterator::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testWithNoResults(): void
    {
        $searchHit = new SearchHitIterator($this->searchResponse);
        $this->assertCount(0, $searchHit);
    }

    public function testWithHits(): void
    {
        $this->searchResponse->shouldReceive('rewind')
            ->once()
            ->ordered();

        $this->searchResponse->shouldReceive('current')
            ->andReturn(
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar0' ],
                            [ 'foo' => 'bar1' ],
                            [ 'foo' => 'bar2' ]
                        ],
                        'total' => [
                            'value' => 3,
                            'relation' => 'eq'
                        ]
                    ]
                ],
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar0' ],
                            [ 'foo' => 'bar1' ],
                            [ 'foo' => 'bar2' ]
                        ],
                        'total' => [
                            'value' => 3,
                            'relation' => 'eq'
                        ]
                    ]
                ],
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar0' ],
                            [ 'foo' => 'bar1' ],
                            [ 'foo' => 'bar2' ]
                        ],
                        'total' => [
                            'value' => 3,
                            'relation' => 'eq'
                        ]
                    ]
                ],
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar0' ],
                            [ 'foo' => 'bar1' ],
                            [ 'foo' => 'bar2' ]
                        ],
                        'total' => [
                            'value' => 3,
                            'relation' => 'eq'
                        ]
                    ]
                ],
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar3' ],
                            [ 'foo' => 'bar4' ]
                        ],
                        'total' => [
                            'value' => 2,
                            'relation' => 'eq'
                        ]
                    ]
                ],
                [
                    'hits' => [
                        'hits' => [
                            [ 'foo' => 'bar3' ],
                            [ 'foo' => 'bar4' ]
                        ],
                        'total' => [
                            'value' => 2,
                            'relation' => 'eq'
                        ]
                    ]
                ]
            );

        $this->searchResponse->shouldReceive('valid')
            ->andReturn(true, true, true, false);

        $this->searchResponse->shouldReceive('next')
            ->times(2)
            ->ordered();

        $responses = new SearchHitIterator($this->searchResponse);
        $i = 0;
        foreach ($responses as $key => $value) {
            $this->assertEquals($i, $key);
            $this->assertEquals("bar$i", $value['foo']);
            $i++;
        }
    }
}