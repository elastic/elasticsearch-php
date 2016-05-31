<?php

namespace Elasticsearch\Endpoints\Indices\Field;

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
    // A comma-separated list of fields
    private $fields;
    /**
     * @param $fields
     *
     * @return $this
     */
    public function setFields($fields)
    {
        if (isset($fields) !== true) {
            return $this;
        }
        if (is_array($fields) === true) {
            $fields = implode(',', $fields);
        }
        $this->fields = $fields;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     *
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->fields) !== true) {
            throw new Exceptions\RuntimeException(
                'fields is required for Get'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $fields = $this->fields;
        $uri = "/_mapping/field/$fields";
        if (isset($index) === true && isset($type) === true && isset($fields) === true) {
            $uri = "/$index/_mapping/$type/field/$fields";
        } elseif (isset($type) === true && isset($fields) === true) {
            $uri = "/_mapping/$type/field/$fields";
        } elseif (isset($index) === true && isset($fields) === true) {
            $uri = "/$index/_mapping/field/$fields";
        } elseif (isset($fields) === true) {
            $uri = "/_mapping/field/$fields";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'include_defaults',
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
        return 'GET';
    }
}
