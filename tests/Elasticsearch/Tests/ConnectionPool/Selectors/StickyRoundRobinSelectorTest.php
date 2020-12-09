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
    public function tearDown(): void
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
}
