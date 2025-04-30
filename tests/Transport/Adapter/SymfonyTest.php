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

use Elastic\Elasticsearch\Transport\Adapter\Symfony;
use Elastic\Elasticsearch\Transport\RequestOptions;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpClient\HttplugClient;
use Symfony\Component\HttpClient\Psr18Client;

/**
 * @requires PHP 8.1.0
 */
class SymfonyTest extends TestCase
{
    protected Symfony $symfonyAdapter;
    protected ClientInterface $client;
    
    public function setUp(): void
    {
        $this->symfonyAdapter = new Symfony;
        $this->client = $this->createStub(ClientInterface::class);
    }

    /** Httplug tests */

    public function testHttplugSetConfigWithSslCert()
    {
        $result = $this->symfonyAdapter->setConfig(new HttplugClient(), [ RequestOptions::SSL_CERT => 'test'], []);
        $this->assertInstanceOf(HttplugClient::class, $result);
    }

    public function testHttplugSetConfigWithSslKey()
    {
        $result = $this->symfonyAdapter->setConfig(new HttplugClient(), [ RequestOptions::SSL_KEY => 'test'], []);
        $this->assertInstanceOf(HttplugClient::class, $result);
    }

    public function testHttplugSetConfigWithSslVerify()
    {
        $result = $this->symfonyAdapter->setConfig(new HttplugClient(), [ RequestOptions::SSL_VERIFY => false], []);
        $this->assertInstanceOf(HttplugClient::class, $result);
    }

    public function testHttplugSetConfigWithSslCa()
    {
        $result = $this->symfonyAdapter->setConfig(new HttplugClient(), [ RequestOptions::SSL_CA => 'test'], []);
        $this->assertInstanceOf(HttplugClient::class, $result);
    }

    /** Psr18Client tests */

    public function testPsr18ClientSetConfigWithSslCert()
    {
        $result = $this->symfonyAdapter->setConfig(new Psr18Client(), [ RequestOptions::SSL_CERT => 'test'], []);
        $this->assertInstanceOf(Psr18Client::class, $result);
    }

    public function testPsr18ClientSetConfigWithSslKey()
    {
        $result = $this->symfonyAdapter->setConfig(new Psr18Client(), [ RequestOptions::SSL_KEY => 'test'], []);
        $this->assertInstanceOf(Psr18Client::class, $result);
    }

    public function testPsr18ClientSetConfigWithSslVerify()
    {
        $result = $this->symfonyAdapter->setConfig(new Psr18Client(), [ RequestOptions::SSL_VERIFY => false], []);
        $this->assertInstanceOf(Psr18Client::class, $result);
    }

    public function testPsr18ClientSetConfigWithSslCa()
    {
        $result = $this->symfonyAdapter->setConfig(new Psr18Client(), [ RequestOptions::SSL_CA => 'test'], []);
        $this->assertInstanceOf(Psr18Client::class, $result);
    }
}