<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\Helper\Iterators;

use Elasticsearch\Helper\Iterators\SearchHitIterator;
use Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Mockery;

/**
 * Class SearchResponseIteratorTest
 *
 * @package Elasticsearch\Tests\Helper\Iterators
 * @author  Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://Elasticsearch.org
 */
class SearchHitIteratorTest extends \PHPUnit\Framework\TestCase
{

    public function setUp()
    {
        $this->searchResponse = Mockery::mock(SearchResponseIterator::class);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testWithNoResults()
    {
        $this->searchResponse->shouldReceive('rewind')
            ->once()
            ->ordered();

        $this->searchResponse->shouldReceive('current')
            ->once()
            ->ordered()
            ->andReturn([]);

        $this->searchResponse->shouldReceive('valid')
            ->twice()
            ->ordered()
            ->andReturn(false);

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
                    'total' => 3
                ]
                ],
                [
                'hits' => [
                    'hits' => [
                        [ 'foo' => 'bar0' ],
                        [ 'foo' => 'bar1' ],
                        [ 'foo' => 'bar2' ]
                    ],
                    'total' => 3
                ]
                ],
                [
                'hits' => [
                    'hits' => [
                        [ 'foo' => 'bar0' ],
                        [ 'foo' => 'bar1' ],
                        [ 'foo' => 'bar2' ]
                    ],
                    'total' => 3
                ]
                ],
                [
                'hits' => [
                    'hits' => [
                        [ 'foo' => 'bar0' ],
                        [ 'foo' => 'bar1' ],
                        [ 'foo' => 'bar2' ]
                    ],
                    'total' => 3
                ]
                ],
                [
                'hits' => [
                    'hits' => [
                        [ 'foo' => 'bar3' ],
                        [ 'foo' => 'bar4' ]
                    ],
                    'total' => 2
                ]
                ],
                [
                'hits' => [
                    'hits' => [
                        [ 'foo' => 'bar3' ],
                        [ 'foo' => 'bar4' ]
                    ],
                    'total' => 2
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
