<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Health
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Health extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
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
    public function getParamWhitelist()
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
            'wait_for_events',
            'wait_for_no_relocating_shards',
            'wait_for_no_initializing_shards',
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
