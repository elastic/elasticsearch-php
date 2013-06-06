<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class State
 * @package Elasticsearch\Endpoints\Cluster
 */
class State extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = "/_cluster/state";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'filter_blocks',
            'filter_index_templates',
            'filter_indices',
            'filter_metadata',
            'filter_nodes',
            'filter_routing_table',
            'local',
            'master_timeout',
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