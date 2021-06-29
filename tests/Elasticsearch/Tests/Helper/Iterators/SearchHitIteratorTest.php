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

use Elasticsearch\Helper\Iterators\SearchHitIterator;
use Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Mockery;

/**
 * Class SearchResponseIteratorTest
 *
 */
class SearchHitIteratorTest extends \PHPUnit\Framework\TestCase
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

    public function testWithNoResults()
    {
        $searchHit = new SearchHitIterator($this->searchResponse);
        $this->assertCount(0, $searchHit);
    }

    public function testWithHits()
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
