<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions;

/**
 * Class Search
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Search extends AbstractEndpoint
{
    public function setBody($body): Search
    {
        if ($body === null) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_search";
        }
        if (isset($index)) {
            return "/$index/_search";
        }
        return "/_search";
    }

    public function getParamWhitelist(): array
    {
        return [
            'analyzer',
            'analyze_wildcard',
            'ccs_minimize_roundtrips',
            'default_operator',
            'df',
            'explain',
            'stored_fields',
            'docvalue_fields',
            'from',
            'ignore_unavailable',
            'ignore_throttled',
            'allow_no_indices',
            'expand_wildcards',
            'indices_boost',
            'lenient',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'size',
            'sort',
            '_source',
            '_source_excludes',
            '_source_includes',
            'terminate_after',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'track_scores',
            'track_total_hits',
            'allow_partial_search_results',
            'typed_keys',
            'version',
            'seq_no_primary_term',
            'request_cache',
            'batched_reduce_size',
            'max_concurrent_shard_requests',
            'pre_filter_shard_size',
            'rest_total_hits_as_int'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
