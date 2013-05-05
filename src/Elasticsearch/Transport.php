<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:51 PM
 */

namespace Elasticsearch;

use Elasticsearch\ConnectionPool\ConnectionPool;
use Elasticsearch\Common\Exceptions;

/**
 * Class Transport
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Transport
{
    /**
     * @var \Pimple
     */
    protected $params;

    /**
     * @var ConnectionPool
     */
    protected $connectionPool;


    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param array   $hosts  Array of hosts in cluster
     * @param \Pimple $params DIC containing dependencies
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @throws Common\Exceptions\BadMethodCallException
     */
    public function __construct($hosts, $params)
    {
        if (isset($hosts) !== true) {
            throw new Exceptions\BadMethodCallException('Hosts parameter must be set');
        }

        if (isset($params) !== true) {
            throw new Exceptions\BadMethodCallException('Params parameter must be set');
        }

        if (is_array($hosts) !== true) {
            throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array');
        }

        $this->params = $params;
        $connections = array();
        foreach ($hosts as $host) {
            $connections[] = $this->params['connection']($host['host'], $host['port']);
        }

        $this->connectionPool = $this->params['connectionPool']($connections);

    }//end __construct()


    /**
     * Add a new connection to the connectionPool
     *
     * @param array $host Assoc. array describing the host:port combo
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @return void
     */
    public function addConnection($host)
    {
        if (is_array($host) !== true) {
            throw new Exceptions\InvalidArgumentException('Host parameter must be an array');
        }

        if (isset($host['host']) !== true) {
            throw new Exceptions\InvalidArgumentException('Host must be provided in host parameter');
        }

        if (isset($host['port']) === true && is_numeric($host['port']) === false) {
            throw new Exceptions\InvalidArgumentException('Port must be numeric');
        }

        $connection = $this->params['connection']($host['host'], $host['port']);
        $this->connectionPool->addConnection($connection);
    }


    /**
     * @return array
     */
    public function getConnections()
    {
        return $this->connectionPool->getConnections();

    }//end getConnections()


}//end class