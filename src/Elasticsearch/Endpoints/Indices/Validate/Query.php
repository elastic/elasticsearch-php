<?php

namespace Elasticsearch\Endpoints\Indices\Validate;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Query
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Validate
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Query extends AbstractEndpoint
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
     * @return string
     */
    protected function getURI()
    {
        return $this->getOptionalURI('_validate/query');
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'explain',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'operation_threading',
            'q',
            'analyzer',
            'analyze_wildcard',
            'default_operator',
            'df',
            'lenient',
            'lowercase_expanded_terms',
            'rewrite',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
