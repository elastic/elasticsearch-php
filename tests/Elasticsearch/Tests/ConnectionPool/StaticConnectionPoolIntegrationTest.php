<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\ConnectionPool;

use Elasticsearch;

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
    public function setUp()
    {
        if (empty(getenv('ES_TEST_HOST'))) {
            $this->markTestSkipped(
                'Elasticsearch is not configured. Check the ES_TEST_HOST env in your phpunit.xml file.'
            );
        }
    }

    // Issue #636
    public function test404Liveness()
    {
        $client = \Elasticsearch\ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
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
