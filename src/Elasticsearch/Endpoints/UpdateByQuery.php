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

use Elasticsearch\Common\Exceptions;

/**
 * Class UpdateByQuery
 *
 */
class UpdateByQuery extends AbstractEndpoint
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

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
            );
        }
        $this->body = $body;

        return $this;
    }


    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @return string
     */
    public function getURI()
    {
        if (!$this->index) {
            throw new Exceptions\RuntimeException(
                'index is required for UpdateByQuery'
            );
        }

        $uri = "/{$this->index}/_update_by_query";
        if ($this->type) {
            $uri = "/{$this->index}/{$this->type}/_update_by_query";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'analyzer',
            'analyze_wildcard',
            'default_operator',
            'df',
            'explain',
            'fields',
            'fielddata_fields',
            'from',
            'ignore_unavailable',
            'allow_no_indices',
            'conflicts',
            'expand_wildcards',
            'lenient',
            'lowercase_expanded_terms',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'search_timeout',
            'size',
            'sort',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'terminate_after',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'track_scores',
            'version',
            'version_type',
            'request_cache',
            'request_per_second',
            'slices',
            'refresh',
            'consistency',
            'scroll_size',
            'wait_for_completion',
            'wait_for_active_shards',
            'pipeline'
        ];
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
