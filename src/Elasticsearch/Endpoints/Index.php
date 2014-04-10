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
 * Class Index
 * @package Elasticsearch\Endpoints
 */
class Index extends AbstractEndpoint
{
    /** @var bool  */
    private $createIfAbsent = false;

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }


        $this->body = $body;
        return $this;
    }


    /**
     * @return $this
     */
    public function createIfAbsent()
    {
        $this->createIfAbsent = true;
        return $this;
    }


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Index'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Index'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
        }

        if ($this->createIfAbsent === true) {
            $uri .= $this->addCreateFlag();
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'op_type',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if (isset($this->id) === true) {
            return 'PUT';
        } else {
            return 'POST';
        }
    }


    /**
     * @return array
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }

    private function addCreateFlag()
    {
        if (isset($this->id) === true) {
            return '/_create';
        } else {
            $this->params['op_type'] = 'create';
            return "";
        }

    }
}
