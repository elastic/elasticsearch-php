<?php

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
class StaticConnectionPoolIntegrationTest extends \PHPUnit_Framework_TestCase
{
    // Issue #636
    public function test404Liveness() {
        $client = \Elasticsearch\ClientBuilder::create()
            ->setHosts([$_SERVER['ES_TEST_HOST']])
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