<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class State
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class State extends AbstractEndpoint
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
    public function setMetric($metric): State
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
        $index = $this->index ?? null;
        $metric = $this->metric ?? null;

        if (isset($metric) && isset($index)) {
            return "/_cluster/state/$metric/$index";
        }
        if (isset($metric) === true) {
            return "/_cluster/state/$metric";
        }
        return "/_cluster/state";
    }

    public function getParamWhitelist(): array
    {
        return [
            'local',
            'master_timeout',
            'flat_settings',
            'wait_for_metadata_version',
            'wait_for_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
