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
use Elasticsearch\Connections\ConnectionFactory;
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
     * @var AbstractConnectionPool
     */
    private $connectionPool;


    /**
     * @var LoggerInterface
     */
    private $log;

    /** @var  int */
    private $retryAttempts;

    /** @var  Connection */
    private $lastConnection;

    /** @var int  */
    private $retries;



    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param array $hosts  Array of hosts in cluster
     * @param $retries
     * @param bool $sniffOnStart
     * @param Connections\ConnectionFactory $connectionFactory
     * @param ConnectionPool\AbstractConnectionPool $connectionPool
     * @param Serializers\SerializerInterface $serializer
     * @param \Psr\Log\LoggerInterface $log    Monolog logger object
     *
     * @throws Common\Exceptions\InvalidArgumentException
     * @internal param \Pimple\Container $params DIC containing dependencies
     */
    public function __construct($retries, $sniffOnStart = false, AbstractConnectionPool $connectionPool, LoggerInterface $log)
    {

        $this->log            = $log;
        $this->connectionPool = $connectionPool;
        $this->retries        = $retries;

        if ($sniffOnStart === true) {
            $this->log->notice('Sniff on Start.');
            $this->connectionPool->scheduleCheck();
        }

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
     * @param null $params     Optional query parameters
     * @param null $body       Optional query body
     * @param array $options
     *
     * @throws Common\Exceptions\ServerErrorResponseException|\Exception
     * @throws Common\Exceptions\ClientErrorResponseException|\Exception
     * @throws Common\Exceptions\Curl\OperationTimeoutException|Common\Exceptions\TransportException|\Exception
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
     * @internal param null $maxRetries Optional number of retries
     *
     * @return array
     */
    public function performRequest($method, $uri, $params = null, $body = null, $options = [])
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

            $response = $connection->performRequest(
                $method,
                $uri,
                $params,
                $body,
                $options
            );

            $response->promise()->then(function($response) {
                $this->retryAttempts = 0;
                //TODO check success vs failure
            });

            return $response;

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
        if ($this->retryAttempts < $this->retries) {
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


}