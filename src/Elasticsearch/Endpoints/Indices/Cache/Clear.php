<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Clear
 * @package Elasticsearch\Endpoints\Indices\Cache
 */
class Clear extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_cache/clear";

        if (isset($index) === true) {
            $uri = "/$index/_cache/clear";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'field_data',
            'fielddata',
            'fields',
            'filter',
            'filter_cache',
            'filter_keys',
            'id',
            'id_cache',
            'index',
            'recycler',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}