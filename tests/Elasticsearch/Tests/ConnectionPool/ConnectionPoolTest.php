<?php

namespace Elasticsearch\Tests\ConnectionPool;
use Elasticsearch;

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
class ConnectionPoolTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test adding one host and then requesting it
     *
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::__construct
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getConnection
     * @return void
     */
    public function testAddOneHostThenGetConnection()
    {
        $connections = array(array('host' => 'localhost', 'port' => 9200));
        $deadPool    = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));
        $deadPool->expects($this->once())
            ->method('resurrect')
            ->with($this->equalTo(false))
            ->will($this->returnValue(array()));

        $mockConnection = $this->getMockBuilder('\Elasticsearch\Connections\CurlMultiConnection')
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
     * @covers \ElasticSearch\ConnectionPool\ConnectionPool::__construct
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getConnection
     *
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
            ->will($this->returnValue(array($mockConnection)));

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector', array('select'));
        $selector->expects($this->once())
            ->method('select')
            ->will($this->returnValue($mockConnection));

        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        $retConnection = $connectionPool->getConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }//end testResurrectFromDeadpool()


    /**
     * Test adding multiple hosts, mark dead and verify
     *
     * @covers \ElasticSearch\ConnectionPool\ConnectionPool::__construct
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::addConnection
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::markDead
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getAllConnections
     * @return void
     */
    public function testAddHostsMarkDeadThenVerify()
    {
        $connections = array();

        $deadPool    = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));
        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector');
        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        $mockConnections = array();
        foreach (range(1,10) as $index) {
            $mockConnections[$index] = $this->getMockBuilder('\Elasticsearch\Connections\CurlMultiConnection')
                ->disableOriginalConstructor()
                ->getMock();

            $connectionPool->addConnection($mockConnections[$index]);
        }

        // Kill a specific connection.
        $connectionPool->markDead($mockConnections[5]);
        $allConnections = $connectionPool->getAllConnections();

        foreach (range(1,10) as $index) {
            if ($index === 5) {
                $this->assertNotContains($mockConnections[$index], $allConnections);
            } else {
                $this->assertContains($mockConnections[$index], $allConnections);
            }
        }

    }//end testAddHostsMarkDeadThenVerify()


    /**
     * Test adding multiple hosts, mark dead and verify
     *
     * @covers \ElasticSearch\ConnectionPool\ConnectionPool::__construct
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::addConnection
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::markDead
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getAllConnections
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::resurrect
     * @return void
     */
    public function testAddToConnectionPoolKillOneThenResurrect()
    {
        $connections = array();

        // Create the mock connections
        $mockConnections = array();
        foreach (range(1,10) as $index) {
            $mockConnections[$index] = $this->getMockBuilder('\Elasticsearch\Connections\CurlMultiConnection')
                ->disableOriginalConstructor()
                ->getMock();
        }

        // Create the deadpool, configure it to return a connection
        // on resurrect() call
        $deadPool = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));

        $deadPool->expects($this->once())
            ->method('resurrect')
            ->with($this->equalTo(false))
            ->will($this->returnValue(array($mockConnections[5])));

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector');
        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        // Add the connections to the pool.
        foreach (range(1,10) as $index) {
            $connectionPool->addConnection($mockConnections[$index]);
        }

        // Kill a specific connection.
        $connectionPool->markDead($mockConnections[5]);

        // Resurrect it.
        $connectionPool->resurrect();
        $allConnections = $connectionPool->getAllConnections();

        // All the mock connections should be in the returned array.
        foreach (range(1,10) as $index) {
            $this->assertContains($mockConnections[$index], $allConnections);
        }

    }//end testAddToConnectionPoolKillOneThenResurrect()


    /**
     * Test adding multiple hosts, mark dead and verify
     *
     * @covers \ElasticSearch\ConnectionPool\ConnectionPool::__construct
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::addConnection
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::markDead
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getAllConnections
     * @covers \Elasticsearch\ConnectionPool\ConnectionPool::getConnection
     * @return void
     */
    public function testAddToConnectionPoolKillAllForceResurrect()
    {
        $connections = array();

        // Create the mock connections
        $mockConnections = array();
        foreach (range(0,10) as $index) {
            $mockConnections[$index] = $this->getMockBuilder('\Elasticsearch\Connections\CurlMultiConnection')
                ->disableOriginalConstructor()
                ->getMock();
        }

        // Create the deadpool, configure it to return a connection
        // on resurrect() call
        $deadPool = $this->getMock('\Elasticsearch\ConnectionPool\DeadPool', array('resurrect'));

        $mapValues = array(
                      array(false, array()),
                      array(true, $mockConnections),
                     );

        $deadPool->expects($this->at(0))
            ->method('resurrect')
            ->with(false)
            ->will($this->returnValue(array()));

        $deadPool->expects($this->at(1))
            ->method('resurrect')
            ->with(true)
            ->will($this->returnValue($mockConnections));

        $selector = $this->getMock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector');
        $randomizeHosts = true;
        $connectionPool = new \Elasticsearch\ConnectionPool\ConnectionPool($connections, $selector, $deadPool, $randomizeHosts);

        // Add the connections to the pool.
        foreach (range(0,10) as $index) {
            $connectionPool->addConnection($mockConnections[$index]);
        }

        // Kill all the connections.
        foreach (range(0,10) as $index) {
            $connectionPool->markDead($mockConnections[$index]);
        }

        // Assert that all the connections are dead.
        $allConnections = $connectionPool->getAllConnections();
        $this->assertEmpty($allConnections);

        // Get a connection...will force a resurrection.
        $connectionPool->getConnection();
        $allConnections = $connectionPool->getAllConnections();

        // All the mock connections should be in the returned array.
        foreach (range(0,10) as $index) {
            $this->assertContains($mockConnections[$index], $allConnections);
        }

    }//end testAddToConnectionPoolKillAllForceResurrect()

}//end class