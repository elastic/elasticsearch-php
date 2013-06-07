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
 * Class Status
 * @package Elasticsearch\Endpoints\Indices
 */
class Status extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_status";

        if (isset($index) === true) {
            $uri = "/$index/_status";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_indices',
            'operation_threading',
            'recovery',
            'snapshot',
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