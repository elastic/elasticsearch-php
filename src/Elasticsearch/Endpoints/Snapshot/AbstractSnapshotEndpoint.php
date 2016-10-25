<?php

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractSnapshotEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractSnapshotEndpoint extends AbstractEndpoint
{
    /** @var  string A repository name or a comma-separated list of repository names (depends on the function) */
    protected $repository;

    /** @var  string A snapshot name or a comma-separated list of snapshot names (depends on the function) */
    protected $snapshot;

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

        $this->repository = urlencode($repository);

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

        $this->snapshot = $snapshot;

        return $this;
    }

}