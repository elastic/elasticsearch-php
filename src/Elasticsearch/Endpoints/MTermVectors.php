<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

/**
 * Class MTermVectors
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MTermVectors extends AbstractEndpoint
{
    public function setBody($body): MTermVectors
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $type = $this->type ?? null;
        $index = $this->index ?? null;

        if (isset($type) && isset($index)) {
            return "/$index/$type/_mtermvectors";
        }
        if (isset($index)) {
            return "/$index/_mtermvectors";
        }
        return "/_mtermvectors";
    }

    public function getParamWhitelist(): array
    {
        return [
            'ids',
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
        return 'POST';
    }
}
