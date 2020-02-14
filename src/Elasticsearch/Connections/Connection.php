<?php

declare(strict_types = 1);

namespace Elasticsearch\Connections;

use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost;
use Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException;
use Elasticsearch\Common\Exceptions\Curl\OperationTimeoutException;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\MaxRetriesException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\NoShardAvailableException;
use Elasticsearch\Common\Exceptions\RequestTimeout408Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;
use GuzzleHttp\Ring\Core;
use GuzzleHttp\Ring\Exception\ConnectException;
use GuzzleHttp\Ring\Exception\RingException;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractConnection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Connection implements ConnectionInterface
{
    /**
     * @var callable
     */
    protected $handler;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $transportSchema = 'http';    // TODO depreciate this default

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string|null
     */
    protected $path;

    /**
    * @var int
    */
    protected $port;

    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var LoggerInterface
     */
    protected $trace;

    /**
     * @var array
     */
    protected $connectionParams;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var bool
     */
    protected $isAlive = false;

    /**
     * @var float
     */
    private $pingTimeout = 1;    //TODO expose this

    /**
     * @var int
     */
    private $lastPing = 0;

    /**
     * @var int
     */
    private $failedPings = 0;

    /**
     * @var mixed[]
     */
    private $lastRequest = array();

    /**
     * @var string
     */
    private $OSVersion = null;

    public function __construct(
        callable $handler,
        array $hostDetails,
        array $connectionParams,
        SerializerInterface $serializer,
        LoggerInterface $log,
        LoggerInterface $trace
    ) {

        if (isset($hostDetails['port']) !== true) {
            $hostDetails['port'] = 9200;
        }

        if (isset($hostDetails['scheme'])) {
            $this->transportSchema = $hostDetails['scheme'];
        }

        // Only Set the Basic if API Key is not set and setBasicAuthentication was not called prior
        if (isset($connectionParams['client']['headers']['Authorization']) === false
                && isset($connectionParams['client']['curl'][CURLOPT_HTTPAUTH]) === false
                && isset($hostDetails['user'])
                && isset($hostDetails['pass'])) {
            $connectionParams['client']['curl'][CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;
            $connectionParams['client']['curl'][CURLOPT_USERPWD] = $hostDetails['user'].':'.$hostDetails['pass'];
        }

        $connectionParams['client']['curl'][CURLOPT_PORT] = $hostDetails['port'];

        if (isset($connectionParams['client']['headers'])) {
            $this->headers = $connectionParams['client']['headers'];
            unset($connectionParams['client']['headers']);
        }

        // Add the User-Agent using the format: <client-repo-name>/<client-version> (metadata-values)
        $this->headers['User-Agent'] = [sprintf(
            "elasticsearch-php/%s (%s %s; PHP %s)",
            Client::VERSION,
            PHP_OS,
            $this->getOSVersion(),
            phpversion()
        )];

        $host = $hostDetails['host'];
        $path = null;
        if (isset($hostDetails['path']) === true) {
            $path = $hostDetails['path'];
        }
        $port = $hostDetails['port'];

        $this->host             = $host;
        $this->path             = $path;
        $this->port             = $port;
        $this->log              = $log;
        $this->trace            = $trace;
        $this->connectionParams = $connectionParams;
        $this->serializer       = $serializer;

        $this->handler = $this->wrapHandler($handler);
    }

    /**
     * @param  string    $method
     * @param  string    $uri
     * @param  array     $params
     * @param  null      $body
     * @param  array     $options
     * @param  Transport $transport
     * @return mixed
     */
    public function performRequest(string $method, string $uri, ?array $params = [], $body = null, array $options = [], Transport $transport = null)
    {
        if ($body !== null) {
            $body = $this->serializer->serialize($body);
        }

        if (isset($options['client']['headers']) && is_array($options['client']['headers'])) {
            $this->headers = array_merge($this->headers, $options['client']['headers']);
        }

        $host = $this->host;
        if (isset($this->connectionParams['client']['port_in_header']) && $this->connectionParams['client']['port_in_header']) {
            $host .= ':' . $this->port;
        }
        
        $request = [
            'http_method' => $method,
            'scheme'      => $this->transportSchema,
            'uri'         => $this->getURI($uri, $params),
            'body'        => $body,
            'headers'     => array_merge(
                [
                'Host'  => [$host]
                ],
                $this->headers
            )
        ];

        $request = array_replace_recursive($request, $this->connectionParams, $options);

        // RingPHP does not like if client is empty
        if (empty($request['client'])) {
            unset($request['client']);
        }

        $handler = $this->handler;
        $future = $handler($request, $this, $transport, $options);

        return $future;
    }

    public function getTransportSchema(): string
    {
        return $this->transportSchema;
    }

    public function getLastRequestInfo(): array
    {
        return $this->lastRequest;
    }

    private function wrapHandler(callable $handler): callable
    {
        return function (array $request, Connection $connection, Transport $transport = null, $options) use ($handler) {

            $this->lastRequest = [];
            $this->lastRequest['request'] = $request;

            // Send the request using the wrapped handler.
            $response =  Core::proxy($handler($request), function ($response) use ($connection, $transport, $request, $options) {

                $this->lastRequest['response'] = $response;

                if (isset($response['error']) === true) {
                    if ($response['error'] instanceof ConnectException || $response['error'] instanceof RingException) {
                        $this->log->warning("Curl exception encountered.");

                        $exception = $this->getCurlRetryException($request, $response);

                        $this->logRequestFail($request, $response, $exception);

                        $node = $connection->getHost();
                        $this->log->warning("Marking node $node dead.");
                        $connection->markDead();

                        // If the transport has not been set, we are inside a Ping or Sniff,
                        // so we don't want to retrigger retries anyway.
                        //
                        // TODO this could be handled better, but we are limited because connectionpools do not
                        // have access to Transport.  Architecturally, all of this needs to be refactored
                        if (isset($transport) === true) {
                            $transport->connectionPool->scheduleCheck();

                            $neverRetry = isset($request['client']['never_retry']) ? $request['client']['never_retry'] : false;
                            $shouldRetry = $transport->shouldRetry($request);
                            $shouldRetryText = ($shouldRetry) ? 'true' : 'false';

                            $this->log->warning("Retries left? $shouldRetryText");
                            if ($shouldRetry && !$neverRetry) {
                                return $transport->performRequest(
                                    $request['http_method'],
                                    $request['uri'],
                                    [],
                                    $request['body'],
                                    $options
                                );
                            }
                        }

                        $this->log->warning("Out of retries, throwing exception from $node");
                        // Only throw if we run out of retries
                        throw $exception;
                    } else {
                        // Something went seriously wrong, bail
                        $exception = new TransportException($response['error']->getMessage());
                        $this->logRequestFail($request, $response, $exception);
                        throw $exception;
                    }
                } else {
                    $connection->markAlive();

                    if (isset($response['headers']['Warning'])) {
                        $this->logWarning($request, $response);
                    }
                    if (isset($response['body']) === true) {
                        $response['body'] = stream_get_contents($response['body']);
                        $this->lastRequest['response']['body'] = $response['body'];
                    }

                    if ($response['status'] >= 400 && $response['status'] < 500) {
                        $ignore = $request['client']['ignore'] ?? [];
                        // Skip 404 if succeeded true in the body (e.g. clear_scroll)
                        $body = $response['body'] ?? '';
                        if (strpos($body, '"succeeded":true') !== false) {
                             $ignore[] = 404;
                        }
                        $this->process4xxError($request, $response, $ignore);
                    } elseif ($response['status'] >= 500) {
                        $ignore = $request['client']['ignore'] ?? [];
                        $this->process5xxError($request, $response, $ignore);
                    }

                    // No error, deserialize
                    $response['body'] = $this->serializer->deserialize($response['body'], $response['transfer_stats']);
                }
                $this->logRequestSuccess($request, $response);

                return isset($request['client']['verbose']) && $request['client']['verbose'] === true ? $response : $response['body'];
            });

            return $response;
        };
    }

    private function getURI(string $uri, ?array $params): string
    {
        if (isset($params) === true && !empty($params)) {
            array_walk(
                $params,
                function (&$value, &$key) {
                    if ($value === true) {
                        $value = 'true';
                    } elseif ($value === false) {
                        $value = 'false';
                    }
                }
            );

            $uri .= '?' . http_build_query($params);
        }

        if ($this->path !== null) {
            $uri = $this->path . $uri;
        }

        return $uri ?? '';
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function logWarning(array $request, array $response): void
    {
        $this->log->warning('Deprecation', $response['headers']['Warning']);
    }

    /**
     * Log a successful request
     *
     * @param array $request
     * @param array $response
     * @return void
     */
    public function logRequestSuccess(array $request, array $response): void
    {
        $this->log->debug('Request Body', array($request['body']));
        $this->log->info(
            'Request Success:',
            array(
                'method'    => $request['http_method'],
                'uri'       => $response['effective_url'],
                'port'      => $response['transfer_stats']['primary_port'] ?? '',
                'headers'   => $request['headers'],
                'HTTP code' => $response['status'],
                'duration'  => $response['transfer_stats']['total_time'],
            )
        );
        $this->log->debug('Response', array($response['body']));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($request['http_method'], $response['effective_url'], $request['body']);
        $this->trace->info($curlCommand);
        $this->trace->debug(
            'Response:',
            array(
                'response'  => $response['body'],
                'method'    => $request['http_method'],
                'uri'       => $response['effective_url'],
                'HTTP code' => $response['status'],
                'duration'  => $response['transfer_stats']['total_time'],
            )
        );
    }

    /**
     * Log a failed request
     *
     * @param array $request
     * @param array $response
     * @param \Exception $exception
     *
     * @return void
     */
    public function logRequestFail(array $request, array $response, \Exception $exception): void
    {
        $this->log->debug('Request Body', array($request['body']));
        
        $this->log->warning(
            'Request Failure:',
            array(
                'method'    => $request['http_method'],
                'uri'       => $response['effective_url'],
                'port'      => $response['transfer_stats']['primary_port'] ?? '',
                'headers'   => $request['headers'],
                'HTTP code' => $response['status'],
                'duration'  => $response['transfer_stats']['total_time'],
                'error'     => $exception->getMessage(),
            )
        );
        $this->log->warning('Response', array($response['body']));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($request['http_method'], $response['effective_url'], $request['body']);
        $this->trace->info($curlCommand);
        $this->trace->debug(
            'Response:',
            array(
                'response'  => $response,
                'method'    => $request['http_method'],
                'uri'       => $response['effective_url'],
                'HTTP code' => $response['status'],
                'duration'  => $response['transfer_stats']['total_time'],
            )
        );
    }

    public function ping(): bool
    {
        $options = [
            'client' => [
                'timeout' => $this->pingTimeout,
                'never_retry' => true,
                'verbose' => true
            ]
        ];
        try {
            $response = $this->performRequest('HEAD', '/', null, null, $options);
            $response = $response->wait();
        } catch (TransportException $exception) {
            $this->markDead();

            return false;
        }

        if ($response['status'] === 200) {
            $this->markAlive();

            return true;
        } else {
            $this->markDead();

            return false;
        }
    }

    /**
     * @return array|\GuzzleHttp\Ring\Future\FutureArray
     */
    public function sniff()
    {
        $options = [
            'client' => [
                'timeout' => $this->pingTimeout,
                'never_retry' => true
            ]
        ];

        return $this->performRequest('GET', '/_nodes/', null, null, $options);
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    public function markAlive(): void
    {
        $this->failedPings = 0;
        $this->isAlive = true;
        $this->lastPing = time();
    }

    public function markDead(): void
    {
        $this->isAlive = false;
        $this->failedPings += 1;
        $this->lastPing = time();
    }

    public function getLastPing(): int
    {
        return $this->lastPing;
    }

    public function getPingFailures(): int
    {
        return $this->failedPings;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getUserPass(): ?string
    {
        return $this->connectionParams['client']['curl'][CURLOPT_USERPWD] ?? null;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    protected function getCurlRetryException(array $request, array $response): ElasticsearchException
    {
        $exception = null;
        $message = $response['error']->getMessage();
        $exception = new MaxRetriesException($message);
        switch ($response['curl']['errno']) {
            case 6:
                $exception = new CouldNotResolveHostException($message, 0, $exception);
                break;
            case 7:
                $exception = new CouldNotConnectToHost($message, 0, $exception);
                break;
            case 28:
                $exception = new OperationTimeoutException($message, 0, $exception);
                break;
        }

        return $exception;
    }

    /**
     * Get the OS version using php_uname if available
     * otherwise it returns an empty string
     *
     * @see  https://github.com/elastic/elasticsearch-php/issues/922
     */
    private function getOSVersion(): string
    {
        if ($this->OSVersion === null) {
            $this->OSVersion = strpos(strtolower(ini_get('disable_functions')), 'php_uname') !== false
                ? ''
                : php_uname("r");
        }
        return $this->OSVersion;
    }

    /**
     * Construct a string cURL command
     */
    private function buildCurlCommand(string $method, string $uri, ?string $body): string
    {
        if (strpos($uri, '?') === false) {
            $uri .= '?pretty=true';
        } else {
            str_replace('?', '?pretty=true', $uri);
        }

        $curlCommand = 'curl -X' . strtoupper($method);
        $curlCommand .= " '" . $uri . "'";

        if (isset($body) === true && $body !== '') {
            $curlCommand .= " -d '" . $body . "'";
        }

        return $curlCommand;
    }

    private function process4xxError(array $request, array $response, array $ignore): ?ElasticsearchException
    {
        $statusCode = $response['status'];
        $responseBody = $response['body'];

        /**
 * @var \Exception $exception
*/
        $exception = $this->tryDeserialize400Error($response);

        if (array_search($response['status'], $ignore) !== false) {
            return null;
        }

        // if responseBody is not string, we convert it so it can be used as Exception message
        if (!is_string($responseBody)) {
            $responseBody = json_encode($responseBody);
        }

        if ($statusCode === 403) {
            $exception = new Forbidden403Exception($responseBody, $statusCode);
        } elseif ($statusCode === 404) {
            $exception = new Missing404Exception($responseBody, $statusCode);
        } elseif ($statusCode === 409) {
            $exception = new Conflict409Exception($responseBody, $statusCode);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            $exception = new ScriptLangNotSupportedException($responseBody. $statusCode);
        } elseif ($statusCode === 408) {
            $exception = new RequestTimeout408Exception($responseBody, $statusCode);
        } else {
            $exception = new BadRequest400Exception($responseBody, $statusCode);
        }

        $this->logRequestFail($request, $response, $exception);

        throw $exception;
    }

    private function process5xxError(array $request, array $response, array $ignore): ?ElasticsearchException
    {
        $statusCode = (int) $response['status'];
        $responseBody = $response['body'];

        /**
 * @var \Exception $exception
*/
        $exception = $this->tryDeserialize500Error($response);

        $exceptionText = "[$statusCode Server Exception] ".$exception->getMessage();
        $this->log->error($exceptionText);
        $this->log->error($exception->getTraceAsString());

        if (array_search($statusCode, $ignore) !== false) {
            return null;
        }

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            $exception = new RoutingMissingException($exception->getMessage(), $statusCode, $exception);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/', $responseBody) === 1) {
            $exception = new NoDocumentsToGetException($exception->getMessage(), $statusCode, $exception);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            $exception = new NoShardAvailableException($exception->getMessage(), $statusCode, $exception);
        } else {
            $exception = new ServerErrorResponseException($responseBody, $statusCode);
        }

        $this->logRequestFail($request, $response, $exception);

        throw $exception;
    }

    private function tryDeserialize400Error(array $response): ElasticsearchException
    {
        return $this->tryDeserializeError($response, BadRequest400Exception::class);
    }

    private function tryDeserialize500Error(array $response): ElasticsearchException
    {
        return $this->tryDeserializeError($response, ServerErrorResponseException::class);
    }

    private function tryDeserializeError(array $response, string $errorClass): ElasticsearchException
    {
        $error = $this->serializer->deserialize($response['body'], $response['transfer_stats']);
        if (is_array($error) === true) {
            if (isset($error['error']) === false) {
                // <2.0 "i just blew up" nonstructured exception
                // $error is an array but we don't know the format, reuse the response body instead
                // added json_encode to convert into a string
                return new $errorClass(json_encode($response['body']), (int) $response['status']);
            }
            
            // 2.0 structured exceptions
            if (is_array($error['error']) && array_key_exists('reason', $error['error']) === true) {
                // Try to use root cause first (only grabs the first root cause)
                $root = $error['error']['root_cause'];
                if (isset($root) && isset($root[0])) {
                    $cause = $root[0]['reason'];
                    $type = $root[0]['type'];
                } else {
                    $cause = $error['error']['reason'];
                    $type = $error['error']['type'];
                }
                // added json_encode to convert into a string
                $original = new $errorClass(json_encode($response['body']), $response['status']);

                return new $errorClass("$type: $cause", (int) $response['status'], $original);
            }
            // <2.0 semi-structured exceptions
            // added json_encode to convert into a string
            $original = new $errorClass(json_encode($response['body']), $response['status']);
            
            $errorEncoded = $error['error'];
            if (is_array($errorEncoded)) {
                $errorEncoded = json_encode($errorEncoded);
            }
            return new $errorClass($errorEncoded, (int) $response['status'], $original);
        }

        // if responseBody is not string, we convert it so it can be used as Exception message
        $responseBody = $response['body'];
        if (!is_string($responseBody)) {
            $responseBody = json_encode($responseBody);
        }

        // <2.0 "i just blew up" nonstructured exception
        return new $errorClass($responseBody);
    }
}
