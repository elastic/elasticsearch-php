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

namespace Elasticsearch\Tests\Connections;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Connections\Connection;
use Elasticsearch\Serializers\SerializerInterface;
use Psr\Log\LoggerInterface;

class ConnectionTest extends \PHPUnit\Framework\TestCase
{
    private $logger;
    private $trace;
    private $serializer;

    protected function setUp(): void
    {
        $this->logger = $this->createMock(LoggerInterface::class);
        $this->trace = $this->createMock(LoggerInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
    }

    public function testConstructor()
    {
        $params = [];
        $host = [
            'host' => 'localhost'
        ];
        $connection = new Connection(
            function () {
            },
            $host,
            $params,
            $this->serializer,
            $this->logger,
            $this->trace
        );
        $this->assertInstanceOf(Connection::class, $connection);
    }

    public function testGetHeadersContainUserAgent()
    {
        $params = [];
        $host = [
            'host' => 'localhost'
        ];
        $connection = new Connection(
            function () {
            },
            $host,
            $params,
            $this->serializer,
            $this->logger,
            $this->trace
        );
        $headers =  $connection->getHeaders();
        $this->assertArrayHasKey('User-Agent', $headers);
        $this->assertContains('elasticsearch-php/'. Client::VERSION, $headers['User-Agent'][0]);
    }

    public function testUserAgentHeaderIsSent()
    {
        $params = [];
        $host = [
            'host' => 'localhost'
        ];
        $connection = new Connection(
            ClientBuilder::defaultHandler(),
            $host,
            $params,
            $this->serializer,
            $this->logger,
            $this->trace
        );
        $result = $connection->performRequest('GET', '/');
        $request = $connection->getLastRequestInfo()['request'];
        $this->assertArrayHasKey('User-Agent', $request['headers']);
        $this->assertContains('elasticsearch-php/'. Client::VERSION, $request['headers']['User-Agent'][0]);
    }
}
