<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

/**
 * Class Transport
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class Transport extends \PHPUnit_Framework_TestCase
{


    /**
     * @param $exception
     * @param $code
     */
    public function assertThrowsException($exception, $code)
    {
        $raisedException = null;
        try {
            $code();
        } catch (\Exception $raisedException) {
            // No more code, we only want to catch the exception in $e.
        }

        $this->assertInstanceOf($exception, $raisedException);

    }//end assertThrowsException()


    /**
     * Test null constructors
     *
     * @expectedException \Elasticsearch\Common\Exceptions\BadMethodCallException
     * @expectedExceptionMessage Hosts parameter must be set
     *
     * @covers Transport::__construct
     * @return void
     */
    public function testNullConstructor()
    {
        $hosts = null;
        $params = null;
        // Empty constructor.
        $transport = new Elasticsearch\Transport($hosts, $params);

    }//end testNullConstructor()


    /**
     * Test string constructors
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Hosts parameter must be an array
     *
     * @covers Transport::__construct
     * @return void
     */
    public function testStringConstructor()
    {
        $hosts     = 'arbitrary string';
        $params    = 'arbitrary string';
        $transport = new Elasticsearch\Transport($hosts, $params);

    }//end testStringConstructor()


    /**
     * Test invalid host array being passed
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Host parameter must be an array
     *
     * @covers Transport::addConnection
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

        $transport = new Elasticsearch\Transport($hosts, $dicParams);
        $transport->addConnection('arbitrary string');

    }//end testAddConnectionWithInvalidString()


    /**
     * Test invalid host array - no hostname
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Host must be provided in host parameter
     *
     * @covers Transport::addConnection
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

        $transport = new Elasticsearch\Transport($hosts, $dicParams);

        $host = array('port' => 9200);
        $transport->addConnection($host);

    }//end testAddConnectionWithMissingHost()


    /**
     * Test invalid host array - non-numeric port
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Port must be numeric
     *
     * @covers Transport::addConnection
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

        $transport = new Elasticsearch\Transport($hosts, $dicParams);

        $host = array(
                 'host' => 'localhost',
                 'port' => 'abc',
                );

        $transport->addConnection($host);

    }//end testAddConnectionWithNonNumericPort()


}//end class