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

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Tests\ClientBuilder\ArrayLogger;
use Psr\Log\LogLevel;

/**
 * Class ClientTest
 *
 * @subpackage Tests
 * @group Integration
 */
class ClientIntegrationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * ArrayLogger
     */
    private $logger;

    /**
     * @var string
     */
    private $host;

    protected function setUp()
    {
        $this->host = Utility::getHost();
        if (null == $this->host) {
            $this->markTestSkipped('I cannot execute integration test without TEST_SUITE env');
        }
        $this->logger = new ArrayLogger();
    }

    private function getClient(): Client
    {
        $client = ClientBuilder::create()
            ->setHosts([$this->host])
            ->setLogger($this->logger);
        
        if (getenv('TEST_SUITE') === 'xpack') {
            $client->setSSLVerification(__DIR__ . '/../../../.ci/certs/ca.crt');
        }    
        return $client->build();
    }

    public function testLogRequestSuccessHasInfoNotEmpty()
    {
        $client = $this->getClient();

        $result = $client->info();

        $this->assertNotEmpty($this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestSuccessHasPortInInfo()
    {
        $client = $this->getClient();

        $result = $client->info();

        $this->assertContains('"port"', $this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestFailHasWarning()
    {
        $client = $this->getClient();

        try {
            $result = $client->get([
                'index' => 'foo',
                'id' => 'bar'
            ]);
        } catch (Missing404Exception $e) {
            $this->assertNotEmpty($this->getLevelOutput(LogLevel::WARNING, $this->logger->output));
        }
    }

    public function testIndexCannotBeEmptyStringForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => '',
            'id' => 'test'
            ]
        );
    }

    public function testIdCannotBeEmptyStringForDelete()
    {
        $client = $this->getClient();

        $this->expectException(BadRequest400Exception::class);

        $client->delete(
            [
            'index' => 'test',
            'id' => ''
            ]
        );
    }

    public function testIndexCannotBeArrayOfEmptyStringsForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => ['', '', ''],
            'id' => 'test'
            ]
        );
    }

    public function testIndexCannotBeArrayOfNullsForDelete()
    {
        $client = $this->getClient();

        $this->expectException(Missing404Exception::class);

        $client->delete(
            [
            'index' => [null, null, null],
            'id' => 'test'
            ]
        );
    }

    private function getLevelOutput(string $level, array $output): string
    {
        foreach ($output as $out) {
            if (false !== strpos($out, $level)) {
                return $out;
            }
        }
        return '';
    }
}
