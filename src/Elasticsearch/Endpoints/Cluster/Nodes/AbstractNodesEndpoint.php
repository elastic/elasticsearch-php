<?php

namespace Elasticsearch\Endpoints\Cluster\Nodes;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractNodesEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractNodesEndpoint extends AbstractEndpoint
{
    /** @var  string  A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you&#039;re connecting to, leave empty to get information from all nodes */
    protected $nodeID;
    
    /** @var  string A comma-separated list of metrics you wish returned. Leave empty to return all. */
    protected $metric;

    /**
     * @param $nodeID
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return $this
     */
    public function setNodeID($nodeID)
    {
        if (isset($nodeID) !== true) {
            return $this;
        }

        if (!(is_array($nodeID) === true || is_string($nodeID) === true)) {
            throw new InvalidArgumentException("invalid node_id");
        }

        if (is_array($nodeID) === true) {
            $nodeID = implode(',', $nodeID);
        }

        $this->nodeID = urlencode($nodeID);

        return $this;
    }

    /**
     * @param $metric
     *
     * @return $this
     */
    public function setMetric($metric)
    {
        if (isset($metric) !== true) {
            return $this;
        }

        if (is_array($metric) === true) {
            $metric = implode(",", $metric);
        }

        $this->metric = urlencode($metric);

        return $this;
    }
}
