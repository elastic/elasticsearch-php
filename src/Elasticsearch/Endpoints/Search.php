<?php
/**
 * User: zach
 * Date: 5/31/13
 * Time: 9:59 AM
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;

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
        $uri   = '/_search/';
        $index = $this->index;
        $type  = $this->type;

        if (isset($index) === true) {
            $uri = "/$index/_search/";

            if (isset($this->type) === true) {
                $uri  = "/$index/$type/_search/";
            }
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'explain',
            'fields',
            'from',
            'ignore_indices',
            'indices_boost',
            'preference',
            'routing',
            'search_type',
            'size',
            'sort',
            'source',
            'stats',
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