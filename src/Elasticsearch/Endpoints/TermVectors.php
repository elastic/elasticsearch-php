<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class TermVectors
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TermVectors extends AbstractEndpoint
{
    public function setBody($body): TermVectors
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
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for TermVectors'
            );
        }

        $index = $this->index;
        $type  = $this->type ?? null;
        $id    = $this->id ?? null;

        if (isset($type) && isset($id)) {
            return "/$index/$type/$id/_termvectors";
        }
        if (isset($type)) {
            return "/$index/$type/_termvectors";
        }
        if (isset($id)) {
            return "/$index/_termvectors/$id";
        }
        return "/$index/_termvectors";
    }

    public function getParamWhitelist(): array
    {
        return [
            'term_statistics',
            'field_statistics',
            'fields',
            'offsets',
            'positions',
            'payloads',
            'preference',
            'routing',
            'parent',
            'realtime',
            'version',
            'version_type'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
