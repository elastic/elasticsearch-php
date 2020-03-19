<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\ElasticsearchException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Tests\ClientBuilder\ArrayLogger;
use Psr\Log\LogLevel;

/**
 * Class ClientTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
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

    public function setUp()
    {
        $this->host = Utility::getHost();
        if (null == $this->host) {
            $this->markTestSkipped('I cannot execute integration test without TEST_SUITE env');
        }
        $this->logger = new ArrayLogger();
    }

    public function testLogRequestSuccessHasInfoNotEmpty()
    {
        $client = ClientBuilder::create()
            ->setHosts([$this->host])
            ->setLogger($this->logger)
            ->build();

        $result = $client->info();

        $this->assertNotEmpty($this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestSuccessHasPortInInfo()
    {
        $client = ClientBuilder::create()
            ->setHosts([$this->host])
            ->setLogger($this->logger)
            ->build();

        $result = $client->info();

        $this->assertContains('"port"', $this->getLevelOutput(LogLevel::INFO, $this->logger->output));
    }

    public function testLogRequestFailHasWarning()
    {
        $client = ClientBuilder::create()
            ->setHosts([$this->host])
            ->setLogger($this->logger)
            ->build();

        try {
            $result = $client->get([
                'index' => 'foo',
                'id' => 'bar'
            ]);
        } catch (Missing404Exception $e) {
            $this->assertNotEmpty($this->getLevelOutput(LogLevel::WARNING, $this->logger->output));
        }
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
