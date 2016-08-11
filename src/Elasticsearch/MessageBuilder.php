<?php

namespace Elasticsearch;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Serializers\SerializerInterface;
use Http\Message\RequestFactory;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Create PSR7 Request from elasticsearch endpoints
 */
class MessageBuilder
{
    const FETCH_RESULT = 'result';
    const FETCH_PSR7_RESPONSE = 'response';
    const FETCH_PROMISE = 'promise';
    const FETCH_PROMISE_DESERIALIZED = 'promise_deserialized';
    
    /**
     * @var RequestFactory PSR7 Request factory to create a Request from any implementation
     */
    private $requestFactory;

    /**
     * @var SerializerInterface Serializer to transform body into json
     */
    private $serializer;

    public function __construct(RequestFactory $requestFactory, SerializerInterface $serializer)
    {
        $this->requestFactory = $requestFactory;
        $this->serializer = $serializer;
    }

    /**
     * Create a PSR 7 Request given an Elasticsearch Endpoint
     *
     * @param AbstractEndpoint $endpoint
     *
     * @return RequestInterface
     */
    public function createRequest(AbstractEndpoint $endpoint)
    {
        $body = null === $endpoint->getBody() ? null : $this->serializer->serialize($endpoint->getBody());

        return $this->requestFactory->createRequest(
            $endpoint->getMethod(),
            $this->createUri($endpoint->getURI(), $endpoint->getParams()),
            [
                'Content-Length' => null === $body ? 0 : strlen($body),
                'User-Agent' => 'Elasticsearch PHP Client',
            ],
            $body
        );
    }

    /**
     * Create a specific given a promise and a way to fetch it
     * 
     * @param Promise $promise
     * @param string  $fetch
     *
     * @throws \Exception
     * 
     * @return array|ResponseInterface|Promise
     */
    public function createResponse(Promise $promise, $fetch = self::FETCH_RESULT)
    {
        $serializer = $this->serializer;

        if ($fetch === self::FETCH_PROMISE) {
            return $promise;
        }

        if ($fetch === self::FETCH_PROMISE_DESERIALIZED) {
            return $promise->then(function (ResponseInterface $response) use($serializer) {
                return $serializer->deserialize($response->getBody()->getContents(), $response->getHeaders());
            });
        }

        /** @var ResponseInterface $response */
        $response = $promise->wait();
        
        if ($fetch === self::FETCH_PSR7_RESPONSE) {
            return $response;
        }

        $body = $response->getBody()->getContents();

        return $serializer->deserialize($body, $response->getHeaders());
    }

    /**
     * Create an uri
     *
     * @param string $uri
     * @param array  $parameters
     *
     * @return string
     */
    private function createUri($uri, array $parameters = [])
    {
        if (count($parameters) === 0) {
            return $uri;
        }

        $parameters = array_map(function ($value) {
            if (is_bool($value)) {
                return $value ? 'true' : 'false';
            }

            return $value;
        }, $parameters);

        return $uri . '?' . http_build_query($parameters);
    }
}
