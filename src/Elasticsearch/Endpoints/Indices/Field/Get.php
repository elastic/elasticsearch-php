<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Field;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 */
class Get extends AbstractEndpoint
{
    /**
     * A comma-separated list of fields
     *
     * @var string
     */
    private $field;

    /**
     * @param string $field
     *
     * @return $this
     */
    public function setField($field)
    {
        if (isset($field) !== true) {
            return $this;
        }

        $this->field = $field;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->field) !== true) {
            throw new Exceptions\RuntimeException(
                'field is required for Get'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $field = $this->field;
        $uri   = "/_mapping/field/$field";

        if (isset($index) === true && isset($type) === true && isset($field) === true) {
            $uri = "/$index/_mapping/$type/field/$field";
        } elseif (isset($type) === true && isset($field) === true) {
            $uri = "/_mapping/$type/field/$field";
        } elseif (isset($index) === true && isset($field) === true) {
            $uri = "/$index/_mapping/field/$field";
        } elseif (isset($field) === true) {
            $uri = "/_mapping/field/$field";
        }

        return $uri;
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
