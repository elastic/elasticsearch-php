<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\AsyncSearch;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Submit
 * Elasticsearch API name async_search.submit
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\AsyncSearch
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Submit extends AbstractEndpoint
{

    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/$index/_async_search";
        }
        return "/_async_search";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_completion_timeout',
            'keep_on_completion',
            'keep_alive',
            'batched_reduce_size',
            'request_cache',
            'analyzer',
            'analyze_wildcard',
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
            'lenient',
            'preference',
            'q',
            'routing',
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
            'max_concurrent_shard_requests'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setBody($body): Submit
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
