<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Shrink.
 *
 * @category Elasticsearch
 *
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 *
 * @link     http://elastic.co
 */
class Shrink extends AbstractEndpoint
{
    // The name of the target index to shrink into
    private $target;
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
     * @param $target
     *
     * @return $this
     */
    public function setTarget($target)
    {
        if (isset($target) !== true) {
            return $this;
        }
        $this->target = $target;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\BadMethodCallException
     *
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Shrink'
            );
        }
        if (isset($this->target) !== true) {
            throw new Exceptions\RuntimeException(
                'target is required for Shrink'
            );
        }
        $index = $this->index;
        $target = $this->target;
        $uri = "/$index/_shrink/$target";
        if (isset($index) === true && isset($target) === true) {
            $uri = "/$index/_shrink/$target";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'timeout',
            'master_timeout',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        //TODO Fix Me!
        return 'PUT';
    }
}
