<?php

namespace Elasticsearch\Tests\ConnectionPool;
use Elasticsearch;
use Elasticsearch\Common\Exceptions\NoNodesAvailableException;
use Mockery as m;

/**
 * Class ConnectionPoolTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/ConnectionPool
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class StaticConnectionPoolTest extends \PHPUnit_Framework_TestCase
{

    public function testAddOneHostThenGetConnection()
    {

        $mockConnection = $this->getMockBuilder('\Elasticsearch\Connections\GuzzleConnection')
                          ->disableOriginalConstructor()
                          ->getMock();

        $mockConnection->expects($this->once())
            ->method('ping')
            ->will($this->returnValue(true));

        $connections = array($mockConnection);

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector', array('select'));
        $selector->expects($this->once())
            ->method('select')
            ->will($this->returnValue($mockConnection));

        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\StaticConnectionPool($connections, $selector, $randomizeHosts);

        $retConnection = $connectionPool->nextConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }


    public function testAddMultipleHostsThenGetFirst()
    {

        $connections = array();

        foreach (range(1,10) as $index) {
            $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                              ->shouldReceive('ping')
                              ->andReturn(true)
                              ->getMock()
                              ->shouldReceive('isAlive')
                              ->andReturn(true)
                              ->getMock();

            $connections[] = $mockConnection;
        }

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
            ->shouldReceive('select')
            ->andReturn($connections[0])
            ->getMock();


        $randomizeHosts = false;
        $connectionPool = new \Elasticsearch\ConnectionPool\StaticConnectionPool($connections, $selector, $randomizeHosts);

        $retConnection = $connectionPool->nextConnection();

        $this->assertEquals($connections[0], $retConnection);
    }


    /**
     * @expectedException Elasticsearch\Common\Exceptions\NoNodesAvailableException
     */
    public function testAllHostsFailPing()
    {

        $connections = array();

        foreach (range(1,10) as $index) {
            $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                              ->shouldReceive('ping')->once()
                              ->andReturn(false)
                              ->getMock()
                              ->shouldReceive('isAlive')->once()
                              ->andReturn(false)
                              ->getMock();

            $connections[] = $mockConnection;
        }

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
                    ->shouldReceive('select')
                    ->andReturnValues($connections)
                    ->getMock();


        $randomizeHosts = false;
        $connectionPool = new \Elasticsearch\ConnectionPool\StaticConnectionPool($connections, $selector, $randomizeHosts);

        $connectionPool->nextConnection();

    }


    public function testAllExceptLastHostFailPing()
    {

        $connections = array();

        foreach (range(1,9) as $index) {
            $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                              ->shouldReceive('ping')->once()
                              ->andReturn(false)
                              ->getMock()
                              ->shouldReceive('isAlive')->once()
                              ->andReturn(false)
                              ->getMock();

            $connections[] = $mockConnection;
        }

        $goodConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                          ->shouldReceive('ping')->once()
                          ->andReturn(true)
                          ->getMock()
                          ->shouldReceive('isAlive')->once()
                          ->andReturn(true)
                          ->getMock();

        $connections[] = $goodConnection;

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
                    ->shouldReceive('select')
                    ->andReturnValues($connections)
                    ->getMock();


        $randomizeHosts = false;
        $connectionPool = new \Elasticsearch\ConnectionPool\StaticConnectionPool($connections, $selector, $randomizeHosts);

        $ret = $connectionPool->nextConnection();
        $this->assertEquals($goodConnection, $ret);

    }

}