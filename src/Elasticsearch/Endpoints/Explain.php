<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Explain
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Explain extends AbstractEndpoint
{
    public function setBody($body): Explain
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Explain'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Explain'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type ?? null;

        $uri = isset($type)
            ? "/$index/$type/$id/_explain"
            : "/$index/_explain/$id";

        return $uri;
    }

    public function getParamWhitelist(): array
    {
        return [
            'analyze_wildcard',
            'analyzer',
            'default_operator',
            'df',
            'stored_fields',
            'lenient',
            'parent',
            'preference',
            'q',
            'routing',
            '_source',
            '_source_excludes',
            '_source_includes'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
