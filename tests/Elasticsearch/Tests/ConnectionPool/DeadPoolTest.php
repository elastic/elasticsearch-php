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
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadEmptyResurrection()
    {
        $deadPool      = new Elasticsearch\ConnectionPool\DeadPool();
        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array(), $retConnection);

    }//end testMarkDeadEmptyResurrection()


    /**
     * Make sure resurrect returns an empty array
     * when no connections exist (with Force)
     *
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadEmptyResurrectionWithForce()
    {
        $deadPool      = new Elasticsearch\ConnectionPool\DeadPool();
        $retConnection = $deadPool->resurrect(true);
        $this->assertEquals(array(), $retConnection);

    }//end testMarkDeadEmptyResurrectionWithForce()


    /**
     * Test marking a single connection as dead
     *
     * @covers DeadPool::markDead
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadSingleConnection()
    {
        /** @var ConnectionInterface $connection */
        $connection = $this->getMock('\Elasticsearch\Connections\ConnectionInterface');
        $deadPool   = new Elasticsearch\ConnectionPool\DeadPool();
        $deadPool->markDead($connection, (time() - 61));

        $retConnection = $deadPool->resurrect();
        $this->assertEquals(array($connection), $retConnection);

    }//end testMarkDeadSingleConnection()


    /**
     * Test marking multiple connections as dead
     *
     * @covers DeadPool::markDead
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadMultipleConnections()
    {
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool();

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
     * @covers DeadPool::markDead
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadMultipleConnectionsResurrectOne()
    {
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool();

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
     * @covers DeadPool::markDead
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadForceResurrection()
    {
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool();

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
     * @covers DeadPool::markDead
     * @covers DeadPool::resurrect
     * @return void
     */
    public function testMarkDeadIgnoreForceWhenEligibleConnectionsExist()
    {
        $deadPool = new Elasticsearch\ConnectionPool\DeadPool();

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