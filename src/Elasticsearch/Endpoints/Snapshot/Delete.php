<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

/**
 * Snapshot Delete endpoint.
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractSnapshotEndpoint
{
    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
        );
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }
}
