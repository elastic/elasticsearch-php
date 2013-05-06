<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:51 PM
 */

namespace Elasticsearch;

use Elasticsearch\ConnectionPool\ConnectionPool;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Sniffers\Sniffer;

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
    private $params;

    /**
     * @var ConnectionPool
     */
    private $connectionPool;

    private $requestCounter = 0;

    private $sniffsDueToFailure = 0;

    private $sniffAfterRequestsOriginal;

    private $sniffAfterRequests;

    private $sniffOnConnectionFail;

    /**
     * @var Sniffer
     */
    private $sniffer;

    private $transportSchema;


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

        $this->sniffAfterRequests         = $params['sniffAfterRequests'];
        $this->sniffAfterRequestsOriginal = $params['sniffAfterRequests'];
        $this->sniffOnConnectionFail      = $params['sniffOnConnectionFail'];
        $this->sniffer                    = $params['sniffer'];
        $this->setConnections($hosts);

        if ($this->params['sniffOnStart'] === true) {
            $this->sniffHosts();
        }

    }//end __construct()


    /**
     * Creates Connection objects and instantiates a ConnectionPool object
     *
     * @param array $hosts Assoc array of hosts to add to connection pool
     *
     * @return void
     */
    public function setConnections($hosts)
    {
        $connections = array();
        foreach ($hosts as $host) {
            if (isset($host['port']) === true) {
                $connections[] = $this->params['connection']($host['host'], $host['port']);
            } else {
                $connections[] = $this->params['connection']($host['host']);
            }
        }

        $this->transportSchema = $connections[0]->getTransportSchema();
        $this->connectionPool = $this->params['connectionPool']($connections);

    }//end setConnections()


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

    }//end addConnection()


    /**
     * Return an array of all connections in the ConnectionPool
     *
     * @return array
     */
    public function getAllConnections()
    {
        return $this->connectionPool->getConnections();

    }//end getAllConnections()


    public function sniffHosts($failure=false)
    {
        $this->requestCounter = 0;
        $nodeInfo = $this->performRequest('GET', '/_cluster/nodes');
        $hosts = $this->sniffer->parseNodes($this->transportSchema, $nodeInfo);
        $this->setConnections($hosts);

        if ($failure === true) {
            $this->sniffsDueToFailure += 1;
            $this->sniffAfterRequests  = (1 + ($this->sniffAfterRequestsOriginal / pow(2,$this->sniffsDueToFailure)));

        } else {
            $this->sniffsDueToFailure = 0;
            $this->sniffAfterRequests = $this->sniffAfterRequestsOriginal;
        }

    }//end sniffHosts()




    public function performRequest($method, $uri, $params=null, $body=null)
    {

    }//end performRequest()

}//end class