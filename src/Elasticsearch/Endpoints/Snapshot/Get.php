<?php

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractSnapshotEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Get'
            );
        }
        if (isset($this->snapshot) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot is required for Get'
            );
        }
        $repository = $this->repository;
        $snapshot = $this->snapshot;
        $uri   = "/_snapshot/$repository/$snapshot";

        if (isset($repository) === true && isset($snapshot) === true) {
            $uri = "/_snapshot/$repository/$snapshot";
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
