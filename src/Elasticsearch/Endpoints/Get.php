<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
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
    public function getURI()
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
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Get'
            );
        }
        $id = $this->id;
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/$id";

        if (isset($index) === true && isset($type) === true && isset($id) === true) {
            $uri = "/$index/$type/$id";
        }

        if ($this->returnOnlySource === true) {
            $uri .= '/_source';
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'version',
            'version_type',
            'stored_fields',
            'include_type_name'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        if ($this->checkOnlyExistance === true) {
            return 'HEAD';
        } else {
            return 'GET';
        }
    }
}
