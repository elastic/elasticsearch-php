<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:51 PM
 */

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\Connections\AbstractConnection;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Serializers\SerializerInterface;
use Psr\Log\LoggerInterface;

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
     * @var LoggerInterface
     */
    private $log;

    /** @var  int */
    private $retryAttempts;

    /** @var  AbstractConnection */
    private $lastConnection;


    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param array                    $hosts  Array of hosts in cluster
     * @param \Pimple                  $params DIC containing dependencies
     * @param \Psr\Log\LoggerInterface $log    Monolog logger object
     *
     * @throws Common\Exceptions\InvalidArgumentException
     */
    public function __construct($hosts, $params, LoggerInterface $log)
    {
        $this->log = $log;

        if (is_array($hosts) !== true) {
            $this->log->critical('Hosts parameter must be an array');
            throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array');
        }

        $this->params     = $params;
        $this->serializer = $params['serializer'];

        $this->seeds = $hosts;
        $this->setConnections($hosts);

        if (isset($this->params['retries']) !== true || $this->params['retries'] === null) {
            $this->params['retries'] = count($hosts) -1;
        }

        if ($params['sniffOnStart'] === true) {
            $this->log->notice('Sniff on Start.');
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
            $this->log->critical('No alive nodes found in cluster');
            throw $exception;
        }

        $response             = array();
        $caughtException      = null;
        $this->lastConnection = $connection;

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
            $this->retryAttempts = 0;

            $data = $this->serializer->deserialize($response['text'], $response['info']);

            return array(
                'status' => $response['status'],
                'data'   => $data,
                'info'   => $response['info'],
            );

        } catch (Exceptions\Curl\OperationTimeoutException $exception) {
            $this->connectionPool->scheduleCheck();
            $caughtException = $exception;

        } catch (Exceptions\ClientErrorResponseException $exception) {
            throw $exception;   //We need 4xx errors to go straight to the user, no retries

        } catch (Exceptions\ServerErrorResponseException $exception) {
            throw $exception;   //We need 5xx errors to go straight to the user, no retries

        } catch (TransportException $exception) {
            $connection->markDead();
            $this->connectionPool->scheduleCheck();
            $caughtException = $exception;
        }

        $shouldRetry = $this->shouldRetry($method, $uri, $params, $body);
        if ($shouldRetry === true) {
            return $this->performRequest($method, $uri, $params, $body);
        }

        if ($caughtException !== null) {
            throw $caughtException;
        }

        return $response;
    }


    /**
     * @param $method
     * @param $uri
     * @param $params
     * @param $body
     *
     * @return bool
     */
    public function shouldRetry($method, $uri, $params, $body)
    {
        if ($this->retryAttempts < $this->params['retries']) {
            $this->retryAttempts += 1;
            return true;
        }

        return false;
    }


    /**
     * Returns the last used connection so that it may be inspected.  Mainly
     * for debugging/testing purposes.
     *
     * @return AbstractConnection
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
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
            $connections[] = $this->params['connection'](
                $host
            );
        }

        return $connections;

    }


}