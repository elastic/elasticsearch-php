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
    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/_cluster/health/$index";
        }

        return "/_cluster/health";
    }

    public function getParamWhitelist(): array
    {
        return [
            'expand_wildcards',
            'level',
            'local',
            'master_timeout',
            'timeout',
            'wait_for_active_shards',
            'wait_for_nodes',
            'wait_for_events',
            'wait_for_no_relocating_shards',
            'wait_for_no_initializing_shards',
            'wait_for_status'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
