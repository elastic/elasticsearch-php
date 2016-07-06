<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Scroll
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Scroll extends AbstractEndpoint
{
    private $clear = false;

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
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    public function setClearScroll($clear)
    {
        $this->clear = $clear;

        return $this;
    }

    /**
     * @param $scroll_id
     *
     * @return $this
     */
    public function setScrollId($scroll_id)
    {
        if (isset($scroll_id) !== true) {
            return $this;
        }

        $this->body = $scroll_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $uri   = "/_search/scroll";
        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'scroll',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        if ($this->clear == true) {
            return 'DELETE';
        }

        return 'GET';
    }
}
