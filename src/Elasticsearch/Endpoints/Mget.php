<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Mget
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Mget extends AbstractEndpoint
{
    public function setBody($body): Mget
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_mget";
        }
        if (isset($index)) {
            return "/$index/_mget";
        }
        return '/_mget';
    }

    public function getParamWhitelist(): array
    {
        return [
            'stored_fields',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_excludes',
            '_source_includes'
        ];
    }

    /**
     * @throws RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Body is required for MGet');
        }

        return $this->body;
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
