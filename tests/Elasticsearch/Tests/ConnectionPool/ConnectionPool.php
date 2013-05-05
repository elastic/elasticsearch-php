<?php

namespace Elasticsearch\Tests\ConnectionPool;
use Elasticsearch;
use Elasticsearch\Connections\Connection;

/**
 * Class ConnectionPool
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/ConnectionPool
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ConnectionPool extends \PHPUnit_Framework_TestCase
{


    /**
     * Test adding one host and then requesting it
     *
     * @covers ConnectionPool::__construct
     * @return void
     */
    public function testAddOneHostThenGetConnection()
    {
        $connections = array('host' => 'localhost', 'port' => 9200);
        $deadPool    = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));
        $deadPool->expects($this->once())
            ->method('resurrect')
            ->with($this->equalTo(false))
            ->will($this->returnValue(array()));

        $mockConnection = $this->getMockBuilder('\Elasticsearch\Connections\Connection')
            ->disableOriginalConstructor()
            ->getMock();

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector', array('select'));
        $selector->expects($this->once())
            ->method('select')
            ->will($this->returnValue($mockConnection));

        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        $retConnection = $connectionPool->getConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }//end testAddOneHostThenGetConnection()


    /**
     * Get connection from deadpool by resurrection
     *
     * @covers ConnectionPool::__construct
     * @return void
     */
    public function testResurrectFromDeadpool()
    {
        $connections = array();

        $mockConnection = $this->getMockBuilder('\Elasticsearch\Connections\Connection')
            ->disableOriginalConstructor()
            ->getMock();

        $deadPool = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));
        $deadPool->expects($this->once())
            ->method('resurrect')
            ->with($this->equalTo(false))
            ->will($this->returnValue($mockConnection));

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector', array('select'));
        $selector->expects($this->once())
            ->method('select')
            ->will($this->returnValue($mockConnection));

        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        $retConnection = $connectionPool->getConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }//end testAddOneHostThenGetConnection()

}//end class