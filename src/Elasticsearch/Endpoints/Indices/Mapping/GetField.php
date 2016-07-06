<?php

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class GetField
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Mapping
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetField extends AbstractEndpoint
{
    /** @var  string */
    private $fields;

    /**
     * @param string|array $fields
     *
     * @return $this
     */
    public function setFields($fields)
    {
        if (isset($fields) !== true) {
            return $this;
        }

        if (is_array($fields) === true) {
            $fields = implode(",", $fields);
        }

        $this->fields = $fields;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->fields) !== true) {
            throw new Exceptions\RuntimeException(
                'fields is required for Get Field Mapping'
            );
        }
        $uri = $this->getOptionalURI('_mapping/field');

        return $uri.'/'.$this->fields;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'include_defaults',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local'
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
