<?php

declare(strict_types = 1);

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

    /**
     * @var int
     */
    public $retryAttempts = 0;

    /**
     * @var Connection
     */
    public $lastConnection;

    /**
     * @var int
     */
    public $retries;

    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param int                                   $retries
     * @param bool                                  $sniffOnStart
     * @param ConnectionPool\AbstractConnectionPool $connectionPool
     * @param \Psr\Log\LoggerInterface              $log            Monolog logger object
     */
    public function __construct(int $retries, AbstractConnectionPool $connectionPool, LoggerInterface $log, bool $sniffOnStart = false)
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
     */
    public function getConnection(): ConnectionInterface
    {
        return $this->connectionPool->nextConnection();
    }

    /**
     * Perform a request to the Cluster
     *
     * @param string $method  HTTP method to use
     * @param string $uri     HTTP URI to send request to
     * @param array  $params  Optional query parameters
     * @param null   $body    Optional query body
     * @param array  $options
     *
     * @throws Common\Exceptions\NoNodesAvailableException|\Exception
     */
    public function performRequest(string $method, string $uri, array $params = null, $body = null, array $options = []): FutureArrayInterface
    {
        try {
            $connection  = $this->getConnection();
        } catch (Exceptions\NoNodesAvailableException $exception) {
            $this->log->critical('No alive nodes found in cluster');
            throw $exception;
        }

        $response             = [];
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
    public function resultOrFuture(FutureArrayInterface $result, array $options = [])
    {
        $response = null;
        $async = isset($options['client']['future']) ? $options['client']['future'] : null;
        if (\is_null($async) || $async === false) {
            do {
                $result = $result->wait();
            } while ($result instanceof FutureArrayInterface);

            return $result;
        } elseif ($async === true || $async === 'lazy') {
            return $result;
        }
    }

    public function shouldRetry(array $request): bool
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
     */
    public function getLastConnection(): ConnectionInterface
    {
        return $this->lastConnection;
    }
}
