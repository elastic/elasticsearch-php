<?php

namespace Elasticsearch\Endpoints\Indices\Aliases;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Aliases
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    // A comma-separated list of alias names to filter
    private $name;

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $name = $this->name;
        $uri   = "/_aliases";

        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_aliases/$name";
        } elseif (isset($name) === true) {
            $uri = "/_aliases/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_aliases";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'timeout',
            'local',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
