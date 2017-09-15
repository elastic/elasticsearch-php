<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Count
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Count extends AbstractEndpoint
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
    public function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_count";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_count";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_count";
        } elseif (isset($index) === true) {
            $uri = "/$index/_count";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'min_score',
            'preference',
            'routing',
            'source',
            'q',
            'df',
            'default_operator',
            'analyzer',
            'lowercase_expanded_terms',
            'analyze_wildcard',
            'lenient',
            'lowercase_expanded_terms',
            'terminate_after'
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
