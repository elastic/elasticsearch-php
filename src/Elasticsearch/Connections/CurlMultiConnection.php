<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\Connections;

/**
 * Class Connection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\CurlMultiConnection
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class CurlMultiConnection extends BaseConnection implements ConnectionInterface
{


    /**
     * Constructor
     *
     * @param string $host Host string
     * @param int    $port Host port
     */
    public function __construct($host, $port=9200)
    {
        parent::__construct($host, $port);

    }//end __construct()


    /**
     * Returns the transport schema
     *
     * @return string
     */
    public function getTransportSchema()
    {
        return $this->transportSchema;

    }//end getTransportSchema()


    /**
     * Perform an HTTP request on the cluster
     *
     * @param string       $method HTTP method to use for request
     * @param string       $uri    HTTP URI to use for request
     * @param null|string  $params Optional URI parameters
     * @param null|string  $body   Optional request body
     *
     * @return array
     */
    public function performRequest($method, $uri, $params=null, $body=null)
    {

    }//end performRequest()

}