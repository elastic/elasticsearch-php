<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Deletebyquery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
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
        if (!$this->index) {
            throw new Exceptions\RuntimeException(
                'index is required for Deletebyquery'
            );
        }

        $uri = "/{$this->index}/_delete_by_query";
        if ($this->type) {
            $uri = "/{$this->index}/{$this->type}/_delete_by_query";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'conflicts',
            'refresh',
            'requests_per_second',
            'routing',
            'scroll_size',
            'timeout',
            'wait_for_completion',
            'wait_for_active_shards',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}
