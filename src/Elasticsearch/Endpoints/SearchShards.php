<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

/**
 * Class Search
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SearchShards extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_search_shards";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search_shards";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search_shards";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_search_shards";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'preference',
            'routing',
            'local',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
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
