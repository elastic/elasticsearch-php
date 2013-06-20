<?php
/**
 * User: zach
 * Date: 06/04/2013
 * Time: 13:33:19 pm
 */

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 * @package Elasticsearch\Endpoints\Indices\Mapping
 */
class Put extends AbstractEndpoint
{

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

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
            );
        }
        $this->body = $body;
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
                'index is required for Put'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Put'
            );
        }

        $index = $this->index;
        $type  = $this->type;
        $uri = "/$index/$type/_mapping";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_conflicts',
            'timeout',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';
    }


    /**
     * @return array
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    protected function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for Put');
        }

        return $this->body;
    }
}