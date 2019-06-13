<?php

declare(strict_types = 1);

namespace Elasticsearch\Connections;

use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;
use Psr\Log\LoggerInterface;

/**
 * Interface ConnectionInterface
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface ConnectionInterface
{
    /**
     * Get the transport schema for this connection
     */
    public function getTransportSchema(): string;

    /**
     * Get the hostname for this connection
     */
    public function getHost(): string;

    /**
     * Get the port for this connection
     *
     * @return int
     */
    public function getPort();

    /**
     * Get the username:password string for this connection, null if not set
     */
    public function getUserPass(): ?string;

    /**
     * Get the URL path suffix, null if not set
     */
    public function getPath(): ?string;

    /**
     * Check to see if this instance is marked as 'alive'
     */
    public function isAlive(): bool;

    /**
     * Mark this instance as 'alive'
     */
    public function markAlive(): void;

    /**
     * Mark this instance as 'dead'
     */
    public function markDead(): void;

    /**
     * Return an associative array of information about the last request
     */
    public function getLastRequestInfo(): array;

    /**
     * @param  null $body
     * @return mixed
     */
    public function performRequest(string $method, string $uri, array $params = [], $body = null, array $options = [], Transport $transport = null);
}
