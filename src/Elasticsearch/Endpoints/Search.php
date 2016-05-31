<?php

namespace Elasticsearch\Endpoints;



/**
 * Class Search.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Search extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
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
    protected function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri = '/_search';
        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
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
            'expand_wildcards',
            'lenient',
            'lowercase_expanded_terms',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'size',
            'sort',
            '_source',
            '_source_exclude',
            '_source_include',
            'terminate_after',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'track_scores',
            'version',
            'request_cache',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET';
    }
}
