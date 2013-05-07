<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:00 PM
 */

namespace Elasticsearch\Connections;

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
     * Constructor
     *
     * @param string $host             Host string
     * @param string $port             Host port
     * @param array  $connectionParams Array of connection-specific parameters
     *
     * @return \Elasticsearch\Connections\BaseConnection
     */
    public function __construct($host, $port, $connectionParams)
    {
        $this->host = $this->transportSchema.'://'.$host.':'.$port;

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

    }//end logRequestFail

}