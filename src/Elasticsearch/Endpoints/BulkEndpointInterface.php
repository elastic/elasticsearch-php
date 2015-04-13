<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

interface BulkEndpointInterface
{
    public function __construct(Transport $transport, SerializerInterface $serializer);
}
