<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Node;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Stats
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Stats extends AbstractNodeEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $nodeID = $this->nodeID;
        //$uri   = "/_cluster/nodes/stats";

        if (isset($this->params['metric']) === true && $this->params['metric'] === 'fielddata') {
            $uri = "/_nodes/stats/indices/fielddata";
            $this->params = array(
                "fields" => $this->params['fields']
            );

        } elseif (isset($this->params['metric']) === true) {
            $metric = $this->params['metric'];
            $uri = "/_nodes/stats/indices/$metric";
            $this->params = array();

        } else {
            $uri = "/_nodes/$nodeID/stats";
            unset($this->params['metric']);
            unset($this->params['metric_family']);
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'all',
            'clear',
            'fields',
            'fs',
            'http',
            'indices',
            'jvm',
            'network',
            'os',
            'process',
            'thread_pool',
            'transport',
            'metric',

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