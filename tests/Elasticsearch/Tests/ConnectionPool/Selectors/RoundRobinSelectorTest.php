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

namespace Elasticsearch\Tests\ConnectionPool\Selectors;

use Elasticsearch;
use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class SnifferTest
 *
 * @subpackage Tests\ConnectionPool\RoundRobinSelectorTest
 */
class RoundRobinSelectorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Add Ten connections, select 15 to verify round robin
     *
     * @covers \Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector::select
     *
     * @return void
     */
    public function testTenConnections()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector();

        $mockConnections = [];
        foreach (range(0, 9) as $index) {
            $mockConnections[$index] = $this->getMockBuilder(ConnectionInterface::class)
                ->disableOriginalConstructor()
                ->getMock();
        }

        // select ten
        $this->assertSame($mockConnections[0], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[1], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[2], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[3], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[4], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[5], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[6], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[7], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[8], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[9], $roundRobin->select($mockConnections));

        // select five - should start from the first one (index: 0)
        $this->assertSame($mockConnections[0], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[1], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[2], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[3], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[4], $roundRobin->select($mockConnections));
    }

    /**
     * Add Ten connections, select five, remove three, test another 10 to check
     * that the round-robining works after removing connections
     *
     * @covers \Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector::select
     *
     * @return void
     */
    public function testAddTenConnectionsTestFiveRemoveThreeTestTen()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector();

        $mockConnections = [];
        foreach (range(0, 9) as $index) {
            $mockConnections[$index] = $this->getMockBuilder(ConnectionInterface::class)
                ->disableOriginalConstructor()
                ->getMock();
        }

        // select five
        $this->assertSame($mockConnections[0], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[1], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[2], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[3], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[4], $roundRobin->select($mockConnections));

        // remove three
        unset($mockConnections[8]);
        unset($mockConnections[9]);
        unset($mockConnections[10]);

        // select ten after removal
        $this->assertSame($mockConnections[5], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[6], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[7], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[0], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[1], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[2], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[3], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[4], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[5], $roundRobin->select($mockConnections));
        $this->assertSame($mockConnections[6], $roundRobin->select($mockConnections));
    }
}
