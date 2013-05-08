<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:00 PM
 */

namespace Elasticsearch\Connections;

use Monolog\Logger;

/**
 * Abstrat Class BaseConnection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class BaseConnection
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
     * @var array
     */
    protected $connectionParams;


    /**
     * Constructor
     *
     * @param string $host             Host string
     * @param string $port             Host port
     * @param array  $connectionParams Array of connection-specific parameters
     * @param Logger $log              Monolog Logger object
     *
     * @return \Elasticsearch\Connections\BaseConnection
     */
    public function __construct($host, $port, $connectionParams, $log)
    {
        $this->host = $this->transportSchema.'://'.$host.':'.$port;
        $this->log = $log;
        $this->connectionParams = $connectionParams;

    }//end __construct()


    /**
     * Log a successful request
     *
     * @param string $method
     * @param string $fullURI
     * @param string $path
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

    }//end logRequestSuccess()


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
    public function logRequestFail($method, $fullURI, $body, $duration, $statusCode=null, $response=null, $exception=null)
    {
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

    }//end logRequestFail()

}//end class