<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Flush
 * @package Elasticsearch\Endpoints\Indices
 */
class Flush extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_flush";

        if (isset($index) === true) {
            $uri = "/$index/_flush";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'force',
            'full',
            'refresh',
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