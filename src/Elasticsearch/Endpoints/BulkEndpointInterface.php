<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Interface BulkEndpointInterface
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface BulkEndpointInterface
{
    /**
     * Constructor
     *
     * @param Transport           $transport  Transport instance
     * @param SerializerInterface $serializer A serializer
     */
    public function __construct(Transport $transport, SerializerInterface $serializer);
}
