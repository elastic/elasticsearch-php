<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Update
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Update extends AbstractEndpoint
{
    public function setBody($body): Update
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
                'id is required for Update'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Update'
            );
        }

        $id = $this->id;
        $index = $this->index;
        $type = $this->type ?? null;

        if (isset($type)) {
            return "/$index/$type/$id/_update";
        }
        return "/$index/_update/$id";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_active_shards',
            '_source',
            '_source_excludes',
            '_source_includes',
            'lang',
            'parent',
            'refresh',
            'retry_on_conflict',
            'routing',
            'timeout',
            'if_seq_no',
            'if_primary_term'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
