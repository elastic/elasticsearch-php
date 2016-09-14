<?php

namespace Elasticsearch\Tests\Helper\Iterators;

use Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Mockery as m;

/**
 * Class SearchResponseIteratorTest
 * @package Elasticsearch\Tests\Helper\Iterators
 * @author  Arturo Mejia <arturo.mejia@kreatetechnology.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://Elasticsearch.org
 */
class SearchResponseIteratorTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testWithNoResults()
    {
        $search_params = array(
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => array(
                'query' => array(
                    'match_all' => new \StdClass
                )
            )
        );

        $mock_client = m::mock('\Elasticsearch\Client');

        $mock_client->shouldReceive('search')
            ->once()
            ->ordered()
            ->with($search_params)
            ->andReturn(array('_scroll_id' => 'scroll_id_01'));

        $mock_client->shouldReceive('scroll')
            ->never();

        $mock_client->shouldReceive('clearScroll')
            ->once()
            ->ordered()
            ->withAnyArgs();


        $responses = new SearchResponseIterator($mock_client, $search_params);

        $this->assertCount(0, $responses);
    }

    public function testWithHits()
    {
        $search_params = array(
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => array(
                'query' => array(
                    'match_all' => new \StdClass
                )
            )
        );

        $mock_client = m::mock('\Elasticsearch\Client');

        $mock_client->shouldReceive('search')
            ->once()
            ->ordered()
            ->with($search_params)
            ->andReturn([
                '_scroll_id' => 'scroll_id_01',
                'hits' => [
                    'hits' => [
                        [
                            'foo' => 'bar'
                        ]
                    ]
                ]
            ]);

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'scroll_id'  => 'scroll_id_01',
                    'scroll' => '5m'
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
                ]);

        $mock_client->shouldReceive('scroll')
            ->once()
            ->ordered()
            ->with(
                [
                    'scroll_id'  => 'scroll_id_02',
                    'scroll' => '5m'
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
                    'scroll_id'  => 'scroll_id_03',
                    'scroll' => '5m'
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
                    'scroll_id'  => 'scroll_id_04',
                    'scroll' => '5m'
                ]
            );

        $mock_client->shouldReceive('clearScroll')
            ->once()
            ->ordered()
            ->withAnyArgs();

        $responses = new SearchResponseIterator($mock_client, $search_params);

        $this->assertCount(4, $responses);
    }
}
