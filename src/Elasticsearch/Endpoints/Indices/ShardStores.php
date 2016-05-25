<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ShardStores
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ShardStores extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_shard_stores";

        if (isset($index) === true) {
            $uri = "/$index/_shard_stores";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'status',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'operation_threading',
        ];
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
