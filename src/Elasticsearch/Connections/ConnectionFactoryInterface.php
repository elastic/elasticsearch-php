<?php

declare(strict_types = 1);

namespace Elasticsearch\Connections;

use Elasticsearch\Serializers\SerializerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractConnection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface ConnectionFactoryInterface
{
    /**
     * @param callable $handler
     * @param array $connectionParams
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
     * @param LoggerInterface $tracer
     */
    public function __construct(
        callable $handler,
        array $connectionParams,
        SerializerInterface $serializer,
        LoggerInterface $logger,
        LoggerInterface $tracer
    );

    /**
     * @param array $hostDetails
     *
     * @return ConnectionInterface
     */
    public function create($hostDetails);
}
