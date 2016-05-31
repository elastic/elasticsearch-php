<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

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
    // A comma-separated list of features
    private $feature;
    /**
     * @param $feature
     *
     * @return $this
     */
    public function setFeature($feature)
    {
        if (isset($feature) !== true) {
            return $this;
        }
        if (is_array($feature) === true) {
            $feature = implode(',', $feature);
        }
        $this->feature = $feature;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     *
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Get'
            );
        }
        $index = $this->index;
        $feature = $this->feature;
        $uri = "/$index";
        if (isset($index) === true && isset($feature) === true) {
            $uri = "/$index/$feature";
        } elseif (isset($index) === true) {
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
            'local',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'flat_settings',
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
