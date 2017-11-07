<?php

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Connections\ConnectionInterface;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Transport
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Transport
{
    /**
     * @var AbstractConnectionPool
     */
    public $connectionPool;

    /**
     * @var LoggerInterface
     */
    private $log;

    /** @var  int */
    public $retryAttempts = 0;

    /** @var  Connection */
    public $lastConnection;

    /** @var int  */
    public $retries;

    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param $retries
     * @param bool $sniffOnStart
     * @param ConnectionPool\AbstractConnectionPool $connectionPool
     * @param \Psr\Log\LoggerInterface $log    Monolog logger object
     */
	// @codingStandardsIgnoreStart
	// "Arguments with default values must be at the end of the argument list" - cannot change the interface
    public function __construct($retries, $sniffOnStart = false, AbstractConnectionPool $connectionPool, LoggerInterface $log)
    {
	    // @codingStandardsIgnoreEnd

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
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
     * @return FutureArrayInterface
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

        $future = $connection->performRequest(
            $method,
            $uri,
            $params,
            $body,
            $options,
            $this
        );

        $future->promise()->then(
            //onSuccess
            function ($response) {
                $this->retryAttempts = 0;
                // Note, this could be a 4xx or 5xx error
            },
            //onFailure
            function ($response) {
                // Ignore 400 level errors, as that means the server responded just fine
                if (!(isset($response['code']) && $response['code'] >=400 && $response['code'] < 500)) {
                    // Otherwise schedule a check
                    $this->connectionPool->scheduleCheck();
                }
            }
        );

        return $future;
    }

    /**
     * @param FutureArrayInterface $result  Response of a request (promise)
     * @param array                $options Options for transport
     *
     * @return callable|array
     */
    public function resultOrFuture($result, $options = [])
    {
        $response = null;
        $async = isset($options['client']['future']) ? $options['client']['future'] : null;
        if (is_null($async) || $async === false) {
            do {
                $result = $result->wait();
            } while ($result instanceof FutureArrayInterface);

            return $result;
        } elseif ($async === true || $async === 'lazy') {
            return $result;
        }
    }

    /**
     * @param $request
     *
     * @return bool
     */
    public function shouldRetry($request)
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
     * @return Connection
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
    }
}
