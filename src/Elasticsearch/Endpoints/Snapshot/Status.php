<?php

namespace Elasticsearch\Endpoints\Snapshot;

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
class Status extends AbstractSnapshotEndpoint
{
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

        if (isset($repository) === true) {
            $uri = "/_snapshot/$repository/_status";
        } elseif (isset($repository) === true && isset($snapshot) === true) {
            $uri = "/_snapshot/$repository/$snapshot/_status";
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
