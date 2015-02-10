<?php
use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\NoNodesAvailableException;
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
class SniffingConnectionPoolIntegrationTest extends \PHPUnit_Framework_TestCase
{
    public function testSniff() {

        $client = Client::newBuilder()
            ->setHosts([$_SERVER['ES_TEST_HOST']])
            ->setConnectionPool('\Elasticsearch\ConnectionPool\SniffingConnectionPool', ['sniffingInterval' => -10])
            ->build();

        $client->ping();

    }
}