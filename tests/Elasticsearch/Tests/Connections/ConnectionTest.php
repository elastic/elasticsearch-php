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
use Elasticsearch\Serializers\SmartSerializer;
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
        $this->assertStringContainsString('elasticsearch-php/'. Client::VERSION, $headers['User-Agent'][0]);
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
        $this->assertStringContainsString('elasticsearch-php/'. Client::VERSION, $request['headers']['User-Agent'][0]);
    }

    /**
     * @depends testGetHeadersContainUserAgent
     *
     * @covers \Connection::performRequest
     * @covers \Connection::getURI
     */
    public function testParametersAreSent()
    {
        $connectionParams = [];
        $host = [
            'host' => 'localhost'
        ];
        $requestParams = [
            'foo' => true,
            'baz' => false,
            'bar' => 'baz'
        ];

        $connection = new Connection(
            ClientBuilder::defaultHandler(),
            $host,
            $connectionParams,
            $this->serializer,
            $this->logger,
            $this->trace
        );
        $result  = $connection->performRequest('GET', '/', $requestParams);
        $request = $connection->getLastRequestInfo()['request'];

        $this->assertEquals('/?foo=true&baz=false&bar=baz', $request['uri']);
    }

    public function testHeaderClientParamIsResetAfterSent()
    {
        $host = [
            'host' => 'localhost'
        ];

        $connection = new Connection(
            ClientBuilder::defaultHandler(),
            $host,
            [],
            new SmartSerializer(),
            $this->logger,
            $this->trace
        );

        $options = [
            'client' => [
                'headers' => [
                    'Foo' => [ 'Bar' ]
                ]
            ]
        ];

        $headersBefore = $connection->getHeaders();
        $result = $connection->performRequest('GET', '/', null, null, $options);
        $headersAfter = $connection->getHeaders();
        $this->assertEquals($headersBefore, $headersAfter);
    }

    /**
     * Test if the x-elastic-client-meta header is sent if $params['client']['x-elastic-client-meta'] is true  
     */
    public function testElasticMetaClientHeaderIsSentWhenParameterIsTrue()
    {
        $params = [
            'client' => [
                'x-elastic-client-meta'=> true
            ]
        ];
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
        $result  = $connection->performRequest('GET', '/');
        $request = $connection->getLastRequestInfo()['request'];

        $this->assertArrayHasKey('x-elastic-client-meta', $request['headers']);
        $this->assertEquals(
            1,
            preg_match(
                '/^[a-z]{1,}=[a-z0-9\.\-]{1,}(?:,[a-z]{1,}=[a-z0-9\.\-]+)*$/', 
                $request['headers']['x-elastic-client-meta'][0]
            )
        );
    }

    /**
     * Test if the x-elastic-client-meta header is sent if $params['client']['x-elastic-client-meta'] is true  
     */
    public function testElasticMetaClientHeaderIsNotSentWhenParameterIsFalse()
    {
        $params = [
            'client' => [
                'x-elastic-client-meta'=> false
            ]
        ];
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
        $result  = $connection->performRequest('GET', '/');
        $request = $connection->getLastRequestInfo()['request'];

        $this->assertArrayNotHasKey('x-elastic-client-meta', $request['headers']);
    }
}
