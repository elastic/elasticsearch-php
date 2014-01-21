<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Snapshot\Repository;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Snapshot\Repository
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Get extends AbstractEndpoint
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
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;
        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
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
        return 'GET';
    }
}