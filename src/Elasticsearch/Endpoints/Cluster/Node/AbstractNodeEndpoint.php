<?php
/**
 * User: zach
 * Date: 6/6/13
 * Time: 10:59 AM
 */

namespace Elasticsearch\Endpoints\Cluster\Node;


use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractNodeEndpoint
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
abstract class AbstractNodeEndpoint extends AbstractEndpoint
{

    /** @var null|string */
    protected $nodeID = null;


    /**
     * @param $nodeID
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setNodeID($nodeID)
    {
        if (isset($nodeID) !== true) {
            return $this;
        }

        if (is_string($nodeID) !== true) {
            throw new InvalidArgumentException('NodeID must be a string');
        }
        $this->nodeID = urlencode($nodeID);
        return $this;
    }
}