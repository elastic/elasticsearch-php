<?php
/**
 * User: zach
 * Date: 9/20/13
 * Time: 12:51 PM
 */

use Elasticsearch\ConnectionPool\SniffingConnectionPool;
use Mockery as m;

/**
 * Class SniffingConnectionPoolTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/SniffingConnectionPoolTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class SniffingConnectionPoolTest extends \PHPUnit_Framework_TestCase
{

    public function testAddOneHostThenGetConnection()
    {
        $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                          ->shouldReceive('ping')
                          ->andReturn(true)
                          ->getMock()
                          ->shouldReceive('isAlive')
                          ->andReturn(true)
                          ->getMock();

        $connections = array($mockConnection);

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
                    ->shouldReceive('select')
                    ->andReturn($connections[0])
                    ->getMock();

        $connectionFactory = m::mock('\Elasticsearch\Connections\ConnectionFactory');

        $randomizeHosts = false;
        $connectionPool = new SniffingConnectionPool($connections, $selector, $connectionFactory, $randomizeHosts);

        $retConnection = $connectionPool->nextConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }

}