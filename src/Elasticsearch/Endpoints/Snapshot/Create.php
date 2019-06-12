<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Create
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Create extends AbstractEndpoint
{
    /**
     * A repository name
     *
     * @var string
     */
    private $repository;

    /**
     * A snapshot name
     *
     * @var string
     */
    private $snapshot;

    /**
     * @param  null|string|array $body
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($body): Create
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function setRepository(?string $repository): Create
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    public function setSnapshot(?string $snapshot): Create
    {
        if (isset($snapshot) !== true) {
            return $this;
        }

        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getURI(): string
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Create'
            );
        }
        if (isset($this->snapshot) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot is required for Create'
            );
        }
        return "/_snapshot/{$this->repository}/{$this->snapshot}";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'wait_for_completion'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
}
