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

    public function getHttpPorts()
    {
        return [
            [ 80, false ],  // not included since 80 is standard port for HTTP
            [ 443, false ], // not included since 442 is standard port for HTTPS
            [ 1234, true ]  // included since 1234 is not a standard port
        ];
    }

    /**
     * @dataProvider getHttpPorts
     * @see https://github.com/elastic/elasticsearch-php/issues/993
     */
    public function testIncludePortInHostHeader(int $port, bool $included)
    {
        $host = "localhost";
        $url = "localhost:$port";
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
            $this->assertEquals($included ? $url : $host, $request['request']['headers']['Host'][0]);
        }
    }

    /**
     * @see https://github.com/elastic/elasticsearch-php/issues/993
     */
    public function testNotIncludeStandardPortInHostHeaderAsDefault()
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
    public function testNotIncludeStandardPortInHostHeader()
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
