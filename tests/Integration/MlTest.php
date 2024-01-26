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

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Tests\Utility;
use PHPUnit\Framework\TestCase;

/**
 * @group integration
 */
class MlTest extends TestCase
{
    const JOB_ID = 'total-requests';

    protected Client $client;
    
    public function setUp(): void
    {
        $this->client = Utility::getClient();
        if (getenv('TEST_SUITE') !== 'platinum') {
            $this->markTestSkipped('I cannot execute the ML tests without a platinum TEST_SUITE');
        }
    }

    public function testPutJob(): string
    {
        $response = $this->client->ml()->putJob([
            'job_id' => self::JOB_ID,
            'body' => [
                "description" => "Total sum of requests",
                "analysis_config" => [
                    "bucket_span" => "10m",
                    "detectors" => [
                        [
                            "detector_description" => "Sum of total",
                            "function" => "sum",
                            "field_name"=> "total"
                        ]
                    ]
                ],
                "data_description" => [
                    "time_field" => "timestamp",
                    "time_format" => "epoch_ms"
                ]
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(self::JOB_ID, $response['job_id']);

        return $response['job_id'];
    }

    /**
     * @depends testPutJob
     */
    public function testOpenJob(string $jobId): string
    {
        $response = $this->client->ml()->openJob([
            'job_id' => $jobId
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response['opened']);

        return $jobId;
    }

    /**
     * @depends testOpenJob
     */
    public function testPostDataWithASingleJson(string $jobId)
    {
        $response = $this->client->ml()->postData([
            'job_id' => $jobId,
            'body' => [ "foo" => "bar" ]
        ]);

        $this->assertEquals(202, $response->getStatusCode());
        $request = $this->client->getTransport()->getLastRequest();
        $this->assertEquals([sprintf(Client::API_COMPATIBILITY_HEADER, 'application', 'json')], $request->getHeader('Content-Type'));
    }

    /**
     * @depends testOpenJob
     */
    public function testPostDataWithMultipleJson(string $jobId)
    {
        $response = $this->client->ml()->postData([
            'job_id' => $jobId,
            'body' => [
                [ "foo" => "bar" ],
                [ "baz" => "boo" ],
                [ "bam" => "bao" ]
            ]
        ]);

        $this->assertEquals(202, $response->getStatusCode());
        $request = $this->client->getTransport()->getLastRequest();
        $this->assertEquals([sprintf(Client::API_COMPATIBILITY_HEADER, 'application', 'x-ndjson')], $request->getHeader('Content-Type'));
    }

    /**
     * @depends testOpenJob
     */
    public function testCloseJob(string $jobId)
    {
        $response = $this->client->ml()->closeJob([
            'job_id' => $jobId
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response['closed']);
    }

    /**
     * @depends testPutJob
     */
    public function testDeleteJob(string $jobId)
    {
        $response = $this->client->ml()->deleteJob([
            'job_id' => $jobId
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response['acknowledged']);
    }
}