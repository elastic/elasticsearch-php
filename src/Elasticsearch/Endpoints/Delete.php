<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * @throws RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->id) !== true) {
            throw new RuntimeException(
                'id is required for Delete'
            );
        }
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for Delete'
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
            'wait_for_active_shards',
            'parent',
            'refresh',
            'routing',
            'timeout',
            'if_seq_no',
            'if_primary_term',
            'version',
            'version_type'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
