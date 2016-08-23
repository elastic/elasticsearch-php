<?php

namespace Elasticsearch\Tests\Helper\Iterators;

use Elasticsearch\Client;
use Elasticsearch\Helper\Iterators\SearchResponseIterator;
use Prophecy\Argument;

/**
 * Class SearchResponseIteratorTest
 * @package Elasticsearch\Tests\Helper\Iterators
 * @author  Arturo Mejia <arturo.mejia@kreatetechnology.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://Elasticsearch.org
 */
class SearchResponseIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testWithNoResults()
    {
        $search_params = array(
            'search_type' => 'scan',
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => array(
                'query' => array(
                    'match_all' => new \StdClass
                )
            )
        );

        $client = $this->prophesize(Client::class);
        $client->search($search_params)->willReturn([
            '_scroll_id' => 'scroll_id_01'
        ]);
        $client->scroll([
            'scroll_id' => 'scroll_id_01',
            'scroll'    => '5m'
        ])->willReturn([
            '_scroll_id' => 'scroll_id_02',
            'hits' => [
                'hits' => []
            ]
        ]);
        $client->clearScroll(Argument::any())->shouldBeCalled();

        $responses = new SearchResponseIterator($client->reveal(), $search_params);

        $this->assertCount(1, $responses);
    }

    public function testWithScan()
    {
        $search_params = array(
            'search_type' => 'scan',
            'scroll'      => '5m',
            'index'       => 'twitter',
            'size'        => 1000,
            'body'        => array(
                'query' => array(
                    'match_all' => new \StdClass
                )
            )
        );

        $client = $this->prophesize(Client::class);
        $client->search($search_params)->willReturn([
            '_scroll_id' => 'scroll_id_01'
        ]);

        $client->scroll([
            'scroll_id' => 'scroll_id_01',
            'scroll'    => '5m'
        ])->willReturn([
            '_scroll_id' => 'scroll_id_02',
            'hits' => [
                'hits' => [[]]
            ]
        ]);

        $client->scroll([
            'scroll_id' => 'scroll_id_02',
            'scroll'    => '5m'
        ])->willReturn([
            '_scroll_id' => 'scroll_id_03',
            'hits' => [
                'hits' => [[]]
            ]
        ]);

        $client->scroll([
            'scroll_id' => 'scroll_id_03',
            'scroll'    => '5m'
        ])->willReturn([
            '_scroll_id' => 'scroll_id_04',
            'hits' => [
                'hits' => []
            ]
        ]);
        $client->clearScroll(Argument::any())->shouldBeCalled();
        $responses = new SearchResponseIterator($client->reveal(), $search_params);

        $this->assertCount(3, $responses);
    }
}
