<?php

namespace Elasticsearch\Tests\ConnectionPool;
use Elasticsearch;
use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class DeadPoolTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/DeadPool
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class DeadPoolTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Make sure resurrect returns an empty array
     * when no connections exist
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testEmptyResurrection()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool      = new Elasticsearch\ConnectionPool\DeadPool(null, $log);
        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array(), $retConnection);

    }//end testEmptyResurrection()


    /**
     * Make sure resurrect returns an empty array
     * when no connections exist (with Force)
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testEmptyResurrectionWithForce()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool      = new Elasticsearch\ConnectionPool\DeadPool(null, $log);
        $retConnection = $deadPool->resurrect(true);
        $this->assertEquals(array(), $retConnection);

    }//end testEmptyResurrectionWithForce()


    /**
     * Test marking a single connection as dead
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadSingleConnection()
    {
        /** @var ConnectionInterface $connection */
        $connection = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool   = new Elasticsearch\ConnectionPool\DeadPool(null, $log);
        $deadPool->markDead($connection, (time() - 61));

        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array($connection), $retConnection);

    }//end testMarkDeadSingleConnection()


    /**
     * Test marking a single connection as dead without using time param
     * Uses a negative timeout to instantly invalidate all the times
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadSingleConnectionNoTimeParam()
    {
        /** @var ConnectionInterface $connection */
        $connection = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool   = new Elasticsearch\ConnectionPool\DeadPool(-60, $log);
        $deadPool->markDead($connection);

        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array($connection), $retConnection);

    }//end testMarkDeadSingleConnectionNoTimeParam()


    /**
     * Test marking multiple connections as dead
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadMultipleConnections()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool(null, $log);

        foreach (range(0, 100) as $i) {
            /** @var ConnectionInterface $connection */
            $connections[$i] = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
            $deadPool->markDead($connections[$i], (time() - 61));
        }

        $retConnection = $deadPool->resurrect();
        $this->assertEquals($connections, $retConnection);

    }//end testMarkDeadMultipleConnections()


    /**
     * Test marking multiple connections as dead, resurrecting one
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadMultipleConnectionsResurrectOne()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool(null, $log);

        foreach (range(0, 100) as $i) {
            /** @var ConnectionInterface $connection */
            $connections[$i] = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
            $deadPool->markDead($connections[$i], (time() + 60));
        }

        /** @var ConnectionInterface $connection */
        $toBeResurrected = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
        $deadPool->markDead($toBeResurrected, (time() - 61));

        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array($toBeResurrected), $retConnection);

    }//end testMarkDeadMultipleConnectionsResurrectOne()


    /**
     * Force connections to be resurrected
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadForceResurrection()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool(null, $log);

        foreach (range(0, 100) as $i) {
            /** @var ConnectionInterface $connection */
            $connections[$i] = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
            $deadPool->markDead($connections[$i], (time() + 60));
        }

        $retConnection = $deadPool->resurrect(true);
        $this->assertEquals(array($connections[0]), $retConnection);

    }//end testMarkDeadForceResurrection()


    /**
     * Ensure that eligible connections are prioritized even if force is specified
     *
     * @covers \Elasticsearch\ConnectionPool\DeadPool::markDead
     * @covers \Elasticsearch\ConnectionPool\DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadIgnoreForceWhenEligibleConnectionsExist()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool(null, $log);

        foreach (range(0, 100) as $i) {
            /** @var ConnectionInterface $connection */
            $connections[$i] = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
            $deadPool->markDead($connections[$i], (time() + 60));
        }

        /** @var ConnectionInterface $connection */
        $toBeResurrected = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
        $deadPool->markDead($toBeResurrected, (time() - 61));

        $retConnection = $deadPool->resurrect(true);
        $this->assertEquals(array($toBeResurrected), $retConnection);

    }//end testMarkDeadIgnoreForceWhenEligibleConnectionsExist()


}//end class