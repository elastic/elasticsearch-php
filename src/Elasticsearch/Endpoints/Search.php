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
    public function setQuery($query)
    {
        if (is_string($query) === true) {
            $this->params['q'] = $query;
            $this->setBody(null);
        } else if (is_array($query) === true) {
            $this->setBody($query);
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
        $uri = array();
        $uri[] = $this->getIndex();
        $uri[] = $this->getType();
        $uri[] = '_search';
        $uri[] = $this->getScroll();
        $uri =  array_filter($uri);

        $uri =  '/' . implode('/', $uri);

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
            'scroll_id',
            'search_type',
            'size',
            'sort',
            'source',
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

    private function getIndex()
    {
        if (isset($this->index) === true){
            return $this->index;
        } else {
            return '_all';
        }
    }

    private function getType()
    {
        if (isset($this->type) === true){
            return $this->type;
        } else {
            return '';
        }
    }

    private function getScroll()
    {
        if (isset($this->params['scroll_id']) === true ) {
            return "scroll";
        } else {
            return '';
        }
    }
}