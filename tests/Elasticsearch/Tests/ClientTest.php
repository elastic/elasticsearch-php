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

use Elasticsearch;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\MaxRetriesException;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Ring\Future\FutureArray;
use Mockery as m;

/**
 * Class ClientTest
 *
 * @subpackage Tests
 */
class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testConstructorIllegalPort()
    {
        $this->expectException(\Elasticsearch\Common\Exceptions\InvalidArgumentException::class);
        $this->expectExceptionMessage('Could not parse URI');

        $client = Elasticsearch\ClientBuilder::create()->setHosts(['localhost:abc'])->build();
    }

    public function testFromConfig()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'handler' => ClientBuilder::multiHandler()
        ];
        $client = ClientBuilder::fromConfig($params);

        $this->assertInstanceOf(Client::class, $client);
    }

    public function testFromConfigBadParam()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'imNotReal' => 5
        ];

        $this->expectException(\Elasticsearch\Common\Exceptions\RuntimeException::class);
        $this->expectExceptionMessage('Unknown parameters provided: imNotReal');

        $client = ClientBuilder::fromConfig($params);
    }

    public function testFromConfigBadParamQuiet()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'imNotReal' => 5
        ];
        $client = ClientBuilder::fromConfig($params, true);

        $this->assertInstanceOf(Client::class, $client);
    }

    public function testIndexCannotBeNullForDelete()
    {
        $client = ClientBuilder::create()->build();

        $this->expectException(Elasticsearch\Common\Exceptions\RuntimeException::class);
        $this->expectExceptionMessage('index is required for delete');

        $client->delete(
            [
            'index' => null,
            'type' => 'test',
            'id' => 'test'
            ]
        );
    }

    public function testIdCannotBeNullForDelete()
    {
        $client = ClientBuilder::create()->build();

        $this->expectException(Elasticsearch\Common\Exceptions\RuntimeException::class);
        $this->expectExceptionMessage('id is required for delete');

        $client->delete(
            [
            'index' => 'test',
            'id' => null
            ]
        );
    }

    public function testMaxRetriesException()
    {
        $client = Elasticsearch\ClientBuilder::create()
            ->setHosts(["localhost:1"])
            ->setRetries(0)
            ->build();

        $searchParams = [
            'index' => 'test',
            'type' => 'test',
            'body' => [
                'query' => [
                    'match_all' => []
                ]
            ]
        ];

        $client = Elasticsearch\ClientBuilder::create()
            ->setHosts(["localhost:1"])
            ->setRetries(0)
            ->build();

        try {
            $client->search($searchParams);
            $this->fail("Should have thrown CouldNotConnectToHost");
        } catch (Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost $e) {
            // All good
            $previous = $e->getPrevious();
            $this->assertInstanceOf(MaxRetriesException::class, $previous);
        } catch (\Exception $e) {
            throw $e;
        }


        $client = Elasticsearch\ClientBuilder::create()
            ->setHosts(["localhost:1"])
            ->setRetries(0)
            ->build();

        try {
            $client->search($searchParams);
            $this->fail("Should have thrown TransportException");
        } catch (Elasticsearch\Common\Exceptions\TransportException $e) {
            // All good
            $previous = $e->getPrevious();
            $this->assertInstanceOf(MaxRetriesException::class, $previous);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function testInlineHosts()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'localhost:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("localhost", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'http://localhost:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("localhost", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());

        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'http://foo.com:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());

        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'https://foo.com:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("https", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'https://user:pass@foo.com:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("https", $host->getTransportSchema());
        $this->assertSame("user:pass", $host->getUserPass());

        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            'https://user:pass@the_foo.com:9200'
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("the_foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("https", $host->getTransportSchema());
        $this->assertSame("user:pass", $host->getUserPass());
    }

    public function testExtendedHosts()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'localhost',
                'port' => 9200,
                'scheme' => 'http'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("localhost", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com',
                'port' => 9200,
                'scheme' => 'http'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com',
                'port' => 9200,
                'scheme' => 'https'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("https", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com',
                'scheme' => 'http'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com',
                'port' => 9500,
                'scheme' => 'https'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9500, $host->getPort());
        $this->assertSame("https", $host->getTransportSchema());


        try {
            $client = Elasticsearch\ClientBuilder::create()->setHosts(
                [
                [
                    'port' => 9200,
                    'scheme' => 'http'
                ]
                ]
            )->build();
            $this->fail("Expected RuntimeException from missing host, none thrown");
        } catch (Elasticsearch\Common\Exceptions\RuntimeException $e) {
            // good
        }

        // Underscore host, questionably legal
        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'the_foo.com'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("the_foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());


        // Special characters in user/pass, would break inline
        $client = Elasticsearch\ClientBuilder::create()->setHosts(
            [
            [
                'host' => 'foo.com',
                'user' => 'user',
                'pass' => 'abc#$@?%!abc'
            ]
            ]
        )->build();
        $host = $client->transport->getConnection();
        $this->assertSame("foo.com", $host->getHost());
        $this->assertSame(9200, $host->getPort());
        $this->assertSame("http", $host->getTransportSchema());
        $this->assertSame("user:abc#$@?%!abc", $host->getUserPass());
    }

    public function testClientLazy()
    {
        $handler = new MockHandler([
          'status' => 200,
          'transfer_stats' => [
             'total_time' => 100
          ],
          'body' => '{test}',
          'effective_url' => 'localhost'
        ]);
        $builder = ClientBuilder::create();
        $builder->setHosts(['somehost']);
        $builder->setHandler($handler);
        $client = $builder->build();

        $params = [
            'client' => [
                'future' => 'lazy',
            ]
        ];
        $result = $client->info($params);
        $this->assertInstanceOf(FutureArray::class, $result);
    }

    public function testExtractArgumentIterable()
    {
        $client = Elasticsearch\ClientBuilder::create()->build();
        // array iterator can be casted to array back, so make more real with IteratorIterator
        $body = new \IteratorIterator(new \ArrayIterator([1, 2, 3]));
        $params = ['body' => $body];
        $argument = $client->extractArgument($params, 'body');
        $this->assertEquals($body, $argument);
        $this->assertCount(0, $params);
        $this->assertInstanceOf(\IteratorIterator::class, $argument);
    }
}
