<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Stats
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stats extends AbstractNodesEndpoint
{
    /**
     * Limit the information returned to the specified metrics
     *
     * @var string
     */
    private $metric;

    /**
     * Limit the information returned for `indices` metric to the specific index metrics.
     * Isn't used if `indices` (or `all`) metric isn't specified.
     *
     * @var string
     */
    private $indexMetric;

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

    /**
     * @param string|string[] $indexMetric
     */
    public function setIndexMetric($indexMetric): Stats
    {
        if (isset($indexMetric) !== true) {
            return $this;
        }

        if (is_array($indexMetric) === true) {
            $indexMetric = implode(",", $indexMetric);
        }

        $this->indexMetric = $indexMetric;

        return $this;
    }

    public function getURI(): string
    {
        $metric = $this->metric ?? null;
        $indexMetric = $this->indexMetric ?? null;
        $nodeId = $this->nodeID ?? null;

        if (isset($nodeId) && isset($metric) && isset($indexMetric)) {
            return "/_nodes/$nodeId/stats/$metric/$indexMetric";
        }
        if (isset($metric) && isset($indexMetric)) {
            return "/_nodes/stats/$metric/$indexMetric";
        }
        if (isset($nodeId) && isset($metric)) {
            return "/_nodes/$nodeId/stats/$metric";
        }
        if (isset($metric)) {
            return "/_nodes/stats/$metric";
        }
        if (isset($nodeId)) {
            return "/_nodes/$nodeId/stats";
        }
        return "/_nodes/stats";
    }

    public function getParamWhitelist(): array
    {
        return [
            'completion_fields',
            'fielddata_fields',
            'fields',
            'groups',
            'level',
            'types',
            'timeout',
            'include_segment_file_sizes'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
