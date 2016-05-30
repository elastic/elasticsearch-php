<?php

namespace Elasticsearch\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Clear
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Cache
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Clear extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_cache/clear";

        if (isset($index) === true) {
            $uri = "/$index/_cache/clear";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'field_data',
            'filter',
            'filter_cache',
            'filter_keys',
            'id',
            'id_cache',
            'fielddata',
            'fields',
            'query',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'index',
            'recycler',
            'request',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}
