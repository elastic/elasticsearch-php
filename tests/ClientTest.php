<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Tests;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\NamespaceException;
use Elastic\Elasticsearch\Exception\ProductCheckException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\TransportBuilder;
use Http\Mock\Client as MockClient;
use Http\Promise\Promise;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ClientTest extends TestCase
{
    public function setUp(): void
    {
        $this->logger = $this->createStub(LoggerInterface::class);
        $this->httpClient = new MockClient();
        //$this->httpAsyncClient = $this->createStub(HttpAsyncClient::class);

        $this->transport = TransportBuilder::create()
            ->setClient($this->httpClient)
            ->build();
        //$this->transport->setAsyncClient($this->httpAsyncClient);

        $this->psr17Factory = new Psr17Factory();
        $this->client = new Client($this->transport, $this->logger);
    }

    public function testGetTransport()
    {
        $this->assertEquals($this->transport, $this->client->getTransport());
    }

    public function testGetLogger()
    {
        $this->assertEquals($this->logger, $this->client->getLogger());
    }

    public function testDefaultAsyncIsFalse()
    {
        $this->assertFalse($this->client->getAsync());
    }

    public function testSetAsync()
    {
        $async = $this->client->getAsync();
        $this->client->setAsync(!$async);
        $this->assertEquals(!$async, $this->client->getAsync());
    }

    public function testSetElasticMetaHeader()
    {
        $this->client->setElasticMetaHeader(false);
        $this->assertFalse($this->client->getElasticMetaHeader());
    }

    public function testSetResponseException()
    {
        $this->client->setResponseException(false);
        $this->assertFalse($this->client->getResponseException());
    }

    public function testSendRequest()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(200)->withHeader('X-Elastic-Product', 'Elasticsearch');
        $this->httpClient->addResponse($response);

        $result = $this->client->sendRequest($request);
        $this->assertInstanceOf(Elasticsearch::class, $result);
    }

    public function testSendRequestToNotElasticsearchThrowsException()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->addResponse($response);

        $this->expectException(ProductCheckException::class);
        $result = $this->client->sendRequest($request);
    }

    public function testSendRequestWith400ResponseThrowsException()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(400);
        $this->httpClient->addResponse($response);

        $this->expectException(ClientResponseException::class);
        $result = $this->client->sendRequest($request);
    }

    public function testSendRequestWith400ThrowsExceptionWithResponse()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(400);
        $this->httpClient->addResponse($response);

        try {
            $result = $this->client->sendRequest($request);
        } catch (ClientResponseException $e) {
            $this->assertEquals($response, $e->getResponse());
        }
    }

    public function testSendRequestWith400DoesNotThrowsExceptionWithSetResponseExceptionToFalse()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(400);
        $this->httpClient->addResponse($response);

        $this->client->setResponseException(false);
        $result = $this->client->sendRequest($request);
        $this->assertEquals(400, $result->getStatusCode());
    }

    public function testSendRequestWith500ResponseThrowsException()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(500);
        $this->httpClient->addResponse($response);

        $this->expectException(ServerResponseException::class);
        $result = $this->client->sendRequest($request);
    }

    public function testSendRequestWith500ThrowsExceptionWithResponse()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(500);
        $this->httpClient->addResponse($response);

        try {
            $result = $this->client->sendRequest($request);
        } catch (ServerResponseException $e) {
            $this->assertEquals($response, $e->getResponse());
        }
    }

    public function testSendRequestWith500DoesNotThrowsExceptionWithSetResponseExceptionToFalse()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(500);
        $this->httpClient->addResponse($response);

        $this->client->setResponseException(false);
        $result = $this->client->sendRequest($request);
        $this->assertEquals(500, $result->getStatusCode());
    }

    public function testSendRequestWithAsync()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(200)->withHeader('X-Elastic-Product', 'Elasticsearch');
        $this->httpClient->addResponse($response);

        $this->client->setAsync(true);
        $result = $this->client->sendRequest($request);
        $this->assertInstanceOf(Promise::class, $result);
    }

    public function testSendRequestWithAsyncWillReturnElasticsearch()
    {
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $response = $this->psr17Factory->createResponse(200)->withHeader('X-Elastic-Product', 'Elasticsearch');
        $this->httpClient->addResponse($response);

        $this->client->setAsync(true);
        $result = $this->client->sendRequest($request);
        $this->assertInstanceOf(Promise::class, $result);
        $this->assertInstanceOf(Elasticsearch::class, $result->wait());
    }
}