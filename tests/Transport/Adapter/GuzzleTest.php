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

use Elastic\Elasticsearch\Transport\Adapter\Guzzle;
use Elastic\Elasticsearch\Transport\RequestOptions;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions As GuzzleOptions;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

class GuzzleTest extends TestCase
{
    protected Guzzle $guzzleAdapter;

    public function setUp(): void
    {
        $this->guzzleAdapter = new Guzzle;
        $this->client = $this->createStub(ClientInterface::class);
    }

    public function testSetConfigWithEmptyArray()
    {
        $result = $this->guzzleAdapter->setConfig($this->client, [], []);
        $this->assertInstanceOf(ClientInterface::class, $result);
    }

    public function testSetConfigWithSslCert()
    {
        $result = $this->guzzleAdapter->setConfig(new Client(), [ RequestOptions::SSL_CERT => 'test'], []);
        $this->assertInstanceOf(Client::class, $result);
        $this->assertEquals('test', $result->getConfig(GuzzleOptions::CERT));
    }

    public function testSetConfigWithSslKey()
    {
        $result = $this->guzzleAdapter->setConfig(new Client(), [ RequestOptions::SSL_KEY => 'test'], []);
        $this->assertInstanceOf(Client::class, $result);
        $this->assertEquals('test', $result->getConfig(GuzzleOptions::SSL_KEY));
    }

    public function testSetConfigWithSslVerify()
    {
        $result = $this->guzzleAdapter->setConfig(new Client(), [ RequestOptions::SSL_VERIFY => false], []);
        $this->assertInstanceOf(Client::class, $result);
        $this->assertEquals(false, $result->getConfig(GuzzleOptions::VERIFY));
    }

    public function testSetConfigWithSslCa()
    {
        $result = $this->guzzleAdapter->setConfig(new Client(), [ RequestOptions::SSL_CA => 'test'], []);
        $this->assertInstanceOf(Client::class, $result);
        $this->assertEquals('test', $result->getConfig(GuzzleOptions::VERIFY));
    }
}