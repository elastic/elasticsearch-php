<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\ConnectionPool;

use Elasticsearch\ClientBuilder;
use Elasticsearch\ConnectionPool\SniffingConnectionPool;

/**
 * Class SniffingConnectionPoolIntegrationTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/SniffingConnectionPoolTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class SniffingConnectionPoolIntegrationTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        static::markTestSkipped("All of Sniffing unit tests use outdated cluster state format, need to redo");
    }

    public function testSniff()
    {
        $client = ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
            ->setConnectionPool(SniffingConnectionPool::class, ['sniffingInterval' => -10])
            ->build();

        $pinged = $client->ping();
        $this->assertTrue($pinged);
    }
}
