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
 * Class Deletebyquery
 *
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
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
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
