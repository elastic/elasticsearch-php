<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Cluster\Settings
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
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
            'flat_settings',
            'master_timeout',
            'timeout',
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