<?php

namespace Elasticsearch\Endpoints\Script;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Script
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Get extends AbstractEndpoint
{
    /** @var  String */
    private $lang;

    /**
     * @param $lang
     *
     * @return $this
     */
    public function setLang($lang)
    {
        if (isset($lang) !== true) {
            return $this;
        }

        $this->lang = $lang;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getEndpointURI()
    {
        if (isset($this->lang) !== true) {
            throw new Exceptions\RuntimeException(
                'lang is required for Put'
            );
        }
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for put'
            );
        }
        $id   = $this->id;
        $lang = $this->lang;
        $uri  = "/_scripts/$lang/$id";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'version_type',
            'version'
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
