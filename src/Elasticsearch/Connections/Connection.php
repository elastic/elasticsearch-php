<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:00 PM
 */

namespace Elasticsearch\Connections;

use Elasticsearch\Common\Exceptions\AlreadyExpiredException;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost;
use Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException;
use Elasticsearch\Common\Exceptions\Curl\OperationTimeoutException;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\NoShardAvailableException;
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
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Connection implements ConnectionInterface
{
    /** @var  callable */
    protected $handler;

    /** @var SerializerInterface */
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

    /** @var bool  */
    protected $isAlive = false;

    /** @var float  */
    private $pingTimeout = 1;    //TODO expose this

    /** @var int  */
    private $lastPing = 0;

    /** @var int  */
    private $failedPings = 0;

    private $lastRequest = array();


    /**
     * Constructor
     *
     * @param $handler
     * @param array $hostDetails
     * @param array $connectionParams Array of connection-specific parameters
     * @param \Elasticsearch\Serializers\SerializerInterface $serializer
     * @param \Psr\Log\LoggerInterface $log              Logger object
     * @param \Psr\Log\LoggerInterface $trace
     */
    public function __construct($handler, $hostDetails, $connectionParams,
                                SerializerInterface $serializer, LoggerInterface $log, LoggerInterface $trace)
    {
        if (isset($hostDetails['port']) !== true) {
            $hostDetails['port'] = 9200;
        }

        if (isset($hostDetails['scheme'])) {
            $this->transportSchema = $hostDetails['scheme'];
        }

        $auth = '';
        if (isset($hostDetails['user']) && isset($hostDetails['pass'])) {
            $auth = $hostDetails['user'].':'.$hostDetails['pass'];
        }

        $host = $auth.'@'.$hostDetails['host'].':'.$hostDetails['port'];
        if (isset($hostDetails['path']) === true) {
            $host .= $hostDetails['path'];
        }
        $this->host             = $host;
        $this->log              = $log;
        $this->trace            = $trace;
        $this->connectionParams = $connectionParams;
        $this->serializer       = $serializer;

        $this->handler = $this->wrapHandler($handler, $log, $trace);

    }


    /**
     * @param $method
     * @param $uri
     * @param null $params
     * @param null $body
     * @param array $options
     *
     * @param array $ignore
     * @return mixed
     */
    public function performRequest($method, $uri, $params = null, $body = null, $options = [], Transport $transport)
    {
        if (isset($body) === true) {
            $body = $this->serializer->serialize($body);
        }

        $request = [
            'http_method' => $method,
            'scheme'      => $this->transportSchema,
            'uri'         => $this->getURI($uri, $params),
            'body'        => $body,
            'headers'     => [
                'host'  => [$this->host]
            ]

        ];
        $request = array_merge_recursive($request, $this->connectionParams, $options);

        // make sure we start at the beginning of the stream, so it stays a moderate size
        // better strategy to let grow and rewind/reset periodically?  need to bench
        rewind($this->connectionParams['client']['save_to']);

        $handler = $this->handler;
        $future = $handler($request, $this, $transport, $options);

        return $future;

    }

    /** @return string */
    public function getTransportSchema()
    {
        return $this->transportSchema;
    }

    /** @return array */
    public function getLastRequestInfo()
    {
        return $this->lastRequest;
    }


    private function wrapHandler (callable $handler, LoggerInterface $logger, LoggerInterface $tracer)
    {
        return function (array $request, Connection $connection, Transport $transport, $options) use ($handler, $logger, $tracer) {
            // Send the request using the wrapped handler.
            $response =  Core::proxy($handler($request), function ($response) use ($connection, $transport, $logger, $tracer, $request, $options) {

                if (isset($response['error']) === true) {

                    if ($response['error'] instanceof ConnectException || $response['error'] instanceof RingException) {
                        $connection->markDead();
                        $transport->connectionPool->scheduleCheck();

                        $shouldRetry = $transport->shouldRetry($request);
                        if ($shouldRetry === true) {
                            return $this->performRequest(
                                $request['http_method'],
                                $request['uri'],
                                [],
                                $request['body'],
                                $options,
                                $transport
                            );
                        }

                        // Due to the magic of futures, this will only be invoked if the final retry fails, since
                        // successful resolutions will go down the alternate `else` path the second time through
                        // the proxy
                        $this->throwCurlException($response['curl']['errno'], $response['error']->getMessage());
                    } else {
                        // Something went seriously wrong, bail
                        throw new TransportException($response['error']->getMessage());
                    }
                } else {
                    $connection->markAlive();

                    rewind($response['body']);
                    $response['body'] = stream_get_contents($response['body'], $response['headers']['Content-Length'][0]);

                    if ($response['status'] >= 400 && $response['status'] < 500) {
                        $this->process4xxError($response['status'], $response['body'], $request['ignore']);
                    } else if ($response['status'] >= 500) {
                        $this->process5xxError($response['status'], $response['body'], $request['ignore']);
                    }

                    // No error, deserialize
                    $response['body'] = $this->serializer->deserialize($response['body'], $response['transfer_stats']);

                }

                return $request['verbose'] ? $response : $response['body'];

            });

            return $response;
        };
    }



    /**
     * @param string $uri
     * @param array $params
     *
     * @return string
     */
    private function getURI($uri, $params)
    {

        if (isset($params) === true && !empty($params)) {
            $uri .= '?' . http_build_query($params);
        }

        return $uri;
    }

    /**
     * Log a successful request
     *
     * @param string $method
     * @param string $fullURI
     * @param string $body
     * @param array  $headers
     * @param string $statusCode
     * @param string $response
     * @param string $duration
     *
     * @return void
     */
    public function logRequestSuccess($method, $fullURI, $body, $headers, $statusCode, $response, $duration)
    {
        $this->log->debug('Request Body', array($body));
        $this->log->info(
            'Request Success:',
            array(
                'method'    => $method,
                'uri'       => $fullURI,
                'headers'   => $headers,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
            )
        );
        $this->log->debug('Response', array($response));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($method, $fullURI, $body);
        $this->trace->info($curlCommand);
        $this->trace->debug(
            'Response:',
            array(
                'response'  => $response,
                'method'    => $method,
                'uri'       => $fullURI,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
            )
        );

    }


    /**
     * Log a a failed request
     *
     * @param string      $method
     * @param string      $fullURI
     * @param string      $body
     * @param array       $headers
     * @param string      $duration
     * @param null|string $statusCode
     * @param null|string $response
     * @param null|string $exception
     *
     * @return void
     */
    public function logRequestFail(
        $method,
        $fullURI,
        $body,
        $headers,
        $duration,
        $statusCode = null,
        $response = null,
        $exception = null
    ) {
        $this->log->debug('Request Body', array($body));
        $this->log->warning(
            'Request Failure:',
            array(
                'method'    => $method,
                'uri'       => $fullURI,
                'headers'   => $headers,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
                'error'     => $exception,
            )
        );
        $this->log->warning('Response', array($response));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($method, $fullURI, $body);
        $this->trace->info($curlCommand);
        $this->trace->debug(
            'Response:',
            array(
                'response'  => $response,
                'method'    => $method,
                'uri'       => $fullURI,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
            )
        );

    }


    /**
     * @return bool
     */
    public function ping()
    {
        $options = [
            'client' => [
                'timeout' => $this->pingTimeout
            ]
        ];
        try {
            $response = $this->performRequest('HEAD', '/', null, null, $options);

        } catch (TransportException $exception) {
            $this->markDead();
            return false;
        }

        $response = $response->wait();
        if ($response['status'] === 200) {
            $this->markAlive();
            return true;
        } else {
            $this->markDead();
            return false;
        }
    }

    /**
     * @return array
     */
    public function sniff()
    {
        $options = array('timeout' => $this->pingTimeout);
        return $this->performRequest('GET', '/_nodes/_all/clear', null, null, $options);

    }


    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->isAlive;
    }


    public function markAlive()
    {
        $this->failedPings = 0;
        $this->isAlive = true;
        $this->lastPing = time();
    }

    public function markDead()
    {
        $this->isAlive = false;
        $this->failedPings += 1;
        $this->lastPing = time();
    }


    /**
     * @return int
     */
    public function getLastPing()
    {
        return $this->lastPing;
    }


    /**
     * @return int
     */
    public function getPingFailures()
    {
        return $this->failedPings;
    }


    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }


    /**
     * @param $curlErrorNumber
     * @param $message
     *
     * @throws \Elasticsearch\Common\Exceptions\TransportException
     * @throws \Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException
     * @throws \Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    protected function throwCurlException($curlErrorNumber, $message)
    {
        switch ($curlErrorNumber) {
            case 6:
                throw new CouldNotResolveHostException($message);
            case 7:
                throw new CouldNotConnectToHost($message);
            case 28:
                throw new OperationTimeoutException($message);
            default:
                throw new TransportException($message);
        }
    }


    /**
     * Construct a string cURL command
     *
     * @param string $method HTTP method
     * @param string $uri    Full URI of request
     * @param string $body   Request body
     *
     * @return string
     */
    private function buildCurlCommand($method, $uri, $body)
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


    /**
     * @param $statusCode
     * @param $responseBody
     * @param $ignore
     * @throws \Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException
     * @throws \Elasticsearch\Common\Exceptions\Missing404Exception
     * @throws \Elasticsearch\Common\Exceptions\AlreadyExpiredException
     * @throws \Elasticsearch\Common\Exceptions\Forbidden403Exception
     * @throws \Elasticsearch\Common\Exceptions\BadRequest400Exception
     * @throws \Elasticsearch\Common\Exceptions\Conflict409Exception
     *
     */
    private function process4xxError($statusCode, $responseBody, $ignore)
    {

        //$exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";

        if (array_search($statusCode, $ignore) !== false) {
            return;
        }

        if ($statusCode === 400 && strpos($responseBody, "AlreadyExpiredException") !== false) {
            throw new AlreadyExpiredException($responseBody, $statusCode);
        } elseif ($statusCode === 403) {
            throw new Forbidden403Exception($responseBody, $statusCode);
        } elseif ($statusCode === 404) {
            throw new Missing404Exception($responseBody, $statusCode);
        } elseif ($statusCode === 409) {
            throw new Conflict409Exception($responseBody, $statusCode);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            throw new ScriptLangNotSupportedException($responseBody. $statusCode);
        } elseif ($statusCode === 400) {
            throw new BadRequest400Exception($responseBody, $statusCode);
        }
    }


    /**
     * @param $response
     *
     * @param $ignore
     * @throws \Elasticsearch\Common\Exceptions\RoutingMissingException
     * @throws \Elasticsearch\Common\Exceptions\NoShardAvailableException
     * @throws \Elasticsearch\Common\Exceptions\NoDocumentsToGetException
     * @throws \Elasticsearch\Common\Exceptions\ServerErrorResponseException
     */
    private function process5xxError($response, $ignore)
    {
        $statusCode    = $response['requestInfo']['http_code'];
        $exceptionText = $response['error'];
        $responseBody  = $response['responseText'];

        $exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";
        $this->log->error($exceptionText);

        if (array_search($statusCode, $ignore) !== false) {
            return;
        }

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            throw new RoutingMissingException($responseBody, $statusCode);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/',$responseBody) === 1) {
            throw new NoDocumentsToGetException($responseBody, $statusCode);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            throw new NoShardAvailableException($responseBody, $statusCode);
        } else {
            throw new ServerErrorResponseException($responseBody, $statusCode);
        }


    }

}