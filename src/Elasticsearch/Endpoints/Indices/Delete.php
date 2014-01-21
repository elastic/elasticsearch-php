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
 * Class Delete
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Delete extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri   = "/$index";

        if (isset($index) === true) {
            $uri = "/$index";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'timeout',
            'master_timeout',
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