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

class StaticConnectionPool extends AbstractConnectionPool
{
    public function __construct($connections, SelectorInterface $selector, $randomizeHosts = true)
    {
        parent::__construct($connections, $selector, $randomizeHosts);
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
        $size = count($this->connections);
        while ($size--) {
            /** @var AbstractConnection $connection */
            $connection = $this->selector->select($this->connections);
            if ($connection->isAlive() === true || $connection->ping() === true) {
               return $connection;
            }
        }

        if ($force === true) {
            throw new NoNodesAvailableException("No alive nodes found in your cluster");
        }

        return $this->nextConnection(true);


    }

    private function scheduleCheck()
    {
        foreach ($this->connections as $connection) {
            /** @var AbstractConnection $connection */
            $connection->ping();
        }
    }
}