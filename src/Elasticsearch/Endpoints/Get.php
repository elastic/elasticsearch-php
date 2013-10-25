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
 * Class Get
 * @package Elasticsearch\Endpoints
 */
class Get extends AbstractEndpoint
{


    /** @var bool  */
    private $returnOnlySource = false;

    /** @var bool  */
    private $checkOnlyExistance = false;


    /**
     * @return $this
     */
    public function returnOnlySource()
    {
        $this->returnOnlySource = true;
        return $this;
    }


    /**
     * @return $this
     */
    public function checkOnlyExistance()
    {
        $this->checkOnlyExistance = true;
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
                'id is required for Get'
            );
        }

        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Get'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;

        if (isset($type) === true) {
            $uri = "/$index/$type/$id";
        } else {
            $uri = "/$index/_all/$id";
        }

        if ($this->returnOnlySource === true) {
            $uri .= '/_source';
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            'ignore',
            'exclude',
            'include',
            '_source',
            '_source_include',
            '_source_exclude'
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if ($this->checkOnlyExistance === true) {
            return 'HEAD';
        } else {
            return 'GET';
        }
    }
}