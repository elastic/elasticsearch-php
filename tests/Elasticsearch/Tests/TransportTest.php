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
     * Test sniffing on start
     *
     *
     * @covers \Elasticsearch\Transport::sniffHosts
     * @covers \Elasticsearch\Transport::__construct
     * @return void
     * @group ignore
     */
    public function testSniffOnStart()
    {
        $hosts = array(array('host' => 'localhost', 'port' => 9200));
        $that = $this;
        $dicParams['connectionPool'] = function ($connections) use ($that) {
            $mockConnectionPool = $that->getMock('\Elasticsearch\ConnectionPool\ConnectionPool', array(), array(), '', false);
            $mockConnectionPool->expects($that->any())
                ->method('getTransportSchema')
                ->will($that->returnValue('http'));
            return $mockConnectionPool;
        };
        $dicParams['connection'] = function ($host, $port) use ($that) {
            return $that->getMock('Connection', array('getTransportSchema'));
        };
        $dicParams['sniffer'] = function () use ($that, $hosts) {
            $mockSniffer =  $that->getMock('Sniffer', array('sniff'));

            $mockSniffer->expects($that->once())
            ->method('sniff')
            ->will($that->returnValue($hosts));

            return $mockSniffer;
        };
        $dicParams['sniffOnStart']   = true;
        $dicParams['snifferTimeout'] = false;
        $dicParams['sniffOnConnectionFail'] = false;
        $dicParams['maxRetries'] = 3;
        $dicParams['serializer'] = $this->getMock('Serializer');

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $transport = new Elasticsearch\Transport($hosts, $dicParams, $log);

    }//end testSniffOnStart()


}