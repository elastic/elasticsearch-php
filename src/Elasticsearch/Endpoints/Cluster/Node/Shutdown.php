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
 * Class Shutdown
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Shutdown extends AbstractNodeEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $nodeID = $this->nodeID;
        $uri    = "/_cluster/nodes/_shutdown";

        if (isset($nodeID) === true) {
            $uri = "/_cluster/nodes/$nodeID/_shutdown";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'delay',
            'exit',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}