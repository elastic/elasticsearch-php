<?php
/**
 * User: zach
 * Date: 11/4/13
 * Time: 9:11 AM
 */


namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class GetField
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices\Mapping
 *
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class GetField extends AbstractEndpoint
{
    /** @var  string */
    private $field;


    /**
     * @param string|array $field
     *
     * @return $this
     */
    public function setField($field) {
        if (isset($field) !== true) {
            return $this;
        }

        if (is_array($field) === true) {
            $field = implode(",", $field);
        }

        $this->field = $field;
        return $this;
    }


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->field) !== true) {
            throw new Exceptions\RuntimeException(
                'field is required for Get Field Mapping'
            );
        }
        $uri = $this->getOptionalURI('_mapping/field');

        return $uri.'/'.$this->field;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'include_defaults'
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