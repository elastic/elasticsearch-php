<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\ConnectionPool\AbstractConnectionPool;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;
use GuzzleHttp\Ring\Future\FutureArray;
use GuzzleHttp\Ring\Future\FutureArrayInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use React\Promise\Deferred;
use React\Promise\Promise;

class TransportTest extends TestCase
{
    public function setUp(): void
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->trace = $this->createMock(LoggerInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->connectionPool = $this->createMock(AbstractConnectionPool::class);
        $this->connection = $this->createMock(Connection::class);
    }

    public function testPerformRequestWithServerErrorResponseException404Result()
    {
        $deferred = new Deferred();
        $deferred->reject(new ServerErrorResponseException('foo', 404));
        $future = new FutureArray($deferred->promise());

        $this->connection->method('performRequest')
            ->willReturn($future);
        
        $this->connectionPool->method('nextConnection')
            ->willReturn($this->connection);

        $this->connectionPool->expects($this->never())
            ->method('scheduleCheck');

        $transport = new Transport(1, $this->connectionPool, $this->logger);

        $result = $transport->performRequest('GET', '/');
        $this->assertInstanceOf(FutureArrayInterface::class, $result);
    }

    public function testPerformRequestWithServerErrorResponseException500Result()
    {
        $deferred = new Deferred();
        $deferred->reject(new ServerErrorResponseException('foo', 500));
        $future = new FutureArray($deferred->promise());

        $this->connection->method('performRequest')
            ->willReturn($future);
        
        $this->connectionPool->method('nextConnection')
            ->willReturn($this->connection);

        $this->connectionPool->expects($this->once())
            ->method('scheduleCheck');

        $transport = new Transport(1, $this->connectionPool, $this->logger);

        $result = $transport->performRequest('GET', '/');
        $this->assertInstanceOf(FutureArrayInterface::class, $result);
    }
}
