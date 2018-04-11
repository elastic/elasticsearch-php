<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Status
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Status extends AbstractEndpoint
{
    /**
     * A comma-separated list of repository names
     *
     * @var string
     */
    private $repository;

    /**
     * A comma-separated list of snapshot names
     *
     * @var string
     */
    private $snapshot;

    /**
     * @param string $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @param string $snapshot
     *
     * @return $this
     */
    public function setSnapshot($snapshot)
    {
        if (isset($snapshot) !== true) {
            return $this;
        }

        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->snapshot) === true && isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'Repository param must be provided if snapshot param is set'
            );
        }

        $repository = $this->repository;
        $snapshot   = $this->snapshot;
        $uri        = "/_snapshot/_status";

        if (isset($repository) === true && isset($snapshot) === true) {
            $uri = "/_snapshot/$repository/$snapshot/_status";
        } elseif (isset($repository) === true) {
            $uri = "/_snapshot/$repository/_status";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'ignore_unavailable'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
