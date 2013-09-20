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
use Monolog\Logger;

/**
 * Abstrat Class AbstractConnection
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
    protected $transportSchema = 'http';

    /**
     * @var string
     */
    protected $host;

    /**
     * @var Logger
     */
    protected $log;

    /**
     * @var Logger
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

    /**
     * Constructor
     *
     * @param string $host             Host string
     * @param string $port             Host port
     * @param array  $connectionParams Array of connection-specific parameters
     * @param Logger $log              Monolog Logger object
     * @param Logger $trace
     */
    public function __construct($host, $port, $connectionParams, $log, $trace)
    {
        $this->host             = $this->transportSchema . '://' . $host . ':' . $port;
        $this->log              = $log;
        $this->trace            = $trace;
        $this->connectionParams = $connectionParams;

    }


    /**
     * Log a successful request
     *
     * @param string $method
     * @param string $fullURI
     * @param string $body
     * @param string $statusCode
     * @param string $response
     * @param string $duration
     *
     * @return void
     */
    public function logRequestSuccess($method, $fullURI, $body, $statusCode, $response, $duration)
    {
        $this->log->addDebug('Request Body', array($body));
        $this->log->addInfo(
            'Request Success:',
            array(
                'method'    => $method,
                'uri'       => $fullURI,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
            )
        );
        $this->log->addDebug('Response', array($response));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($method, $fullURI, $body);
        $this->trace->addInfo($curlCommand);
        $this->trace->addDebug(
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
        $duration,
        $statusCode = null,
        $response = null,
        $exception = null
    ) {
        $this->log->addDebug('Request Body', array($body));
        $this->log->addInfo(
            'Request Success:',
            array(
                'method'    => $method,
                'uri'       => $fullURI,
                'HTTP code' => $statusCode,
                'duration'  => $duration,
                'error'     => $exception,
            )
        );
        $this->log->addDebug('Response', array($response));

        // Build the curl command for Trace.
        $curlCommand = $this->buildCurlCommand($method, $fullURI, $body);
        $this->trace->addInfo($curlCommand);
        $this->trace->addDebug(
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

        } catch (OperationTimeoutException $exception) {
            $this->isAlive = false;
            return false;

        }


        if ($response['status'] === 200) {
            $this->isAlive = true;
            return true;
        } else {
            $this->isAlive = false;
            return false;
        }
    }

    /**
     * @return array
     */
    public function sniff()
    {
        $options = array('timeout' => $this->pingTimeout);
        return $this->performRequest('GET', '/_cluster/nodes', null, null, $options);

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
        $this->isAlive = true;
    }

    public function markDead()
    {
        $this->isAlive = false;
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