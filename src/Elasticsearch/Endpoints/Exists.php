<?php
/**
 * User: zach
 * Date: 7/23/13
 * Time: 4:51 PM
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Exists
 * @package Elasticsearch\Endpoints\Indices\Exists
 */
class Exists extends AbstractEndpoint
{

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Exists'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Exists'
            );
        }

        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Exists'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type/$id";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'parent',
            'preference',
            'refresh',
            'realtime',
            'routing'
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'HEAD';
    }
}