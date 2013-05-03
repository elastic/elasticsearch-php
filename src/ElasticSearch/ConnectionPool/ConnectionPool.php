<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace ElasticSearch\ConnectionPool;


use ElasticSearch\Common\Exceptions;
use ElasticSearch\ConnectionPool\Selectors\SelectorInterface;

class ConnectionPool
{

    /**
     * @var array
     */
    protected $connections;

    /**
     * @var SelectorInterface
     */
    protected $selector;

    /**
     * @var int
     */
    protected $deadTimeout;

    /**
     * @var bool
     */
    protected $randomizeHosts;

    /**
     * @var array
     */
    protected $dead = array();


    public function __construct($connections, $selector,  $deadTimeout=60, $randomizeHosts=true)
    {
        $paramList = array('connections', 'deadTimeout', 'selector', 'randomizeHosts');
        foreach ($paramList as $param) {
            if (isset($$param) === false) {
                throw new InvalidArgumentException('`'.$param.'` parameter must be set');
            }
        }

        if ($randomizeHosts === true) {
            shuffle($connections);
        }

        $this->connections    = $connections;
        $this->selector       = $selector;
        $this->deadTimeout    = $deadTimeout;
        $this->randomizeHosts = $randomizeHosts;

    }

    public function addConnection($connection)
    {

    }


    /**
     * @return array
     */
    public function getConnections()
    {
        return $this->connections;
    }
}