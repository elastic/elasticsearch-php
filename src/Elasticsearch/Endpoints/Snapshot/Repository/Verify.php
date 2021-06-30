<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Verify
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Verify extends AbstractEndpoint
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
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        $repository = $this->repository;
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Verify'
            );
        }

        $uri   = "/_snapshot/$repository/_verify";

        return $uri;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'master_timeout',
            'local',
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'POST';
    }
}
