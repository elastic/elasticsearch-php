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
use Mockery as m;

/**
 * Class StickyRoundRobinSelectorTest
 *
 * @subpackage Tests\ConnectionPool\StickyRoundRobinSelectorTest
 */
class StickyRoundRobinSelectorTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testTenConnections()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector();

        $mockConnections = [];
        $mockConnections[] = m::mock(ConnectionInterface::class)
            ->shouldReceive('isAlive')->times(16)->andReturn(true)->getMock();

        foreach (range(0, 9) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class);
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertSame($mockConnections[0], $retConnection);
        }
    }

    public function testTenConnectionsFirstDies()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector();

        $mockConnections = [];
        $mockConnections[] = m::mock(ConnectionInterface::class)
            ->shouldReceive('isAlive')->once()->andReturn(false)->getMock();

        $mockConnections[] = m::mock(ConnectionInterface::class)
            ->shouldReceive('isAlive')->times(15)->andReturn(true)->getMock();

        foreach (range(0, 8) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class);
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertSame($mockConnections[1], $retConnection);
        }
    }

    public function testConnectionDroppedBySniffingPool()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector();

        $mockConnections = [];
        foreach (range(0, 3) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class)
                ->shouldReceive('isAlive')->once()->andReturn(false)->getMock();
        }

        $mockConnections[] = m::mock(ConnectionInterface::class)
            ->shouldReceive('isAlive')->once()->andReturn(true)->getMock();

        // check we're getting the next one each time
        foreach (range(0, 3) as $index) {
            $retConnection = $roundRobin->select($mockConnections);
            $this->assertSame($mockConnections[$index + 1], $retConnection);
        }

        // current is 4 now inside the StickyRoundRobinSelector();
        $retConnection = $roundRobin->select($mockConnections);
        $this->assertSame($mockConnections[4], $retConnection);

        // now we are going to simulate 1 server dropped out, and thus only 4 connections are giving back, which
        // resulted in Undefined offset: 4 in Elasticsearch/ConnectionPool/Selectors/StickyRoundRobinSelector.php:45
        $mockConnections = [];
        foreach (range(0, 3) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class);
        }

        // instead of index 4 we should retrieve index 1 (5 % 4 = 1)
        $retConnection = $roundRobin->select($mockConnections);
        $this->assertSame($mockConnections[1], $retConnection);
    }
}
