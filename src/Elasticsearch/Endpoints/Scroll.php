<?php

namespace Elasticsearch\Endpoints;



/**
 * Class Scroll.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Scroll extends AbstractEndpoint
{
    // The scroll ID
    private $scroll_id;
    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
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
     * @param $scroll_id
     *
     * @return $this
     */
    public function setScrollId($scroll_id)
    {
        if (isset($scroll_id) !== true) {
            return $this;
        }
        $this->scroll_id = $scroll_id;

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $scroll_id = $this->scroll_id;
        $uri = '/_search/scroll';
        if (isset($scroll_id) === true) {
            $uri = "/_search/scroll/$scroll_id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'scroll',
            'scroll_id',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET';
    }
}
