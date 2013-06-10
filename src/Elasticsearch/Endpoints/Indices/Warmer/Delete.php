<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Warmer;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 * @package Elasticsearch\Endpoints\Indices\Warmer
 */
class Delete extends AbstractWarmerEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $uri = $this->getOptionalURI('_warmer');

        $name = $this->name;
        if (isset($name) === true) {
            $uri .= "/$name";
        }

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
        return 'DELETE';
    }
}