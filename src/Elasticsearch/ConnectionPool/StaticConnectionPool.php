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
        $total = count($this->connections);
        while ($total--) {
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

    public function scheduleCheck()
    {
        foreach ($this->connections as $connection) {
            /** @var AbstractConnection $connection */
            $connection->ping();
        }
    }
}