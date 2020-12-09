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

namespace Elasticsearch\Tests\ConnectionPool;

use Elasticsearch;
use Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector;
use Elasticsearch\ConnectionPool\StaticConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Connections\ConnectionFactory;
use Mockery as m;

/**
 * Class StaticConnectionPoolTest
 *
 * @subpackage Tests/StaticConnectionPoolTest
 */
class StaticConnectionPoolTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testAddOneHostThenGetConnection()
    {
        $mockConnection = m::mock(Connection::class)
            ->shouldReceive('ping')
            ->andReturn(true)
            ->getMock()
            ->shouldReceive('isAlive')
            ->andReturn(true)
            ->getMock()
            ->shouldReceive('markDead')->once()->getMock();

        /**
 * @var \Elasticsearch\Connections\Connection[]&\Mockery\MockInterface[] $connections
*/
        $connections = [$mockConnection];

        $selector = m::mock(RoundRobinSelector::class)
            ->shouldReceive('select')
            ->andReturn($connections[0])
            ->getMock();

        $connectionFactory = m::mock(ConnectionFactory::class);

        $connectionPoolParams = [
            'randomizeHosts' => false,
        ];
        $connectionPool = new StaticConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $retConnection = $connectionPool->nextConnection();

        $this->assertSame($mockConnection, $retConnection);
    }

    public function testAddMultipleHostsThenGetFirst()
    {
        $connections = [];

        foreach (range(1, 10) as $index) {
            $mockConnection = m::mock(Connection::class)
                ->shouldReceive('ping')
                ->andReturn(true)
                ->getMock()
                ->shouldReceive('isAlive')
                ->andReturn(true)
                ->getMock()
                ->shouldReceive('markDead')->once()->getMock();

            $connections[] = $mockConnection;
        }

        $selector = m::mock(RoundRobinSelector::class)
            ->shouldReceive('select')
            ->andReturn($connections[0])
            ->getMock();

        $connectionFactory = m::mock(ConnectionFactory::class);

        $connectionPoolParams = [
            'randomizeHosts' => false,
        ];
        $connectionPool = new StaticConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $retConnection = $connectionPool->nextConnection();

        $this->assertSame($connections[0], $retConnection);
    }

    public function testAllHostsFailPing()
    {
        $connections = [];

        foreach (range(1, 10) as $index) {
            $mockConnection = m::mock(Connection::class)
                ->shouldReceive('ping')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('isAlive')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('markDead')->once()->getMock()
                ->shouldReceive('getPingFailures')->andReturn(0)->once()->getMock()
                ->shouldReceive('getLastPing')->andReturn(time())->once()->getMock();

            $connections[] = $mockConnection;
        }

        $selector = m::mock(RoundRobinSelector::class)
            ->shouldReceive('select')
            ->andReturnValues($connections)
            ->getMock();

        $connectionFactory = m::mock(ConnectionFactory::class);

        $connectionPoolParams = [
            'randomizeHosts' => false,
        ];
        $connectionPool = new StaticConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $this->expectException(\Elasticsearch\Common\Exceptions\NoNodesAvailableException::class);
        $this->expectExceptionMessage('No alive nodes found in your cluster');

        $connectionPool->nextConnection();
    }

    public function testAllExceptLastHostFailPingRevivesInSkip()
    {
        $connections = [];

        foreach (range(1, 9) as $index) {
            $mockConnection = m::mock(Connection::class)
                ->shouldReceive('ping')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('isAlive')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('markDead')->once()->getMock()
                ->shouldReceive('getPingFailures')->andReturn(0)->once()->getMock()
                ->shouldReceive('getLastPing')->andReturn(time())->once()->getMock();

            $connections[] = $mockConnection;
        }

        $goodConnection = m::mock(Connection::class)
            ->shouldReceive('ping')->once()
            ->andReturn(true)
            ->getMock()
            ->shouldReceive('isAlive')->once()
            ->andReturn(false)
            ->getMock()
            ->shouldReceive('markDead')->once()->getMock()
            ->shouldReceive('getPingFailures')->andReturn(0)->once()->getMock()
            ->shouldReceive('getLastPing')->andReturn(time())->once()->getMock();

        $connections[] = $goodConnection;

        $selector = m::mock(RoundRobinSelector::class)
            ->shouldReceive('select')
            ->andReturnValues($connections)
            ->getMock();

        $connectionFactory = m::mock(ConnectionFactory::class);

        $connectionPoolParams = [
            'randomizeHosts' => false,
        ];
        $connectionPool = new StaticConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $ret = $connectionPool->nextConnection();
        $this->assertSame($goodConnection, $ret);
    }

    public function testAllExceptLastHostFailPingRevivesPreSkip()
    {
        $connections = [];

        foreach (range(1, 9) as $index) {
            $mockConnection = m::mock(Connection::class)
                ->shouldReceive('ping')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('isAlive')
                ->andReturn(false)
                ->getMock()
                ->shouldReceive('markDead')->once()->getMock()
                ->shouldReceive('getPingFailures')->andReturn(0)->once()->getMock()
                ->shouldReceive('getLastPing')->andReturn(time())->once()->getMock();

            $connections[] = $mockConnection;
        }

        $goodConnection = m::mock(Connection::class)
            ->shouldReceive('ping')->once()
            ->andReturn(true)
            ->getMock()
            ->shouldReceive('isAlive')->once()
            ->andReturn(false)
            ->getMock()
            ->shouldReceive('markDead')->once()->getMock()
            ->shouldReceive('getPingFailures')->andReturn(0)->once()->getMock()
            ->shouldReceive('getLastPing')->andReturn(time()-10000)->once()->getMock();

        $connections[] = $goodConnection;

        $selector = m::mock(RoundRobinSelector::class)
            ->shouldReceive('select')
            ->andReturnValues($connections)
            ->getMock();

        $connectionFactory = m::mock(ConnectionFactory::class);

        $connectionPoolParams = [
            'randomizeHosts' => false,
        ];
        $connectionPool = new StaticConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $ret = $connectionPool->nextConnection();
        $this->assertSame($goodConnection, $ret);
    }

    public function testCustomConnectionPoolIT()
    {
        $clientBuilder = \Elasticsearch\ClientBuilder::create();
        $clientBuilder->setHosts(['localhost:1']);
        $client = $clientBuilder
            ->setRetries(0)
            ->setConnectionPool(StaticConnectionPool::class, [])
            ->build();

        $this->expectException(Elasticsearch\Common\Exceptions\NoNodesAvailableException::class);
        $this->expectExceptionMessage('No alive nodes found in your cluster');

        $client->search([]);
    }
}
