<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Serializers\SerializerInterface;
use Traversable;

/**
 * Class Bulk
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string|array|Traversable $body
     */
    public function setBody($body): BulkEndpointInterface
    {
        if (empty($body)) {
            return $this;
        }

        if (is_array($body) === true || $body instanceof Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } elseif (is_string($body)) {
            $this->body = $body;
            if (substr($body, -1) != "\n") {
                $this->body .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Bulk body must be an array, traversable object or string");
        }

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;
        if (isset($index) && isset($type)) {
            return "/$index/$type/_bulk";
        }
        if (isset($index)) {
            return "/$index/_bulk";
        }
        return "/_bulk";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_active_shards',
            'refresh',
            'routing',
            'timeout',
            'type',
            '_source',
            '_source_includes',
            '_source_excludes',
            'pipeline'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
