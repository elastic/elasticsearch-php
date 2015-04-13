<?php

namespace Elasticsearch\Connections;

use Elasticsearch\Serializers\SerializerInterface;
use Psr\Log\LoggerInterface;

interface ConnectionFactoryInterface
{
    /**
     * @param $handler
     * @param array $connectionParams
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
     * @param LoggerInterface $tracer
     */
    public function __construct($handler, array $connectionParams,
                                SerializerInterface $serializer, LoggerInterface $logger, LoggerInterface $tracer);

    /**
     * @param $hostDetails
     *
     * @return ConnectionInterface
     */
    public function create($hostDetails);
}
