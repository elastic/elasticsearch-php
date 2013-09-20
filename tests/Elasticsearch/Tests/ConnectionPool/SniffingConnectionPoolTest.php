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

        $connectionPoolParams = array('randomizeHosts' => false);
        $connectionPool = new SniffingConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $retConnection = $connectionPool->nextConnection();

        $this->assertEquals($mockConnection, $retConnection);

    }

    public function testAddOneHostAndTriggerSniff()
    {
        $clusterState = json_decode('{"ok":true,"cluster_name":"elasticsearch_zach","nodes":{"Bl2ihSr7TcuUHxhu1GA_YQ":{"name":"Vesta","transport_address":"inet[/192.168.1.119:9300]","hostname":"zach-ThinkPad-W530","version":"0.90.5","http_address":"inet[/192.168.1.119:9200]"}}}', true);

        $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                          ->shouldReceive('ping')->andReturn(true)->getMock()
                          ->shouldReceive('isAlive')->andReturn(true)->getMock()
                          ->shouldReceive('getTransportSchema')->once()->andReturn('http')->getMock()
                          ->shouldReceive('sniff')->once()->andReturn($clusterState)->getMock();

        $connections = array($mockConnection);
        $mockNewConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                             ->shouldReceive('isAlive')->andReturn(true)->getMock();

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
                    ->shouldReceive('select')->once()
                    ->andReturn($mockNewConnection)
                    ->getMock();

        $connectionFactory = m::mock('\Elasticsearch\Connections\ConnectionFactory')
                    ->shouldReceive('create')->with('192.168.1.119', 9200)->andReturn($mockNewConnection)->getMock();

        $connectionPoolParams = array(
            'randomizeHosts' => false,
            'sniffingInterval'  => -1
        );
        $connectionPool = new SniffingConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $retConnection = $connectionPool->nextConnection();

        $this->assertEquals($mockNewConnection, $retConnection);
    }

    public function testAddOneHostAndForceNext()
    {
        $clusterState = json_decode('{"ok":true,"cluster_name":"elasticsearch_zach","nodes":{"Bl2ihSr7TcuUHxhu1GA_YQ":{"name":"Vesta","transport_address":"inet[/192.168.1.119:9300]","hostname":"zach-ThinkPad-W530","version":"0.90.5","http_address":"inet[/192.168.1.119:9200]"}}}', true);

        $mockConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                          ->shouldReceive('ping')->andReturn(true)->getMock()
                          ->shouldReceive('isAlive')->andReturn(true)->getMock()
                          ->shouldReceive('getTransportSchema')->once()->andReturn('http')->getMock()
                          ->shouldReceive('sniff')->once()->andReturn($clusterState)->getMock();

        $connections = array($mockConnection);
        $mockNewConnection = m::mock('\Elasticsearch\Connections\GuzzleConnection')
                             ->shouldReceive('isAlive')->andReturn(true)->getMock();

        $selector = m::mock('\Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector')
                    ->shouldReceive('select')->once()->andReturn($mockConnection)->getMock()
                    ->shouldReceive('select')->once()->andReturn($mockNewConnection)->getMock();

        $connectionFactory = m::mock('\Elasticsearch\Connections\ConnectionFactory')
                             ->shouldReceive('create')->with('192.168.1.119', 9200)->andReturn($mockNewConnection)->getMock();

        $connectionPoolParams = array(
            'randomizeHosts' => false
        );
        $connectionPool = new SniffingConnectionPool($connections, $selector, $connectionFactory, $connectionPoolParams);

        $retConnection = $connectionPool->nextConnection(true);

        $this->assertEquals($mockNewConnection, $retConnection);
    }

}