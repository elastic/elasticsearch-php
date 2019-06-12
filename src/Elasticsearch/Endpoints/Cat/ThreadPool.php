<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ThreadPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class ThreadPool extends AbstractEndpoint
{
    protected $threadPoolPatterns;

    public function setThreadPoolPatterns(?string $threadPoolPatterns): ThreadPool
    {
        if ($threadPoolPatterns !== null) {
            $this->threadPoolPatterns = $threadPoolPatterns;
        }
        return $this;
    }

    public function getURI(): string
    {
        $threadPoolPatterns = $this->threadPoolPatterns ?? null;
        if (isset($threadPoolPatterns)) {
            return "/_cat/thread_pool/$threadPoolPatterns";
        }
        return "/_cat/thread_pool";
    }

    public function getParamWhitelist(): array
    {
        return [
            'format',
            'size',
            'local',
            'master_timeout',
            'h',
            'help',
            's',
            'v'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
