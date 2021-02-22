<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions;

/**
 * Class Search
 *
 */
class Search extends AbstractEndpoint
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
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_search";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_search";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'analyzer',
            'analyze_wildcard',
            'default_operator',
            'df',
            'explain',
            'from',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'indices_boost',
            'lenient',
            'lowercase_expanded_terms',
            'preference',
            'q',
            'query_cache',
            'request_cache',
            'routing',
            'scroll',
            'search_type',
            'size',
            'slice',
            'sort',
            'source',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'version',
            'fielddata_fields',
            'docvalue_fields',
            'filter_path',
            'terminate_after',
            'stored_fields',
            'batched_reduce_size',
            'typed_keys',
            'pre_filter_shard_size',
            'rest_total_hits_as_int',
            'seq_no_primary_term',
            'track_total_hits'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
