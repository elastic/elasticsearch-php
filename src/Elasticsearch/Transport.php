<?php

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Connections\ConnectionInterface;
use Elasticsearch\Endpoints\AbstractEndpoint;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use Http\Client\Exception;
use Http\Client\HttpAsyncClient;
use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;
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
     * @var HttpAsyncClient
     */
    private $httpAsyncClient;

    /**
     * @var MessageBuilder
     */
    private $messageBuilder;

    /**
     * Transport class is responsible for dispatching requests to the
     * underlying cluster connections
     *
     * @param HttpAsyncClient $httpAsyncClient An http client to do async requests
     * @param MessageBuilder  $messageBuilder
     * @param bool            $sniffOnStart
     */
    public function __construct(HttpAsyncClient $httpAsyncClient, MessageBuilder $messageBuilder, $sniffOnStart = false)
    {
        $this->httpAsyncClient = $httpAsyncClient;
        $this->messageBuilder = $messageBuilder;
    }

    /**
     * Perform a request to the Cluster
     *
     * @param AbstractEndpoint $endpoint Endpoint to use
     * @param string           $fetch
     *
     * @throws \Exception
     *
     * @return array|ResponseInterface|Promise
     */
    public function performRequest(AbstractEndpoint $endpoint, $fetch = null)
    {
        $request = $this->messageBuilder->createRequest($endpoint);
        $promise = $this->httpAsyncClient->sendAsyncRequest($request);
        $options = $endpoint->getOptions();

        if (array_key_exists('client', $options)) {
            if (array_key_exists('ignore', $options['client'])) {
                $promise = $promise->then(null, function ($exception) use ($options) {
                    if (
                        $exception instanceof Exception\HttpException &&
                        in_array($exception->getResponse()->getStatusCode(), $options['client']['ignore'], true)
                    ) {
                        return $exception->getResponse();
                    }

                    throw $exception;
                });
            }

            if (null === $fetch && array_key_exists('future', $options['client']) && $options['client']['future'] === true) {
                $fetch = MessageBuilder::FETCH_PROMISE_DESERIALIZED;
            }
        }

        if (null === $fetch) {
            $fetch = MessageBuilder::FETCH_RESULT;
        }

        return $this->messageBuilder->createResponse($promise, $fetch);
    }
}
