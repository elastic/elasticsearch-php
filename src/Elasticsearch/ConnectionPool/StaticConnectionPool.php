<?php
/**
 * User: zach
 * Date: 9/18/13
 * Time: 7:36 PM
 */

namespace Elasticsearch\ConnectionPool;


use Elasticsearch\Common\Exceptions\NoNodesAvailableException;
use Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Elasticsearch\Connections\AbstractConnection;
use Elasticsearch\Connections\ConnectionFactory;

class StaticConnectionPool extends AbstractConnectionPool
{
    private $pingTimeout    = 60;
    private $maxPingTimeout = 3600;

    public function __construct($connections, SelectorInterface $selector, ConnectionFactory $factory, $connectionPoolParams)
    {
        parent::__construct($connections, $selector, $factory, $connectionPoolParams);
        $this->scheduleCheck();
    }


    /**
     * @param bool $force
     *
     * @return AbstractConnection
     * @throws \Elasticsearch\Common\Exceptions\NoNodesAvailableException
     */
    public function nextConnection($force = false)
    {
        $skipped = array();

        $total = count($this->connections);
        while ($total--) {
            /** @var AbstractConnection $connection */
            $connection = $this->selector->select($this->connections);
            if ($connection->isAlive() === true) {
               return $connection;
            }

            if ($this->readyToRevive($connection) === true) {
                if ($connection->ping() === true) {
                    return $connection;
                }
            } else {
                $skipped[] = $connection;
            }
        }

        // All "alive" nodes failed, force pings on "dead" nodes
        foreach ($skipped as $connection) {
            if ($connection->ping() === true) {
                return $connection;
            }
        }

        throw new NoNodesAvailableException("No alive nodes found in your cluster");
    }

    public function scheduleCheck()
    {
        foreach ($this->connections as $connection) {
            $connection->markDead();
        }
    }

    /**
     * @param AbstractConnection $connection
     *
     * @return bool
     */
    private function readyToRevive(AbstractConnection $connection)
    {
        $timeout = min(
            $this->pingTimeout * pow(2, $connection->getPingFailures()),
            $this->maxPingTimeout
        );

        if ($connection->getLastPing() + $timeout < time()) {
            return true;
        } else {
            return false;
        }
    }
}