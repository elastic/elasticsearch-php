<?php
/**
 * User: zach
 * Date: 7/22/13
 * Time: 8:57 PM
 */

namespace Elasticsearch\Endpoints;


use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

interface BulkEndpointInterface {
    public function __construct(Transport $transport, SerializerInterface $serializer);
}