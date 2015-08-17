<?php
/**
 * User: zach
 * Date: 10/08/2014
 * Time: 3:40:00 pm
 */

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Verify
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Verify extends AbstractEndpoint
{
    // A comma-separated list of repository names
    private $repository;


    /**
     * @param $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
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
    protected function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'local',
        );
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}