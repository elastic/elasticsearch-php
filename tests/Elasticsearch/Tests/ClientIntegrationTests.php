<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Tests\ClientBuilder\DummyLogger;
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
class ClientIntegrationTests extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        if (empty(getenv('ES_TEST_HOST'))) {
            $this->markTestSkipped('I cannot execute integration test without ES_TEST_HOST env');
        }
    }

    public function testLogRequestSuccessHasInfoNotEmpty()
    {
        $logger = new DummyLogger();
        $client = ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
            ->setLogger($logger)
            ->build();

        $result = $client->info();

        $this->assertNotEmpty($this->getLevelOutput(LogLevel::INFO, $logger->output));
    }

    public function testLogRequestSuccessHasPortInInfo()
    {
        $logger = new DummyLogger();
        $client = ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
            ->setLogger($logger)
            ->build();

        $result = $client->info();

        $this->assertContains('"port"', $this->getLevelOutput(LogLevel::INFO, $logger->output));
    }

    public function testLogRequestFailHasWarning()
    {
        $logger = new DummyLogger();
        $client = ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
            ->setLogger($logger)
            ->build();

        try {
            $result = $client->get([
                'index' => 'foo',
                'id' => 'bar'
            ]);
        } catch (Missing404Exception $e) {
            $this->assertNotEmpty($this->getLevelOutput(LogLevel::WARNING, $logger->output));
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
