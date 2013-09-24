<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:51 PM
 */

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\MaxRetriesException;
use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\ConnectionPool\ConnectionPool;
use Elasticsearch\Connections\AbstractConnection;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Sniffers\Sniffer;
use Monolog\Logger;

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
     * @var AbstractConnectionPool
     */
    private $connectionPool;

    /**
     * @var array Array of seed nodes provided by the user
     */
    private $seeds = array();

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Logger
     */
    private $log;


    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param array   $hosts  Array of hosts in cluster
     * @param \Pimple $params DIC containing dependencies
     * @param Logger  $log    Monolog logger object
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\BadMethodCallException
     */
    public function __construct($hosts, $params, $log)
    {
        $this->log = $log;

        if (is_array($hosts) !== true) {
            $this->log->addCritical('Hosts parameter must be an array');
            throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array');
        }

        $this->params     = $params;
        $this->serializer = $params['serializer'];

        $this->seeds = $hosts;
        $this->setConnections($hosts);

        if ($params['sniffOnStart'] === true) {
            $this->log->addNotice('Sniff on Start.');
            $this->connectionPool->scheduleCheck();
        }

    }


    /**
     * Creates Connection objects and instantiates a ConnectionPool object
     *
     * @param array $hosts Assoc array of hosts to add to connection pool
     *
     * @return void
     */
    public function setConnections($hosts)
    {
        // Merge in the initial seed list (union not array_merge).
        $hosts = $hosts + $this->seeds;

        $connections = $this->hostsToConnections($hosts);

        $this->connectionPool  = $this->params['connectionPool']($connections);

    }


    /**
     * Returns a single connection from the connection pool
     * Potentially performs a sniffing step before returning
     *
     * @return ConnectionInterface Connection
     */

    public function getConnection()
    {
        return $this->connectionPool->nextConnection();
    }


    /**
     * Perform a request to the Cluster
     *
     * @param string $method     HTTP method to use
     * @param string $uri        HTTP URI to send request to
     * @param null   $params     Optional query parameters
     * @param null   $body       Optional query body
     *
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
     * @internal param null $maxRetries Optional number of retries
     *
     * @return array
     */
    public function performRequest($method, $uri, $params = null, $body = null)
    {
        try {
            $connection  = $this->getConnection();
        } catch (Exceptions\NoNodesAvailableException $exception) {
            $this->log->addCritical('No alive nodes found in cluster');
            throw $exception;
        }

        $shouldRetry = true;
        $response    = array();

        try {
            if (isset($body) === true) {
                $body = $this->serializer->serialize($body);
            }

            $response = $connection->performRequest(
                $method,
                $uri,
                $params,
                $body
            );

            $connection->markAlive();

            $data = $this->serializer->deserialize($response['text']);

            return array(
                'status' => $response['status'],
                'data'   => $data,
                'info'   => $response['info'],
            );

        } catch (Exceptions\Curl\OperationTimeoutException $exception) {
            $this->connectionPool->scheduleCheck();

        } catch (TransportException $exception) {
            $connection->markDead();
            $this->connectionPool->scheduleCheck();
            $shouldRetry = $this->shouldRetry($method, $uri, $params, $body);
        }

        if ($shouldRetry === true) {
            return $this->performRequest($method, $uri, $params, $body);
        }

        return $response;
    }


    public function shouldRetry($method, $uri, $params, $body)
    {
        return true;
    }


    /**
     * Convert host arrays into connections
     *
     * @param array $hosts Assoc array of host values
     *
     * @return AbstractConnection[]
     */
    private function hostsToConnections($hosts)
    {
        $connections = array();
        foreach ($hosts as $host) {
            if (isset($host['port']) === true) {
                $connections[] = $this->params['connection'](
                    $host['host'],
                    $host['port']
                );
            } else {
                $connections[] = $this->params['connection']($host['host']);
            }
        }

        return $connections;

    }


}