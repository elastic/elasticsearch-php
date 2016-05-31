<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Create
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Create extends AbstractEndpoint
{
    /**
     * @param array|object $body
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
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Create'
            );
        }
        $index = $this->index;
        $uri = "/$index";

        if (isset($index) === true) {
            $uri = "/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'timeout',
            'master_timeout',
            'update_all_types',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        if (is_array($this->body) && isset($this->body['mappings']) === true) {
            return 'POST';
        } elseif (is_object($this->body) && isset($this->body->mappings) === true) {
            return 'POST';
        }
        return 'PUT';
    }
}
