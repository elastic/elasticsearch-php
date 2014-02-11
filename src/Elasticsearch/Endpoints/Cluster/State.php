<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class State
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class State extends AbstractEndpoint
{
    // Limit the information returned to the specified metrics
    private $metric;


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
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $metric = $this->metric;
        $uri   = "/_cluster/state";

        if (isset($metric) === true && isset($index) === true) {
            $uri = "/_cluster/state/$metric/$index";
        } elseif (isset($metric) === true) {
            $uri = "/_cluster/state/$metric";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'flat_settings',
            'index_templates'
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