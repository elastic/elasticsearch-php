<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:00 PM
 */

namespace Elasticsearch\Connections;

use Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost;
use Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException;
use Elasticsearch\Common\Exceptions\Curl\OperationTimeoutException;
use Elasticsearch\Common\Exceptions\TransportException;
use Psr\Log\LoggerInterface;

/**
 * Abstract Class AbstractConnection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class AbstractConnection implements ConnectionInterface
{
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
    protected $connectionParams = array();

    /** @var bool  */
    protected $isAlive = false;

    /** @var float  */
    private $pingTimeout = 1;    //TODO expose this

    /** @var int  */
    private $lastPing = 0;

    /** @var int  */
    private $failedPings = 0;

    /**
     * @param       $method
     * @param       $uri
     * @param null  $params
     * @param null  $body
     * @param array $options
     *
     * @return mixed
     */
    abstract public function performRequest($method, $uri, $params = null, $body = null, $options = array());

    /** @return string */
    abstract public function getTransportSchema();

    /** @return array */
    abstract public function getLastRequestInfo();


    /**
     * Constructor
     *
     * @param array                    $hostDetails
     * @param array                    $connectionParams Array of connection-specific parameters
     * @param \Psr\Log\LoggerInterface $log              Logger object
     * @param \Psr\Log\LoggerInterface $trace
     */
    public function __construct($hostDetails, $connectionParams, LoggerInterface $log, LoggerInterface $trace)
    {
        if (isset($hostDetails['scheme'])) {
            $this->transportSchema = $hostDetails['scheme'];
        }

        if (isset($hostDetails['user']) && isset($hostDetails['pass'])) {
            if (isset($connectionParams['auth'][0]) !== true) {
                $connectionParams['auth'][0] = $hostDetails['user'];
            }
            if (isset($connectionParams['auth'][1]) !== true) {
                $connectionParams['auth'][1] = $hostDetails['pass'];
            }
            if (isset($connectionParams['auth'][2]) !== true) {
                $connectionParams['auth'][2] = 'Basic';
            }
        }

        $host = $this->transportSchema.'://'.$hostDetails['host'].':'.$hostDetails['port'];
        if (isset($hostDetails['path']) === true) {
            $host .= $hostDetails['path'];
        }
        $this->host             = $host;
        $this->log              = $log;
        $this->trace            = $trace;
        if (isset($connectionParams) === true) {
            $this->connectionParams = $connectionParams;
        }


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
        $options = array('timeout' => $this->pingTimeout);
        try {
            $response = $this->performRequest('HEAD', '', null, null, $options);

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

}