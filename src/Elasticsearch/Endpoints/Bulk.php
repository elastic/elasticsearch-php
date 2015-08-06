<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class Bulk
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{
    /**
     * @param Transport           $transport
     * @param SerializerInterface $serializer
     */
    public function __construct(Transport $transport, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        parent::__construct($transport);
    }

    /**
     * @param string|array $body
     *
     * @return $this
     */
    public function setBody($body)
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

    /**
     * @return string
     */
    protected function getURI()
    {
        return $this->getOptionalURI('_bulk');
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'consistency',
            'refresh',
            'replication',
            'type',
            'fields'
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
