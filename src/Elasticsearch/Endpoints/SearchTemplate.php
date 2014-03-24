<?php
/**
 * User: zach
 * Date: 3/24/14
 * Time: 5:09 PM
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class SearchTemplate
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class SearchTemplate extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;
        return $this;
    }



    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_search/template";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_search/template";
        } elseif (isset($index) === true) {
            $uri = "/$index/_search/template";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_search/template";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array();
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}