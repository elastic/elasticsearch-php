<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Mapping
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;
        if (isset($index) && isset($type)) {
            return "/$index/_mapping/$type";
        }
        if (isset($index)) {
            return "/$index/_mapping";
        }
        if (isset($type)) {
            return "/_mapping/$type";
        }
        return "/_mapping";
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_type_name',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'master_timeout',
            'local'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
