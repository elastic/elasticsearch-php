<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

use Mockery as m;

/**
 * Class TransportTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class TransportTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }


    /**
     * Test string constructors
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Hosts parameter must be an array
     *
     * @covers \Elasticsearch\Transport::__construct
     * @return void
     */
    public function testStringConstructor()
    {
        $hosts     = 'arbitrary string';
        $params    = 'arbitrary string';
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $transport = new Elasticsearch\Transport($hosts, $params, $log);

    }//end testStringConstructor()


    public function testSniffOnStart()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                        ->shouldReceive('scheduleCheck')->once()->getMock();

        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface');

        $mockConnection = m::mock('\Elasticsearch\Connections\ConnectionInterface');
        $mockConnectionFxn = function($host, $port = null) use ($mockConnection) {
            return $mockConnection;
        };

        // Eww...
        $params = m::mock('\Pimple\Container')
                      ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                      ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                      ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                      ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(true)->getMock()
                      ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                      ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                      ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $params, $log);
    }

    public function testSetRetries()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->once()->getMock();

        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface');

        $mockConnection = m::mock('\Elasticsearch\Connections\ConnectionInterface');
        $mockConnectionFxn = function($host, $port = null) use ($mockConnection) {
            return $mockConnection;
        };

        // Eww...
        $params = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(true)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(true)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(2)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $params, $log);
    }

    public function testNoSniffOnStart()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->never()->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface');

        $mockConnection = m::mock('\Elasticsearch\Connections\ConnectionInterface');
        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        // Eww...
        $params = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $params, $log);
    }

    public function testMixedHosts()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'), array('host' => 'localhost', 'port' => 9200));

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->never()->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface');

        $mockConnection = m::mock('\Elasticsearch\Connections\ConnectionInterface');
        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        // Eww...
        $params = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 1)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(2)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $params, $log);
    }

    public function testPerformRequestNoBody()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));
        $method = 'GET';
        $uri    = '/';
        $params = null;
        $body   = null;
        $response = array(
            'text' => 'texty text',
            'status'   => '200',
            'info'     => array()
        );

        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection')
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $body)->andReturn($response)->getMock()
                          ->shouldReceive('markAlive')->once()->getMock();

        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->never()->getMock()
                              ->shouldReceive('nextConnection')->andReturn($mockConnection)->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface')
                          ->shouldReceive('deserialize')->with($response['text'], array())->andReturn('out')->getMock();



        // Eww...
        $pimple = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $pimple, $log);
        $ret = $transport->performRequest($method, $uri, $params, $body);

        $expected = array(
            'status' => $response['status'],
            'data'   => 'out',
            'info'   => $response['info']
        );

        $this->assertEquals($expected, $ret);

    }

    public function testPerformRequestWithBody()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));
        $method = 'GET';
        $uri    = '/';
        $params = null;
        $body   = array('field' => 'value');
        $response = array(
            'text' => 'texty text',
            'status'   => '200',
            'info'     => array()
        );
        $serializedBody = 'out_serialized';


        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection')
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $serializedBody)->andReturn($response)->getMock()
                          ->shouldReceive('markAlive')->once()->getMock();

        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->never()->getMock()
                              ->shouldReceive('nextConnection')->andReturn($mockConnection)->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface')
                          ->shouldReceive('serialize')->with($body)->andReturn($serializedBody)->getMock()
                          ->shouldReceive('deserialize')->with($response['text'], array())->andReturn('out_deserialize')->getMock();



        // Eww...
        $pimple = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $pimple, $log);
        $ret = $transport->performRequest($method, $uri, $params, $body);

        $expected = array(
            'status' => $response['status'],
            'data'   => 'out_deserialize',
            'info'   => $response['info']
        );

        $this->assertEquals($expected, $ret);
    }

    public function testPerformRequestTimeout()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));
        $method = 'GET';
        $uri    = '/';
        $params = null;
        $body   = null;
        $response = array(
            'text' => 'texty text',
            'status'   => '200',
            'info'     => array()
        );

        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection')
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $body)->andThrow(new Elasticsearch\Common\Exceptions\Curl\OperationTimeoutException())->getMock()
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $body)->andReturn($response)->getMock()
                          ->shouldReceive('markAlive')->once()->getMock();

        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->once()->getMock()
                              ->shouldReceive('nextConnection')->twice()->andReturn($mockConnection)->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface')
                          ->shouldReceive('deserialize')->with($response['text'], array())->andReturn('out')->getMock();



        // Eww...
        $pimple = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $pimple, $log);
        $ret = $transport->performRequest($method, $uri, $params, $body);

        $expected = array(
            'status' => $response['status'],
            'data'   => 'out',
            'info'   => $response['info']
        );

        $this->assertEquals($expected, $ret);
    }


    /**
     * @expectedException \Elasticsearch\Common\Exceptions\NoNodesAvailableException
     */
    public function testPerformRequestNoNodesAvailable()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));
        $method = 'GET';
        $uri    = '/';
        $params = null;
        $body   = null;
        $response = array(
            'text' => 'texty text',
            'status'   => '200',
            'info'     => array()
        );

        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection');

        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('nextConnection')->once()->andThrow(new Elasticsearch\Common\Exceptions\NoNodesAvailableException())->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface');

        // Eww...
        $pimple = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $pimple, $log);
        $transport->performRequest($method, $uri, $params, $body);


    }

    public function testPerformRequestTransportException()
    {
        $log = $this->getMockBuilder('\Monolog\Logger')
               ->disableOriginalConstructor()
               ->getMock();

        $hosts = array(array('host' => 'localhost'));
        $method = 'GET';
        $uri    = '/';
        $params = null;
        $body   = null;
        $response = array(
            'text' => 'texty text',
            'status'   => '200',
            'info'     => array()
        );

        $mockConnection = m::mock('\Elasticsearch\Connections\AbstractConnection')
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $body)->andThrow(new Elasticsearch\Common\Exceptions\TransportException())->getMock()
                          ->shouldReceive('performRequest')->once()->with($method, $uri, $params, $body)->andReturn($response)->getMock()
                          ->shouldReceive('markDead')->once()->getMock()
                          ->shouldReceive('markAlive')->once()->getMock();

        $mockConnectionFxn = function($host, $port=null) use ($mockConnection) {
            return $mockConnection;
        };

        $mockConnectionPool = m::mock('\Elasticsearch\ConnectionPool\StaticConnectionPool')
                              ->shouldReceive('scheduleCheck')->once()->getMock()
                              ->shouldReceive('nextConnection')->twice()->andReturn($mockConnection)->getMock();
        $mockConnectionPoolFxn = function($connections) use ($mockConnectionPool) {
            return $mockConnectionPool;
        };

        $mockSerializer = m::mock('\Elasticsearch\Serializers\SerializerInterface')
                          ->shouldReceive('deserialize')->with($response['text'], array())->andReturn('out')->getMock();



        // Eww...
        $pimple = m::mock('\Pimple\Container')
                  ->shouldReceive('offsetGet')->with('connectionPool')->andReturn($mockConnectionPoolFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('serializer')->andReturn($mockSerializer)->getMock()
                  ->shouldReceive('offsetGet')->with('connection')->andReturn($mockConnectionFxn)->getMock()
                  ->shouldReceive('offsetGet')->with('sniffOnStart')->andReturn(false)->getMock()
                  ->shouldReceive('offsetExists')->with('retries')->andReturn(false)->getMock()
                  ->shouldReceive('offsetSet')->with('retries', 0)->getMock()
                  ->shouldReceive('offsetGet')->with('retries')->andReturn(1)->getMock();

        $transport = new Elasticsearch\Transport($hosts, $pimple, $log);
        $ret = $transport->performRequest($method, $uri, $params, $body);

        $expected = array(
            'status' => $response['status'],
            'data'   => 'out',
            'info'   => $response['info']
        );

        $this->assertEquals($expected, $ret);

    }



}