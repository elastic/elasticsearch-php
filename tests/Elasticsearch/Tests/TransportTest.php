<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

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


    /**
     * Test null constructors
     *
     * @expectedException \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @expectedExceptionMessage Hosts parameter must be set
     *
     * @covers \Elasticsearch\Transport::__construct
     * @return void
     */
    public function testNullConstructor()
    {
        $hosts = null;
        $params = null;
        // Empty constructor.
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $transport = new Elasticsearch\Transport($hosts, $params, $log);

    }//end testNullConstructor()


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


    /**
     * Test invalid host array being passed
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Host parameter must be an array
     *
     * @covers \Elasticsearch\Transport::addConnection
     * @return void
     */
    public function testAddConnectionWithInvalidString()
    {
        $hosts = array(array('host' => 'localhost', 'port' => 9200));
        $that = $this;
        $dicParams['connectionPool'] = function ($connections) use ($that) { return $that->getMock('ConnectionPool'); };
        $dicParams['connection'] = function ($host, $port) use ($that) {
            $mockConnection =  $that->getMock('Connection', array('getTransportSchema'));

            $mockConnection->expects($that->once())
                ->method('getTransportSchema')
                ->will($that->returnValue('http'));

            return $mockConnection;
        };
        $dicParams['sniffer']     = function () use ($that) { return $that->getMock('Sniffer'); };
        $dicParams['sniffOnStart'] = false;
        $dicParams['sniffAfterRequests'] = false;
        $dicParams['sniffOnConnectionFail'] = false;
        $dicParams['maxRetries'] = 3;
        $dicParams['serializer'] = $this->getMock('Serializer');

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $transport = new Elasticsearch\Transport($hosts, $dicParams, $log);
        $transport->addConnection('arbitrary string');

    }//end testAddConnectionWithInvalidString()


    /**
     * Test invalid host array - no hostname
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Host must be provided in host parameter
     *
     * @covers \Elasticsearch\Transport::addConnection
     * @return void
     */
    public function testAddConnectionWithMissingHost()
    {
        $hosts = array(array('host' => 'localhost', 'port' => 9200));
        $that = $this;
        $dicParams['connectionPool'] = function ($connections) use ($that) { return $that->getMock('ConnectionPool'); };
        $dicParams['connection'] = function ($host, $port) use ($that) {
            $mockConnection =  $that->getMock('Connection', array('getTransportSchema'));

            $mockConnection->expects($that->once())
                ->method('getTransportSchema')
                ->will($that->returnValue('http'));

            return $mockConnection;
        };
        $dicParams['sniffer']     = function () use ($that) { return $that->getMock('Sniffer'); };
        $dicParams['sniffOnStart'] = false;
        $dicParams['sniffAfterRequests'] = false;
        $dicParams['sniffOnConnectionFail'] = false;
        $dicParams['maxRetries'] = 3;$dicParams['maxRetries'] = 3;
        $dicParams['serializer'] = $this->getMock('Serializer');

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $transport = new Elasticsearch\Transport($hosts, $dicParams, $log);

        $host = array('port' => 9200);
        $transport->addConnection($host);

    }//end testAddConnectionWithMissingHost()


    /**
     * Test invalid host array - non-numeric port
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Port must be numeric
     *
     * @covers \Elasticsearch\Transport::addConnection
     * @return void
     */
    public function testAddConnectionWithNonNumericPort()
    {
        $hosts = array(array('host' => 'localhost', 'port' => 9200));
        $that = $this;
        $dicParams['connectionPool'] = function ($connections) use ($that) { return $that->getMock('ConnectionPool'); };
        $dicParams['connection'] = function ($host, $port) use ($that) {
            $mockConnection =  $that->getMock('Connection', array('getTransportSchema'));

            $mockConnection->expects($that->once())
                ->method('getTransportSchema')
                ->will($that->returnValue('http'));

            return $mockConnection;
        };
        $dicParams['sniffer']     = function () use ($that) { return $that->getMock('Sniffer'); };
        $dicParams['sniffOnStart'] = false;
        $dicParams['sniffAfterRequests'] = false;
        $dicParams['sniffOnConnectionFail'] = false;
        $dicParams['maxRetries'] = 3;
        $dicParams['serializer'] = $this->getMock('Serializer');

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $transport = new Elasticsearch\Transport($hosts, $dicParams, $log);

        $host = array(
                 'host' => 'localhost',
                 'port' => 'abc',
                );

        $transport->addConnection($host);

    }//end testAddConnectionWithNonNumericPort()


}//end class