<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class UpdateByQueryRethrottle
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class UpdateByQueryRethrottle extends AbstractEndpoint
{
    protected $taskId;

    public function setTaskId(?string $taskId): UpdateByQueryRethrottle
    {
        if ($taskId !== null) {
            $this->taskId = $taskId;
        }
        return $this;
    }

    /**
     * @throws Exceptions\RuntimeException
     * @return string
     */
    public function getURI(): string
    {
        if (!isset($this->taskId)) {
            throw new Exceptions\RuntimeException(
                'task_id is required for UpdateByQueryRethrottle'
            );
        }
        return "/_update_by_query/{$this->taskId}/_rethrottle";
    }


    public function getParamWhitelist(): array
    {
        return [
            'requests_per_second'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
