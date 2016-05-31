<?php

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Exists.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
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
        if (isset($name) !== true) {
            return $this;
        }
        if (is_array($name) === true) {
            $name = implode(',', $name);
        }
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
        $uri = "/$index/_alias";
        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_alias/$name";
        } elseif (isset($name) === true) {
            $uri = "/_alias/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_alias";
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
