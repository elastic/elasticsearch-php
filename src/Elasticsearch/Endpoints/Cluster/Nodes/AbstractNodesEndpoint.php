<?php
/**
 * User: zach
 * Date: 1/23/14
 * Time: 6:03 PM
 */

namespace Elasticsearch\Endpoints\Cluster\Nodes;


use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;

abstract class AbstractNodesEndpoint extends AbstractEndpoint
{
    /** @var  string  A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you&#039;re connecting to, leave empty to get information from all nodes */
    protected $nodeID;


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

        $this->nodeID = $nodeID;
        return $this;
    }
}