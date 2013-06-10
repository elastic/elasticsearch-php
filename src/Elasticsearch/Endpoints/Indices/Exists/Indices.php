<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Exists;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Indices
 * @package Elasticsearch\Endpoints\Indices\Exists
 */
class Indices extends AbstractEndpoint
{

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Indices'
            );
        }

        $index = $this->index;
        $uri   = "/$index";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
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