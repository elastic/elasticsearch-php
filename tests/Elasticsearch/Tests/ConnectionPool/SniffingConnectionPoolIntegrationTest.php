<?php
use Elasticsearch\ClientBuilder;

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
class SniffingConnectionPoolIntegrationTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        static::markTestSkipped("All of Sniffing unit tests use outdated cluster state format, need to redo");
    }

    public function testSniff()
    {
        $client = ClientBuilder::create()
            ->setHosts([$_SERVER['ES_TEST_HOST']])
            ->setConnectionPool('\Elasticsearch\ConnectionPool\SniffingConnectionPool', ['sniffingInterval' => -10])
            ->build();

        $pinged = $client->ping();
        $this->assertTrue($pinged);
    }
}
