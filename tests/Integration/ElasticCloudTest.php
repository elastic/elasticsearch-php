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

namespace Elastic\Elasticsearch\Tests\Integration;

use Elastic\Elasticsearch\ClientBuilder;
use Http\Promise\Promise;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpClient\HttplugClient;

/**
 * @group cloud
 */
class ElasticCloudTest extends TestCase
{
    const CLOUD_ID = 'ELASTIC_CLOUD_ID';
    const API_KEY  = 'ELASTIC_API_KEY';

    protected ClientBuilder $clientBuilder;

    public function setUp(): void
    {
        if (!getenv(self::CLOUD_ID) && !getenv(self::API_KEY)) {
            $this->markTestSkipped(sprintf(
                "I cannot execute the Elastic Cloud test without the env variables %s and %s",
                self::CLOUD_ID,
                self::API_KEY
            ));
        }
        $this->clientBuilder = ClientBuilder::create()
            ->setElasticCloudId(getenv(self::CLOUD_ID))
            ->setApiKey(getenv(self::API_KEY));
    }

    public function testInfoWithAsyncSymfonyHttplugClient()
    {
        $symfonyClient = new HttplugClient();
        
        $client = $this->clientBuilder->setAsyncHttpClient($symfonyClient)
            ->build();

        $client->setAsync(true);

        $promise = $client->info();
        $this->assertInstanceOf(Promise::class, $promise);
        $response = $promise->wait();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response['name']);
        $this->assertNotEmpty($response['version']['number']);
    }

    public function testInfoWithSymfonyHttpPsr18Client()
    {
        $symfonyClient = new Psr18Client();
        
        $client = $this->clientBuilder->setHttpClient($symfonyClient)
            ->build();

        $response = $client->info();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response['name']);
        $this->assertNotEmpty($response['version']['number']);
    }
}