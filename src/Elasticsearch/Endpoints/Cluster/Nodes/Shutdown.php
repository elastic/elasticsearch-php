<?php

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Shutdown
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Shutdown extends AbstractNodesEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $node_id = $this->nodeID;
        $uri   = "/_shutdown";

        if (isset($node_id) === true) {
            $uri = "/_cluster/nodes/$node_id/_shutdown";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'delay',
            'exit',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
