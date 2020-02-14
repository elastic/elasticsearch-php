<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Tests\ClientBuilder\DummyLogger;
use GuzzleHttp\Ring\Client\MockHandler;
use PHPUnit\Framework\TestCase;

class ClientBuilderTest extends TestCase
{
    /**
     * @expectedException TypeError
     */
    public function testClientBuilderThrowsExceptionForIncorrectLoggerClass()
    {
        ClientBuilder::create()->setLogger(new DummyLogger);
    }

    /**
     * @expectedException TypeError
     */
    public function testClientBuilderThrowsExceptionForIncorrectTracerClass()
    {
        ClientBuilder::create()->setTracer(new DummyLogger);
    }

    public function testGzipEnabledWhenElasticCloudId()
    {
        $client = ClientBuilder::create()
            ->setElasticCloudId('foo:' . base64_encode('localhost:9200$foo'))
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        
        try {
            $result = $client->info();
        } catch (ElasticsearchException $e) {
            $request = $client->transport->getLastConnection()->getLastRequestInfo();
            $this->assertContains('gzip', $request['request']['client']['curl']);
        }
    }

    public function testElasticCloudIdNotOverrideCurlEncoding()
    {
        $params = [
            'client' => [
                'curl' => [
                    CURLOPT_ENCODING => 'deflate'
                ]
            ]
        ];
        $client = ClientBuilder::create()
            ->setConnectionParams($params)
            ->setElasticCloudId('foo:' . base64_encode('localhost:9200$foo'))
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        
        try {
            $result = $client->info();
        } catch (ElasticsearchException $e) {
            $request = $client->transport->getLastConnection()->getLastRequestInfo();
            $this->assertContains('deflate', $request['request']['client']['curl']);
            $this->assertNotContains('gzip', $request['request']['client']['curl']);
        }
    }

    /**
     * @see https://github.com/elastic/elasticsearch-php/issues/993
     */
    public function testIncludePortInHostHeader()
    {
        $host = "localhost";
        $url = "$host:1234";
        $params = [
            'client' => [
                'verbose' => true
            ]
        ];
        $client = ClientBuilder::create()
            ->setConnectionParams($params)
            ->setHosts([$url])
            ->includePortInHostHeader(true)
            ->build();

        $this->assertInstanceOf(Client::class, $client);

        try {
            $result = $client->info();
        } catch (ElasticsearchException $e) {
            $request = $client->transport->getLastConnection()->getLastRequestInfo();
            $this->assertTrue(isset($request['request']['headers']['Host'][0]));
            $this->assertEquals($url, $request['request']['headers']['Host'][0]);
        }
    }

    /**
     * @see https://github.com/elastic/elasticsearch-php/issues/993
     */
    public function testNotIncludePortInHostHeaderAsDefault()
    {
        $host = "localhost";
        $url  = "$host:1234";
        $params = [
            'client' => [
                'verbose' => true
            ]
        ];
        $client = ClientBuilder::create()
            ->setConnectionParams($params)
            ->setHosts([$url])
            ->build();

        $this->assertInstanceOf(Client::class, $client);

        try {
            $result = $client->info();
        } catch (ElasticsearchException $e) {
            $request = $client->transport->getLastConnection()->getLastRequestInfo();
            $this->assertTrue(isset($request['request']['headers']['Host'][0]));
            $this->assertEquals($host, $request['request']['headers']['Host'][0]);
        }
    }

    /**
     * @see https://github.com/elastic/elasticsearch-php/issues/993
     */
    public function testNotIncludePortInHostHeader()
    {
        $host = "localhost";
        $url  = "$host:1234";
        $params = [
            'client' => [
                'verbose' => true
            ]
        ];
        $client = ClientBuilder::create()
            ->setConnectionParams($params)
            ->setHosts([$url])
            ->includePortInHostHeader(false)
            ->build();

        $this->assertInstanceOf(Client::class, $client);

        try {
            $result = $client->info();
        } catch (ElasticsearchException $e) {
            $request = $client->transport->getLastConnection()->getLastRequestInfo();
            $this->assertTrue(isset($request['request']['headers']['Host'][0]));
            $this->assertEquals($host, $request['request']['headers']['Host'][0]);
        }
    }
}
