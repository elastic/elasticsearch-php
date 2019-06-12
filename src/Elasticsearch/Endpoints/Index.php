<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Index
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Index extends AbstractEndpoint
{
    public function setBody($body): Index
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
                'index is required for Index'
            );
        }

        $id    = $this->id ?? null;
        $index = $this->index;
        $type  = $this->type ?? '_doc';

        if (isset($id)) {
            return "/$index/$type/$id";
        }
        return "/$index/$type";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_active_shards',
            'op_type',
            'parent',
            'refresh',
            'routing',
            'timeout',
            'version',
            'version_type',
            'if_seq_no',
            'if_primary_term',
            'pipeline'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @throws RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }
}
