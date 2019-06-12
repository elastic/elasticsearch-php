<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Get'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Get'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type ?? '_doc';

        return "/$index/$type/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'stored_fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_excludes',
            '_source_exclude',
            '_source_includes',
            '_source_include',
            'version',
            'version_type'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
