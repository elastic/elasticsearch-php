<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Node;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Info
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Info extends AbstractNodeEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $nodeID = $this->nodeID;
        $uri   = "/_cluster/nodes";

        if (isset($nodeID) === true) {
            $uri = "/_cluster/nodes/$nodeID";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'all',
            'clear',
            'http',
            'jvm',
            'network',
            'os',
            'plugin',
            'process',
            'settings',
            'thread_pool',
            'timeout',
            'transport',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}