<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\ConnectionPool;

use Elasticsearch;
use Elasticsearch\Tests\Utility;

/**
 * Class StaticConnectionPoolIntegrationTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/StaticConnectionPoolTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class StaticConnectionPoolIntegrationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    private $host;

    public function setUp()
    {
        $this->host = Utility::getHost();
        if (null == $this->host) {
            $this->markTestSkipped(sprintf(
                "I cannot execute %s without TEST_SUITE env",
                __CLASS__
            ));
        }
    }

    // Issue #636
    public function test404Liveness()
    {
        $client = \Elasticsearch\ClientBuilder::create()
            ->setHosts([$this->host])
            ->setConnectionPool(\Elasticsearch\ConnectionPool\StaticConnectionPool::class)
            ->build();

        $connection = $client->transport->getConnection();

        // Ensure connection is dead
        $connection->markDead();

        // The index doesn't exist, but the server is up so this will return a 404
        $this->assertFalse($client->indices()->exists(['index' => 'not_existing_index']));

        // But the node should be marked as alive since the server responded
        $this->assertTrue($connection->isAlive());
    }
}
