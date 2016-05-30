<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Deletebyquery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class DeleteByQuery extends AbstractEndpoint
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
                'index is required for DeleteByQuery'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $uri = "/$index/_query";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_query";
        } elseif (isset($index) === true) {
            $uri = "/$index/_query";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'q',
            'consistency',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'replication',
            'size',
            'source',
            'timeout',
            'routing',
            'df',
            'analyzer',
            'default_operator',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}
