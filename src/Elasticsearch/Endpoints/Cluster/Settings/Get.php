<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 1:53 PM
 */

namespace Elasticsearch\Endpoints\Cluster\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 * @package Elasticsearch\Endpoints\Cluster\Settings
 */
class Get extends AbstractEndpoint
{

    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = "/_cluster/settings";

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