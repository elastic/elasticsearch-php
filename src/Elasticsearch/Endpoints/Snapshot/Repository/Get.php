<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * A comma-separated list of repository names
     *
     * @var string
     */
    private $repository;

    public function setRepository(?string $repository): Get
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    public function getURI(): string
    {
        $repository = $this->repository ?? null;
        if (isset($repository)) {
            return "/_snapshot/$repository";
        }
        return "/_snapshot";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'local',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
