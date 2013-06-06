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
 * Class Health
 * @package Elasticsearch\Endpoints\Cluster
 */
class Health extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_cluster/health";

        if (isset($index) === true) {
            $uri = "/_cluster/health/$index";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'level',
            'local',
            'master_timeout',
            'timeout',
            'wait_for_active_shards',
            'wait_for_nodes',
            'wait_for_relocating_shards',
            'wait_for_status',
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