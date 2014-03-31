<?php
/**
 * User: zach
 * Date: 9/20/13
 * Time: 12:39 PM
 */

use Elasticsearch\Connections\ConnectionFactory;
use Mockery as m;

/**
 * Class ConnectionFactoryTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class ConnectionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testCreate()
    {
        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection');
        $mockFunction = function($hostDetails, $params, $log, $trace) use ($mockConnection) {
            return $mockConnection;
        };

        // Eww...
        $mockPimple = m::mock('Pimple')
                      ->shouldReceive('offsetGet')->with('connection')->andReturn($mockFunction)->getMock()
                      ->shouldReceive('offsetGet')->with('connectionParamsShared')->andReturn(array())->getMock()
                      ->shouldReceive('offsetGet')->with('logObject')->andReturn(array())->getMock()
                      ->shouldReceive('offsetGet')->with('traceObject')->andReturn(array())->getMock();

        $hostDetails = array(
            'host' => 'localhost',
            'port' => 9200
        );

        $factory = new ConnectionFactory($mockPimple);
        $connection = $factory->create($hostDetails);

        $this->assertEquals($mockConnection, $connection);
    }
}