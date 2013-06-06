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
 * Class HotThreads
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class HotThreads extends AbstractEndpoint
{

    /** @var null|string */
    private $nodeID = null;


    /**
     * @param $nodeID
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setNodeID($nodeID)
    {
        if (is_string($nodeID) !== true) {
            throw new Exceptions\InvalidArgumentException('NodeID must be a string');
        }
        $this->nodeID = urlencode($nodeID);
        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {

        $nodeID = $this->nodeID;
        $uri    = "/_cluster/nodes/hot_threads";

        if (isset($nodeID) === true) {
            $uri = "/_cluster/nodes/$nodeID/hot_threads";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'interval',
            'snapshots',
            'threads',
            'type',
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