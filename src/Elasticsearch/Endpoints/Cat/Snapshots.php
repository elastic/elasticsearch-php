<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Snapshots
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Snapshots extends AbstractEndpoint
{
    private $repository;

    /**
     * @param $fields
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
        if (isset($this->repository) !== true) {
            throw new RuntimeException(
                'repository is required for Cat Snapshots '
            );
        }
        $repository = $this->repository;
        $uri   = "/_cat/snapshots/$repository/";
        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's'
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
