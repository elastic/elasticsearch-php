<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Indices\Settings
 */
class Get extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $uri   = "/_settings";

        if (isset($index) === true) {
            $uri = "/$index/_settings";
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
        return 'GET';
    }
}