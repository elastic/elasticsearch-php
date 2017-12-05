<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class TermVectors
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class TermVectors extends AbstractEndpoint
{
    /**
     * @var boolean
     */
    protected $shouldUseDeprecated;

    /**
     * @return $this
     */
    public function useDeprecated()
    {
        $this->shouldUseDeprecated = true;

        return $this;
    }

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
                'index is required for TermVector'
            );
        }
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for TermVector'
            );
        }
        if (isset($this->id) !== true && isset($this->body['doc']) !== true) {
           throw new Exceptions\RuntimeException(
               'id or doc is required for TermVectors'
           );
        }

        $index = $this->index;
        $type = $this->type;
        $id = $this->id;

        $uri = "/$index/$type/_termvector" . ($this->shouldUseDeprecated ? '' : 's');

        if ($id !== null) {
            $uri = "/$index/$type/$id/_termvector" . ($this->shouldUseDeprecated ? '' : 's');
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'term_statistics',
            'field_statistics',
            'dfs',
            'fields',
            'offsets',
            'positions',
            'payloads',
            'preference',
            'routing',
            'parent',
            'realtime',
            'version',
            'version_type',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}
