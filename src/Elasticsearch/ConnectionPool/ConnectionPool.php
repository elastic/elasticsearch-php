<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\ConnectionPool;


use Elasticsearch\Common\Exceptions;
use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Elasticsearch\ConnectionPool\DeadPool;
use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class ConnectionPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool\ConnectionPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ConnectionPool
{

    /**
     * Array of connections
     *
     * @var array
     */
    private $connections;

    /**
     * Selector object, used to select a connection on each request
     *
     * @var SelectorInterface
     */
    private $selector;

    /**
     * If set to true, connection list is randomized on construction
     * Prevents Thundering Herds. Defaults to true
     *
     * @var bool
     */
    private $randomizeHosts;

    /**
     * Deadpool object contains a list of dead connections
     * Responsible for retry timing and logic
     *
     * @var DeadPool
     */
    private $deadPool;


    /**
     * ConnectionPool Constructor
     *
     * @param array             $connections    Array of connections
     * @param SelectorInterface $selector       Selector object used to return connections
     * @param DeadPool          $deadPool       Deadpool object holds dead connections
     * @param bool              $randomizeHosts If set to true, connections are randomized to prevent thundering herds
     *
     * @throws InvalidArgumentException
     */
    public function __construct($connections, SelectorInterface $selector, DeadPool $deadPool, $randomizeHosts=true)
    {
        $paramList = array('connections', 'deadPool', 'selector', 'randomizeHosts');
        foreach ($paramList as $param) {
            if (isset($$param) === false) {
                throw new InvalidArgumentException('`'.$param.'` parameter must not be null');
            }
        }

        if ($randomizeHosts === true) {
            shuffle($connections);
        }

        $this->connections    = $connections;
        $this->selector       = $selector;
        $this->deadPool       = $deadPool;
        $this->randomizeHosts = $randomizeHosts;

    }//end __construct()


    /**
     * Find and return a connection from the pool
     *
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        $this->resurrect();

        // Still no connections in the pool?  Force a resurrection.
        if (count($this->connections) === 0) {
            $this->resurrect(true);
        }

        return $this->selector->select($this->connections);

    }//end getConnection()


    /**
     * Query our deadpool to see if any nodes can be returned to the connection list
     *
     * @param bool $force If set to true, forces the Deadpool to resurrect a
     * connection, even if the timeout has not expired yet
     *
     * @return void
     */
    public function resurrect($force=false)
    {
        array_push($this->connections, $this->deadPool->resurrect($force));

    }//end resurrect()


    /**
     * Add a new connection to the pool
     *
     * @param ConnectionInterface $connection Connection object to add to the pool
     *
     * @return void
     */
    public function addConnection($connection)
    {
        $this->connections[] = $connection;

    }//end addConnection()


    /**
     * Mark a connection as dead
     * Removes the connection from the active list and adds
     * it to the deadpool
     *
     * @param ConnectionInterface $connection Connection object to remove
     *
     * @return void
     */
    public function markDead($connection)
    {
        $position = array_search($connection, $this->connections, true);
        $this->deadPool->markDead($this->connections[$position]);
        unset($this->connections[$position]);

    }//end markDead()


    /**
     * Return an array of all active connections
     *
     * @return array
     */
    public function getAllConnections()
    {
        return $this->connections;

    }//end getAllConnections()

}