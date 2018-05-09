<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

/**
 * Snapshot Restore endpoint.
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Restore extends AbstractSnapshotEndpoint
{
    protected $baseUrl = '/_snapshot/{repository}/{snapshot}/_restore';

    public function setBody($body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return array(
            'master_timeout',
            'wait_for_completion',
        );
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
