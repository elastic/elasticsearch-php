<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Clear
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Cache
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Clear extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cache/clear";

        if (isset($index) === true) {
            $uri = "/$index/_cache/clear";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'field_data',
            'fielddata',
            'fields',
            'filter',
            'filter_cache',
            'filter_keys',
            'id',
            'id_cache',
            'index',
            'recycler',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'request_cache',
            'request'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
