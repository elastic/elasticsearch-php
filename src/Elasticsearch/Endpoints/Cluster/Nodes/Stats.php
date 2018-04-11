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

        $this->metric = $metric;

        return $this;
    }

    /**
     * @param string $indexMetric
     *
     * @return $this
     */
    public function setIndexMetric($indexMetric)
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

    /**
     * @return string
     */
    public function getURI()
    {
        $metric = $this->metric;
        $index_metric = $this->indexMetric;
        $node_id = $this->nodeID;
        $uri   = "/_nodes/stats";

        if (isset($node_id) === true && isset($metric) === true && isset($index_metric) === true) {
            $uri = "/_nodes/$node_id/stats/$metric/$index_metric";
        } elseif (isset($metric) === true && isset($index_metric) === true) {
            $uri = "/_nodes/stats/$metric/$index_metric";
        } elseif (isset($node_id) === true && isset($metric) === true) {
            $uri = "/_nodes/$node_id/stats/$metric";
        } elseif (isset($metric) === true) {
            $uri = "/_nodes/stats/$metric";
        } elseif (isset($node_id) === true) {
            $uri = "/_nodes/$node_id/stats";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'completion_fields',
            'fielddata_fields',
            'fields',
            'groups',
            'human',
            'level',
            'types',
            'include_segment_file_sizes',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
