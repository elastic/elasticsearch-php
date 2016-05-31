<?php

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Status.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Status extends AbstractEndpoint
{
    // A repository name
    private $repository;
    // A comma-separated list of snapshot names
    private $snapshot;
    /**
     * @param $repository
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
     * @param $snapshot
     *
     * @return $this
     */
    public function setSnapshot($snapshot)
    {
        if (isset($snapshot) !== true) {
            return $this;
        }
        if (is_array($snapshot) === true) {
            $snapshot = implode(',', $snapshot);
        }
        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $repository = $this->repository;
        $snapshot = $this->snapshot;
        $uri = '/_snapshot/_status';
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
    protected function getParamWhitelist()
    {
        return array(
            'master_timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
