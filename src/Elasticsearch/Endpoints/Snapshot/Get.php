<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

/**
 * Snapshot Get endpoint.
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractSnapshotEndpoint
{
    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return array(
            'master_timeout',
            'ignore_unavailable',
            'verbose'
        );
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
