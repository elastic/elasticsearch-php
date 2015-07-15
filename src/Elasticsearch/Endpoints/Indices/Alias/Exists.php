<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Exists
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices\Alias
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Exists extends AbstractEndpoint
{
    // A comma-separated list of alias names to return
    private $name;


    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $name = $this->name;
        $uri   = "/_alias/$name";

        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_alias/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_alias";
        } elseif (isset($name) === true) {
            $uri = "/_alias/$name";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local',
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