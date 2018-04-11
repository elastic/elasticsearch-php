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
     * @return string
     */
    public function getURI()
    {
        $repository = $this->repository;
        $uri   = "/_snapshot";

        if (isset($repository) === true) {
            $uri = "/_snapshot/$repository";
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
            'local',
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
