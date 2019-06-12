<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Serializers\SerializerInterface;

/**
 * Class MsearchTemplate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MsearchTemplate extends AbstractEndpoint
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array|string $body
     */
    public function setBody($body): MsearchTemplate
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) === true) {
            $bulkBody = "";
            foreach ($body as $item) {
                $bulkBody .= $this->serializer->serialize($item)."\n";
            }
            $body = $bulkBody;
        }

        $this->body = $body;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;

        if (isset($index) && isset($type)) {
            return "/$index/$type/_msearch/template";
        }
        if (isset($index)) {
            return "/$index/_msearch/template";
        }
        return "/_msearch/template";
    }

    public function getParamWhitelist(): array
    {
        return [
            'search_type',
            'typed_keys',
            'max_concurrent_searches',
            'rest_total_hits_as_int',
            'ccs_minimize_roundtrips'
        ];
    }

    /**
     * @throws RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new RuntimeException('Body is required for MSearch');
        }

        return $this->body;
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
