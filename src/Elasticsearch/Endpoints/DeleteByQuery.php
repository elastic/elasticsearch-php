<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Deletebyquery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteByQuery extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (!$this->index) {
            throw new Exceptions\RuntimeException(
                'index is required for Deletebyquery'
            );
        }

        $uri = "/{$this->index}/_delete_by_query";
        if ($this->type) {
            $uri = "/{$this->index}/{$this->type}/_delete_by_query";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            '_source',
            '_source_exclude',
            '_source_include',
            'allow_no_indices',
            'analyze_wildcard',
            'analyzer',
            'conflicts',
            'default_operator',
            'df',
            'expand_wildcards',
            'from',
            'ignore_unavailable',
            'lenient',
            'preference',
            'query',
            'q',
            'refresh',
            'request_cache',
            'requests_per_second',
            'routing',
            'scroll',
            'scroll_size',
            'search_timeout',
            'search_type',
            'size',
            'slices',
            'sort',
            'stats',
            'terminate_after',
            'timeout',
            'version',
            'wait_for_active_shards',
            'wait_for_completion',
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
