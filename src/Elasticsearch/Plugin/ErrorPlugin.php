<?php

namespace Elasticsearch\Plugin;

use Elasticsearch\Common\Exceptions\AlreadyExpiredException;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\NoShardAvailableException;
use Elasticsearch\Common\Exceptions\RequestTimeout408Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\Serializers\SerializerInterface;
use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Transform 4XX and 5XX Response into elasticsearch exception
 */
class ErrorPlugin implements Plugin
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        return $next($request)->then(function (ResponseInterface $response) use ($request) {
            if ($response->getStatusCode() >= 400 && $response->getStatusCode() < 500) {
                $this->process4xxError($request, $response);
            }

            if ($response->getStatusCode() >= 500 && $response->getStatusCode() < 600) {
                $this->process5xxError($request, $response);
            }

            return $response;
        });
    }

    /**
     * Create a 4XX Exception
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @throws AlreadyExpiredException
     * @throws BadRequest400Exception
     * @throws Conflict409Exception
     * @throws Forbidden403Exception
     * @throws Missing404Exception
     * @throws ScriptLangNotSupportedException
     */
    private function process4xxError(RequestInterface $request, ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = (string)$response->getBody();

        $exception = $this->tryDeserialize400Error($response);

        if ($statusCode === 400 && strpos($responseBody, "AlreadyExpiredException") !== false) {
            $exception = new AlreadyExpiredException($responseBody, $statusCode);
        } elseif ($statusCode === 403) {
            $exception = new Forbidden403Exception($responseBody, $statusCode);
        } elseif ($statusCode === 404) {
            $exception = new Missing404Exception($responseBody, $statusCode);
        } elseif ($statusCode === 409) {
            $exception = new Conflict409Exception($responseBody, $statusCode);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            $exception = new ScriptLangNotSupportedException($responseBody. $statusCode);
        } elseif ($statusCode === 408) {
            $exception = new RequestTimeout408Exception($responseBody, $statusCode);
        }

        throw $exception;
    }

    /**
     * Create a 5XX Exception
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @throws NoDocumentsToGetException
     * @throws NoShardAvailableException
     * @throws RoutingMissingException
     * @throws ServerErrorResponseException
     */
    private function process5xxError(RequestInterface $request, ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = (string)$response->getBody();

        $exception = $this->tryDeserialize500Error($response);

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            $exception = new RoutingMissingException($exception->getMessage(), $statusCode, $exception);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/', $responseBody) === 1) {
            $exception = new NoDocumentsToGetException($exception->getMessage(), $statusCode, $exception);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            $exception = new NoShardAvailableException($exception->getMessage(), $statusCode, $exception);
        }

        throw $exception;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return BadRequest400Exception
     */
    private function tryDeserialize400Error(ResponseInterface $response)
    {
        return $this->tryDeserializeError($response, 'Elasticsearch\Common\Exceptions\BadRequest400Exception');
    }

    /**
     * @param ResponseInterface $response
     *
     * @return ServerErrorResponseException
     */
    private function tryDeserialize500Error(ResponseInterface $response)
    {
        return $this->tryDeserializeError($response, 'Elasticsearch\Common\Exceptions\ServerErrorResponseException');
    }

    /**
     * Return a new elasticsearch exception
     *
     * @param ResponseInterface $response
     * @param string            $errorClass
     *
     * @return \Exception
     */
    private function tryDeserializeError(ResponseInterface $response, $errorClass)
    {
        $body = (string)$response->getBody();
        $status = $response->getStatusCode();
        $error = $this->serializer->deserialize($body, $response->getHeaders());

        if (is_array($error) === true) {
            // 2.0 structured exceptions
            if (isset($error['error']['reason']) === true) {

                // Try to use root cause first (only grabs the first root cause)
                $root = $error['error']['root_cause'];
                if (isset($root) && isset($root[0])) {
                    $cause = $root[0]['reason'];
                    $type = $root[0]['type'];
                } else {
                    $cause = $error['error']['reason'];
                    $type = $error['error']['type'];
                }

                $original = new $errorClass($body, $status);

                return new $errorClass("$type: $cause", $status, $original);
            } elseif (isset($error['error']) === true) {
                // <2.0 semi-structured exceptions
                $original = new $errorClass($body, $status);

                return new $errorClass($body, $status, $original);
            }

            // <2.0 "i just blew up" nonstructured exception
            // $error is an array but we don't know the format, reuse the response body instead
            return new $errorClass($body, $status);
        }

        // <2.0 "i just blew up" nonstructured exception
        return new $errorClass($error, $status);
    }
}
