<?php

namespace Elasticsearch\Plugin;

use Elasticsearch\Common\Exceptions\Http as HttpException;
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
     * Throw a 4XX Exception
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @throws HttpException\AlreadyExpiredException
     * @throws HttpException\BadRequest400Exception
     * @throws HttpException\Conflict409Exception
     * @throws HttpException\Forbidden403Exception
     * @throws HttpException\Missing404Exception
     * @throws HttpException\ScriptLangNotSupportedException
     */
    private function process4xxError(RequestInterface $request, ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = (string)$response->getBody();

        $exception = $this->tryDeserialize400Error($request, $response, $responseBody);

        if ($statusCode === 400 && strpos($responseBody, "AlreadyExpiredException") !== false) {
            $exception = new HttpException\AlreadyExpiredException($responseBody, $request, $response);
        } elseif ($statusCode === 403) {
            $exception = new HttpException\Forbidden403Exception($responseBody, $request, $response);
        } elseif ($statusCode === 404) {
            $exception = new HttpException\Missing404Exception($responseBody, $request, $response);
        } elseif ($statusCode === 409) {
            $exception = new HttpException\Conflict409Exception($responseBody, $request, $response);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            $exception = new HttpException\ScriptLangNotSupportedException($responseBody, $request, $response);
        } elseif ($statusCode === 408) {
            $exception = new HttpException\RequestTimeout408Exception($responseBody, $request, $response);
        }

        throw $exception;
    }

    /**
     * Throw a 5XX Exception
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @throws HttpException\NoDocumentsToGetException
     * @throws HttpException\NoShardAvailableException
     * @throws HttpException\RoutingMissingException
     * @throws HttpException\ServerErrorResponseException
     */
    private function process5xxError(RequestInterface $request, ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = (string)$response->getBody();

        $exception = $this->tryDeserialize500Error($request, $response, $responseBody);

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            $exception = new HttpException\RoutingMissingException($exception->getMessage(), $request, $response, $exception);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/', $responseBody) === 1) {
            $exception = new HttpException\NoDocumentsToGetException($exception->getMessage(), $request, $response, $exception);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            $exception = new HttpException\NoShardAvailableException($exception->getMessage(), $request, $response, $exception);
        }

        throw $exception;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @return HttpException\BadRequest400Exception
     */
    private function tryDeserialize400Error(RequestInterface $request, ResponseInterface $response, $responseBody)
    {
        return $this->tryDeserializeError($request, $response, $responseBody, 'Elasticsearch\Common\Exceptions\Http\BadRequest400Exception');
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     *
     * @return HttpException\ServerErrorResponseException
     */
    private function tryDeserialize500Error(RequestInterface $request, ResponseInterface $response, $responseBody)
    {
        return $this->tryDeserializeError($request, $response, $responseBody, 'Elasticsearch\Common\Exceptions\Http\ServerErrorResponseException');
    }

    /**
     * Return a new elasticsearch exception
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param string            $errorClass
     *
     * @return \Exception
     */
    private function tryDeserializeError(RequestInterface $request, ResponseInterface $response, $responseBody, $errorClass)
    {
        $error = $this->serializer->deserialize($responseBody, $response->getHeaders());

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

                $original = new $errorClass($responseBody, $request, $response);

                return new $errorClass("$type: $cause", $request, $response, $original);
            } elseif (isset($error['error']) === true) {
                // <2.0 semi-structured exceptions
                $original = new $errorClass($responseBody, $request, $response);

                return new $errorClass($responseBody, $request, $response, $original);
            }

            // <2.0 "i just blew up" nonstructured exception
            // $error is an array but we don't know the format, reuse the response body instead
            return new $errorClass($responseBody, $request, $response);
        }

        // <2.0 "i just blew up" nonstructured exception
        return new $errorClass($error, $request, $response);
    }
}
