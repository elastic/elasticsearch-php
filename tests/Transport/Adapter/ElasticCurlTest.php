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

namespace Elastic\Elasticsearch\Tests\Transport\Adapter;

use Elastic\Elasticsearch\Transport\Adapter\AdapterInterface;
use Elastic\Elasticsearch\Transport\Adapter\ElasticCurl;
use Elastic\Elasticsearch\Transport\RequestOptions;
use Elastic\Transport\Client\Curl;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

class ElasticCurlTest extends TestCase
{
    protected AdapterInterface $curlAdapter;
    protected ClientInterface $client;

    public function setUp(): void
    {
        $this->curlAdapter = new ElasticCurl;
        $this->client = $this->createStub(ClientInterface::class);
    }

    public function testSetConfigWithEmptyArray()
    {
        $result = $this->curlAdapter->setConfig($this->client, [], []);
        $this->assertInstanceOf(ClientInterface::class, $result);
    }

    public function testSetConfigWithSslCert()
    {
        $client = $this->curlAdapter->setConfig(new Curl(), [ RequestOptions::SSL_CERT => 'test'], []);
        $this->assertInstanceOf(Curl::class, $client);
    }

    public function testSetConfigWithSslKey()
    {
        $client = $this->curlAdapter->setConfig(new Curl(), [ RequestOptions::SSL_KEY => 'test'], []);
        $this->assertInstanceOf(Curl::class, $client);
    }

    public function testSetConfigWithSslVerify()
    {
        $client = $this->curlAdapter->setConfig(new Curl(), [ RequestOptions::SSL_VERIFY => false], []);
        $this->assertInstanceOf(Curl::class, $client);
    }

    public function testSetConfigWithSslCa()
    {
        $client = $this->curlAdapter->setConfig(new Curl(), [ RequestOptions::SSL_CA => 'test'], []);
        $this->assertInstanceOf(Curl::class, $client);
    }
}