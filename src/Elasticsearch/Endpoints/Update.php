<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Update
 * @package Elasticsearch\Endpoints
 */
class Update extends AbstractEndpoint
{

    /**
     * @param $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for Update'
            );
        }

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Update'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Update'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type/$id/_update";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'fields',
            'lang',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'retry_on_conflict',
            'routing',
            'script',
            'timeout',
            'timestamp',
            'ttl',
            'version_type',
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