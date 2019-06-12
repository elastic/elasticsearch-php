<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Hotthreads
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class HotThreads extends AbstractNodesEndpoint
{
    public function getURI(): string
    {
        $nodeId = $this->nodeID;
        if (isset($nodeId)) {
            return "/_cluster/nodes/$nodeId/hotthreads";
        }
        return "/_cluster/nodes/hotthreads";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return [
            'interval',
            'snapshots',
            'threads',
            'ignore_idle_threads',
            'type',
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
