<?php
/**
 * User: zach
 * Date: 9/18/13
 * Time: 7:25 PM
 */

namespace Elasticsearch\ConnectionPool;


use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\ConnectionPool\Selectors\SelectorInterface;
use Elasticsearch\Connections\AbstractConnection;
use Elasticsearch\Connections\ConnectionFactory;

abstract class AbstractConnectionPool
{

    /**
     * Array of connections
     *
     * @var AbstractConnection[]
     */
    protected  $connections;

    /**
     * Array of initial seed connections
     *
     * @var AbstractConnection[]
     */
    protected  $seedConnections;

    /**
     * Selector object, used to select a connection on each request
     *
     * @var SelectorInterface
     */
    protected $selector;


    /** @var \Elasticsearch\Connections\ConnectionFactory  */
    protected $connectionFactory;

    public function __construct($connections, SelectorInterface $selector, ConnectionFactory $factory, $connectionPoolParams)
    {
        $paramList = array('connections', 'selector', 'connectionPoolParams');
        foreach ($paramList as $param) {
            if (isset($$param) === false) {
                throw new InvalidArgumentException('`' . $param . '` parameter must not be null');
            }
        }

        if (isset($connectionPoolParams['randomizeHosts']) === true
            && $connectionPoolParams['randomizeHosts'] === true) {
            shuffle($connections);
        }

        $this->connections          = $connections;
        $this->seedConnections      = $connections;
        $this->selector             = $selector;
        $this->connectionPoolParams = $connectionPoolParams;
        $this->connectionFactory    = $factory;

    }


    /**
     * @param bool $force
     *
     * @return AbstractConnection
     */
    abstract public function nextConnection($force = false);

    abstract public function scheduleCheck();

}