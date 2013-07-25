<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Stats
 * @package Elasticsearch\Endpoints\Indices
 */
class Stats extends AbstractEndpoint
{

    /**
     * @param string|array $fields
     *
     * @return $this
     */
    public function setFields($fields)
    {
        if (isset($fields) !== true) {
            return $this;
        }

        if (is_array($fields) === true) {
            $fields = implode(",", $fields);
        }

        $this->params['fields'] = $fields;
        return $this;
    }


    /**
     * @param string|array $groups
     *
     * @return $this
     */
    public function setGroups($groups)
    {
        if (isset($groups) !== true) {
            return $this;
        }

        if (is_array($groups) === true) {
            $groups = implode(",", $groups);
        }

        $this->params['groups'] = $groups;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/$index/_stats";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'all',
            'clear',
            'docs',
            'fielddata',
            'filter_cache',
            'flush',
            'get',
            'id_cache',
            'ignore_indices',
            'indexing',
            'merge',
            'refresh',
            'search',
            'store',
            'warmer',
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