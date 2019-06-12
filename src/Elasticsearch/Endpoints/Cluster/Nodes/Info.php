<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Info
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Info extends AbstractNodesEndpoint
{
    /**
     * A comma-separated list of metrics you wish returned. Leave empty to return all.
     *
     * @var string
     */
    private $metric;

    /**
     * @param string|string[] $metric
     */
    public function setMetric($metric): Info
    {
        if (isset($metric) !== true) {
            return $this;
        }

        if (is_array($metric) === true) {
            $metric = implode(",", $metric);
        }

        $this->metric = $metric;

        return $this;
    }

    public function getURI(): string
    {
        $nodeId = $this->nodeID ?? null;
        $metric = $this->metric ?? null;

        if (isset($nodeId) && isset($metric)) {
            return "/_nodes/$nodeId/$metric";
        }
        if (isset($metric)) {
            return "/_nodes/$metric";
        }
        if (isset($nodeId)) {
            return "/_nodes/$nodeId";
        }
        return "/_nodes";
    }

    public function getParamWhitelist(): array
    {
        return [
            'flat_settings',
            'timeout',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
