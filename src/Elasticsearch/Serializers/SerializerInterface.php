<?php

namespace Elasticsearch\Serializers;

interface SerializerInterface
{
    public function serialize($data);

    public function deserialize($data, $headers);
}
