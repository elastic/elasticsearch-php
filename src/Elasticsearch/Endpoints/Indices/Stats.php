<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stats
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Stats extends AbstractEndpoint
{
    /**
     * Limit the information returned the specific metrics.
     *
     * @var string
     */
    private $metric;

    /**
     * @param string|string[] $metric
     */
    public function setMetric($metric): Stats
    {
        if (isset($metric) !== true) {
            return $this;
        }

        if (is_array($metric)) {
            $metric = implode(",", $metric);
        }

        $this->metric = $metric;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $metric = $this->metric ?? null;

        if (isset($index) && isset($metric)) {
            return "/$index/_stats/$metric";
        }
        if (isset($index)) {
            return "/$index/_stats";
        }
        if (isset($metric)) {
            return "/_stats/$metric";
        }
        return "/_stats";
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
            'include_segment_file_sizes',
            'include_unloaded_segments',
            'expand_wildcards',
            'forbid_closed_indices'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
