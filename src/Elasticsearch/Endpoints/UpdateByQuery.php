<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class UpdateByQuery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints *
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class UpdateByQuery extends AbstractEndpoint
{
    /**
     * @throws Exceptions\InvalidArgumentException
     */
    public function setBody($body): UpdateByQuery
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
            );
        }
        $this->body = $body;

        return $this;
    }


    /**
     * @throws Exceptions\RuntimeException
     * @return string
     */
    public function getURI(): string
    {
        if (!isset($this->index)) {
            throw new Exceptions\RuntimeException(
                'index is required for UpdateByQuery'
            );
        }
        $index = $this->index;
        $type = $this->type ?? null;
        if (isset($type)) {
            return "/$index/$type/_update_by_query";
        }
        return "/$index/_update_by_query";
    }


    public function getParamWhitelist(): array
    {
        return [
            'analyzer',
            'analyze_wildcard',
            'default_operator',
            'df',
            'from',
            'ignore_unavailable',
            'allow_no_indices',
            'conflicts',
            'expand_wildcards',
            'lenient',
            'pipeline',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'search_timeout',
            'size',
            'sort',
            '_source',
            '_source_excludes',
            '_source_includes',
            'terminate_after',
            'stats',
            'version',
            'version_type',
            'request_cache',
            'refresh',
            'timeout',
            'wait_for_active_shards',
            'scroll_size',
            'wait_for_completion',
            'requests_per_second',
            'slices'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
