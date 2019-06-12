<?php

declare(strict_types = 1);

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
    /**
     * @var string
     */
    private $fields;

    /**
     * @param string|array $fields
     */
    public function setFields($fields): GetField
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
     */
    public function getURI(): string
    {
        if (isset($this->fields) !== true) {
            throw new Exceptions\RuntimeException(
                'fields is required for Get Field Mapping'
            );
        }
        $fields = $this->fields;
        $index = $this->index ?? null;
        $type = $this->type ?? null;
        if (isset($index) && isset($type)) {
            return "/$index/_mapping/$type/field/$fields";
        }
        if (isset($type)) {
            return "/_mapping/$type/field/$fields";
        }
        if (isset($index)) {
            return "/$index/_mapping/field/$fields";
        }
        return "/_mapping/field/$fields";
    }

    public function getParamWhitelist(): array
    {
        return [
            'include_type_name',
            'include_defaults',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
