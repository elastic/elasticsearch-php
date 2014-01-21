<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Ping
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Ping extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $uri   = "/";


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