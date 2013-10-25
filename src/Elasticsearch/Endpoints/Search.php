<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Search
 * @package Elasticsearch\Endpoints
 */
class Search extends AbstractEndpoint
{

    /**
     * @param $query
     *
     * @return $this
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($query)
    {
        if (isset($query) !== true) {
            return $this;
        }

        if (is_string($query) === true || is_array($query) === true) {
            $this->body = $query;
        } else {
            throw new InvalidArgumentException(
                'Query must be a string or array'
            );
        }

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        return $this->getOptionalURI('_search');
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
            'from',
            'ignore_indices',
            'indices_boost',
            'lenient',
            'lowercase_expanded_terms',
            'operation_threading',
            'preference',
            'q',
            'routing',
            'scroll',
            'search_type',
            'size',
            'sort',
            'source',
            '_source',
            '_source_include',
            '_source_exclude',
            'stats',
            'suggest_field',
            'suggest_mode',
            'suggest_size',
            'suggest_text',
            'timeout',
            'version',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }

}