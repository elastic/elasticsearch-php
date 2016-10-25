<?php

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractRepositoryEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractRepositoryEndpoint extends AbstractEndpoint
{
    /** @var  string A repository name or a comma-separated list of repository names (depends on the function) */ 
    protected $repository;

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

}