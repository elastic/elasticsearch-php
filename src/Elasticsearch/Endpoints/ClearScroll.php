<?php

namespace Elasticsearch\Endpoints;



/**
 * Class ClearScroll
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class ClearScroll extends AbstractEndpoint
{
    // A comma-separated list of scroll IDs to clear
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
        if (is_array($scroll_id) === true) {
            $scroll_id = implode(',', $scroll_id);
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
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}
