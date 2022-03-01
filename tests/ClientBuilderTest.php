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
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\AuthenticationException;
use Elastic\Elasticsearch\Exception\ConfigException;
use Elastic\Elasticsearch\Exception\InvalidArgumentException;
use Http\Client\HttpAsyncClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

class ClientBuilderTest extends TestCase
{
    protected ClientInterface $httpClient;
    protected LoggerInterface $logger;

    public function setUp(): void
    {
        $this->httpClient = $this->createStub(ClientInterface::class);
        $this->asyncHttpClient = $this->createStub(HttpAsyncClient::class);
        $this->logger = $this->createStub(LoggerInterface::class);
        $this->psr17Factory = new Psr17Factory();
        $this->builder = ClientBuilder::create();
    }

    public function testCreate()
    {
        $this->assertInstanceOf(ClientBuilder::class, $this->builder);
    }

    public function getConfig()
    {
        return [
            [[
                'hosts' => ['localhost:9200']
            ]],
            [[
                'hosts'  => ['cloud:9200'],
                'apiKey' => ['id-value', 'apikey-value']
            ]],
            [[
                'hosts'  => ['cloud:9200'],
                'basicAuthentication' => ['username-value', 'password-value']
            ]]
        ];
    }

    /**
     * @dataProvider getConfig
     * @see https://github.com/elastic/elasticsearch-php/issues/1074
     */
    public function testFromConfigWithQuietFalse(array $params)
    {
        $client = ClientBuilder::fromConfig($params);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testFromConfigWithInvalidDataQuietFalseThrowsException()
    {
        $config = [
            'httpClient' => $this->httpClient,
            'logger' => $this->logger,
            'foo' => 'bar'
        ];
        $this->expectException(ConfigException::class);
        $client = ClientBuilder::fromConfig($config);
    }

    public function testFromConfigWithInvalidDataQuietTrue()
    {
        $config = [
            'httpClient' => $this->httpClient,
            'logger' => $this->logger,
            'foo' => 'bar'
        ];
        $client = ClientBuilder::fromConfig($config, true);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testBuild()
    {
        $this->assertInstanceOf(Client::class, $this->builder->build());
    }

    public function testSetHttpClient()
    {
        $result = $this->builder->setHttpClient($this->httpClient);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetAsyncHttpClient()
    {
        $result = $this->builder->setAsyncHttpClient($this->asyncHttpClient);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetLogger()
    {
        $result = $this->builder->setLogger($this->logger);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetHosts()
    {
        $result = $this->builder->setHosts(['localhost:9200']);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithEmptyId()
    {
        $result = $this->builder->setApiKey('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithId()
    {
        $result = $this->builder->setApiKey('xxx', 'yyy');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetApiKeyWithEmptyIdSetAuthorizationHeader()
    {
        $this->builder->setApiKey('xxx');

        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $transport->sendRequest($request);

        $this->assertContains('ApiKey xxx', $transport->getLastRequest()->getHeader('Authorization'));
    }

    public function testSetApiKeyWithIdSetAuthorizationHeaderWithBase64()
    {
        $this->builder->setApiKey('xxx', 'yyy');

        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $transport->sendRequest($request);

        $auth = base64_encode('yyy:xxx');
        $this->assertContains("ApiKey $auth", $transport->getLastRequest()->getHeader('Authorization'));
    }

    public function testSetBasicAuthentication()
    {
        $result = $this->builder->setBasicAuthentication('user', 'pass');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetBasicAuthenticationSetAuthorizationHeader()
    {
        $this->builder->setBasicAuthentication('user', 'pass');

        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', 'localhost:9200');
        $transport->sendRequest($request);

        $this->assertEquals("user:pass", $transport->getLastRequest()->getUri()->getUserInfo());
    }

    public function testSetBasicAuthenticationAndApiKeyThrowsException()
    {
        $this->builder->setBasicAuthentication('user', 'pass');
        $this->builder->setApiKey('xxx', 'yyy');

        $this->expectException(AuthenticationException::class);
        $client = $this->builder->build();
    }

    public function testSetElasticCloudId()
    {
        $result = $this->builder->setElasticCloudId('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function getCloudIdExamples()
    {
        return [
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbTo5MjQzJGM2NjM3ZjMxMmM1MjQzY2RhN2RlZDZlOTllM2QyYzE5JA==', 'c6637f312c5243cda7ded6e99e3d2c19.westeurope.azure.elastic-cloud.com', 9243],
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbSRlN2RlOWYxMzQ1ZTQ0OTAyODNkOTAzYmU1YjZmOTE5ZSQ=', 'e7de9f1345e4490283d903be5b6f919e.westeurope.azure.elastic-cloud.com', null],
            ['cluster:d2VzdGV1cm9wZS5henVyZS5lbGFzdGljLWNsb3VkLmNvbSQ4YWY3ZWUzNTQyMGY0NThlOTAzMDI2YjQwNjQwODFmMiQyMDA2MTU1NmM1NDA0OTg2YmZmOTU3ZDg0YTZlYjUxZg==', '8af7ee35420f458e903026b4064081f2.westeurope.azure.elastic-cloud.com', null]
        ];
    }

    /**
     * @dataProvider getCloudIdExamples
     */
    public function testSetCloudIdWithExamples(string $cloudId, string $url, ?int $port)
    {
        $this->builder->setElasticCloudId($cloudId);
        
        $response = $this->psr17Factory->createResponse(200);
        $this->httpClient->method('sendRequest')
             ->willReturn($response);
        $this->builder->setHttpClient($this->httpClient);
        
        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);
        
        $transport = $client->getTransport();
        $request = $this->psr17Factory->createRequest('GET', '');
        $transport->sendRequest($request);

        $this->assertEquals($url, $transport->getLastRequest()->getUri()->getHost());
        $this->assertEquals($port, $transport->getLastRequest()->getUri()->getPort());
    }

    public function testSetRetries()
    {
        $result = $this->builder->setRetries(10);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetRetriesWithNegativeThrowsException()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = $this->builder->setRetries(-10);
    }

    public function testSetRetriesSetTheTransport()
    {
        $result = $this->builder->setRetries(10);

        $client = $this->builder->build();
        $this->assertInstanceOf(Client::class, $client);

        $this->assertEquals(10, $client->getTransport()->getRetries());
    }

    public function testSetSSLCert()
    {
        $result = $this->builder->setSSLCert('/tmp/cert.pem');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSSLCertWithPassword()
    {
        $result = $this->builder->setSSLCert('/tmp/cert.pem', 'xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSSLKey()
    {
        $result = $this->builder->setSSLKey('xxx');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSSLKeyWithPassword()
    {
        $result = $this->builder->setSSLKey('xxx', 'yyy');
        $this->assertEquals($this->builder, $result);
    }

    public function testSetSSLVerification()
    {
        $result = $this->builder->setSSLVerification(false);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetElasticMetaHeader()
    {
        $result = $this->builder->setElasticMetaHeader(false);
        $this->assertEquals($this->builder, $result);
    }

    public function testSetElasticMetaHeaderSetTheClient()
    {
        $client = $this->builder
            ->setElasticMetaHeader(false)
            ->build();
        
        $this->assertFalse($client->getElasticMetaHeader());
    }

    public function testSetHttpClientOptions()
    {
        $result = $this->builder->setHttpClientOptions([]);
        $this->assertEquals($this->builder, $result);
    }
}