<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class Reindex
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ReindexRethrottle extends AbstractEndpoint
{
    protected $taskId;

    public function setTaskId(?string $taskId): ReindexRethrottle
    {
        if ($taskId !== null) {
            $this->taskId = $taskId;
        }
        return $this;
    }

    public function getParamWhitelist(): array
    {
        return [
            'requests_per_second'
        ];
    }

    public function getURI(): string
    {
        if (!isset($this->taskId)) {
            throw new RuntimeException(
                'task_id is required for ReindexRethrottle'
            );
        }
        return "/_reindex/{$this->taskId}/_rethrottle";
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
