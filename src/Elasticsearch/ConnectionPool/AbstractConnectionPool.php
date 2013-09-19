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

abstract class AbstractConnectionPool
{

    /**
     * Array of connections
     *
     * @var AbstractConnection[]
     */
    protected  $connections;

    /**
     * Selector object, used to select a connection on each request
     *
     * @var SelectorInterface
     */
    protected $selector;

    /**
     * If set to true, connection list is randomized on construction
     * Prevents Thundering Herds. Defaults to true
     *
     * @var bool
     */
    protected $randomizeHosts;


    public function __construct($connections, SelectorInterface $selector, $randomizeHosts = true)
    {
        $paramList = array('connections', 'selector', 'randomizeHosts');
        foreach ($paramList as $param) {
            if (isset($$param) === false) {
                throw new InvalidArgumentException('`' . $param . '` parameter must not be null');
            }
        }

        if ($randomizeHosts === true) {
            shuffle($connections);
        }

        $this->connections    = $connections;
        $this->selector       = $selector;
        $this->randomizeHosts = $randomizeHosts;

    }


    /**
     * @param bool $force
     *
     * @return AbstractConnection
     */
    abstract public function nextConnection($force = false);

}