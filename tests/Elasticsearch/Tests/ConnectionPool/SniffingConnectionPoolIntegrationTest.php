<?php
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
        $params['connectionPoolClass'] = '\Elasticsearch\ConnectionPool\SniffingConnectionPool';
        $params['connectionPoolParams']['sniffingInterval'] = -10;
        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);

        $client = new \Elasticsearch\Client($params);

        $client->ping();

    }
}