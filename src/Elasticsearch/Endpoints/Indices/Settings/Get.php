<?php

namespace Elasticsearch\Endpoints\Indices\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    // The name of the settings that should be included
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
        $uri = '/_settings';
        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_settings/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_settings";
        } elseif (isset($name) === true) {
            $uri = "/_settings/$name";
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
            'flat_settings',
            'local',
            'human',
            'include_defaults',
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
