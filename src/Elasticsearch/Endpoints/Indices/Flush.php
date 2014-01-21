<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Flush
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
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
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
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