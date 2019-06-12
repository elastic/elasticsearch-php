<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions;

/**
 * Class SearchTemplate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SearchTemplate extends AbstractEndpoint
{
    public function setBody($body): SearchTemplate
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_search/template";
        }
        if (isset($index)) {
            return "/$index/_search/template";
        }
        return "/_search/template";
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'ignore_throttled',
            'allow_no_indices',
            'expand_wildcards',
            'preference',
            'routing',
            'scroll',
            'search_type',
            'explain',
            'profile',
            'typed_keys',
            'rest_total_hits_as_int',
            'ccs_minimize_roundtrips'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
