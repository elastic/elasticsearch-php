<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Nodes;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Stats
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Stats extends AbstractEndpoint
{
    // Limit the information returned to the specified metrics
    private $metric;


    // Limit the information returned for `indices` metric to the specific index metrics. Isn&#039;t used if `indices` (or `all`) metric isn&#039;t specified.
    private $indexMetric;


    // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you&#039;re connecting to, leave empty to get information from all nodes
    private $node_id;


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

        $this->metric = $metric;
        return $this;
    }


    /**
     * @param $indexMetric
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
     * @param $node_id
     *
     * @return $this
     */
    public function setNodeID($node_id)
    {
        if (isset($node_id) !== true) {
            return $this;
        }

        $this->node_id = $node_id;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {
        $metric = $this->metric;
        $index_metric = $this->indexMetric;
        $node_id = $this->node_id;
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
    protected function getParamWhitelist()
    {
        return array(
            'completion_fields',
            'fielddata_fields',
            'fields',
            'groups',
            'human',
            'level',
            'types',
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