<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Source;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Source
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Exists extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Exists'
            );
        }
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Exists'
            );
        }

        $id = $this->id;
        $index = $this->index;
        $type = $this->type ?? null;

        if (isset($type)) {
            return "/$index/$type/$id/_source";
        }
        return "/$index/_source/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_excludes',
            '_source_includes',
            'version',
            'version_type',
        ];
    }

    public function getMethod(): string
    {
        return 'HEAD';
    }
}
