<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Usage
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Usage extends AbstractNodesEndpoint
{
    /**
     * Limit the information returned to the specified metrics
     *
     * @var string
     */
    private $metric;

    /**
     * @param string|string[] $metric
     */
    public function setMetric($metric): Stats
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
        $metric = $this->metric ?? null;
        $nodeId = $this->nodeID ?? null;

        if (isset($nodeId) && isset($metric)) {
            return "/_nodes/$nodeId/usage/$metric";
        }
        if (isset($metric)) {
            return "/_nodes/usage/$metric";
        }
        if (isset($nodeId)) {
            return "/_nodes/$nodeId/usage";
        }
        return "/_nodes/usage";
    }

    public function getParamWhitelist(): array
    {
        return [
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
