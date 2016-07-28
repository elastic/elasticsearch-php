<?php

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Endpoints\AbstractEndpoint;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
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
     * Perform a endpoint to the Cluster
     *
     * @param AbstractEndpoint $endpoint Endpoint to execute
     * @param array            $options  Options when executing the request
     *
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
     * @return array
     */
    public function performEndpoint(AbstractEndpoint $endpoint, $options = [])
    {
        $options = array_merge($endpoint->getParams(), $options);
        $options = $this->extractOptions($options);

        $result = $this->performRequest($endpoint->getMethod(), $endpoint->getURI(), null, $endpoint->getBody(), $options);
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
     * Perform a request to the Cluster
     *
     * @param string $method     HTTP method to use
     * @param string $uri        HTTP URI to send request to
     * @param null $params     Optional query parameters
     * @param null $body       Optional query body
     * @param array $options
     *
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
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
                //some kind of real faiure here, like a timeout
                $this->connectionPool->scheduleCheck();
                // log stuff
            });

        return $future;
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

    /**
     * @param array $params
     *
     * @return array
     */
    private function extractOptions($params)
    {
        $options = ['client' => []];

        // Extract out client options, then start transforming
        if (isset($params['client']) === true) {
            $options['client'] = $params['client'];
        }

        $ignore = isset($options['client']['ignore']) ? $options['client']['ignore'] : null;

        if (isset($ignore) === true) {
            if (is_string($ignore)) {
                $options['client']['ignore'] = explode(",", $ignore);
            } elseif (is_array($ignore)) {
                $options['client']['ignore'] = $ignore;
            } else {
                $options['client']['ignore'] = [$ignore];
            }
        }

        return $options;
    }
}
