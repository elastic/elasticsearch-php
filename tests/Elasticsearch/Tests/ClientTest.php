<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

use Monolog\Logger;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use Psr\Log\LogLevel;
use Symfony\Component\Config\Definition\Exception\Exception;
use Mockery as m;

/**
 * Class ClientTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        $this->root = vfsStream::setup('root');
    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function testConstructorStringHost()
    {
        // Hosts param must be an array.
        $params = array('hosts' => 'localhost');
        $client = new Elasticsearch\Client($params);

    }


    public function testOneGoodOneBadHostNoException()
    {
        $params = array('hosts' => array (
            '127.0.0.1:80',
            $_SERVER['ES_TEST_HOST'],
        ));
        $client = new Elasticsearch\Client($params);

        // Perform three requests to make sure the bad host is tried at least once
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));

    }


    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function testOneGoodOneBadHostNoRetryException()
    {
        $params = array('hosts' => array (
            '127.0.0.1:1',
            $_SERVER['ES_TEST_HOST'],
        ));
        $params['retries'] = 0;
        $client = new Elasticsearch\Client($params);

        // Perform three requests to make sure the bad host is tried at least once
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));

    }


    /**
     * @expectedException \Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function testBadHost()
    {
        $params = array('hosts' => array (
            '127.0.0.1:8200',
        ));
        $client = new Elasticsearch\Client($params);
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));

    }


    /**
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function testConstructorIllegalPort()
    {
        $params = array(
            'hosts' => array('localhost:abc')
        );
        $client = new Elasticsearch\Client($params);

    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function testZeroRetries()
    {
        $params = array(
            'retries' => 0,
            'hosts' => array('localhost:8000')
        );
        $client = new Elasticsearch\Client($params);
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));

    }


    public function testConstructorEmptyPort()
    {
        $mockPimple = m::mock('Pimple')->shouldReceive('offsetGet')->getMock()->shouldReceive('offsetSet')->getMock();
        $mockDIC = m::mock('DICBuilder')->shouldReceive('getDIC')->once()->andReturn($mockPimple)->getMock();

        $that = $this;  //hurp durp

        $params = array(
            'hosts' => array('localhost:'),
            'dic' => function ($hosts, $params) use ($mockDIC, $that) {

                $expected = array(array('scheme' => 'http', 'host' => 'localhost', 'port' => 9200));
                $that->assertEquals($expected, $hosts);
                return $mockDIC;
            }
        );
        $client = new Elasticsearch\Client($params);

    }

    public function testConstructorNoPort()
    {
        $mockPimple = m::mock('Pimple')->shouldReceive('offsetGet')->getMock()->shouldReceive('offsetSet')->getMock();
        $mockDIC = m::mock('DICBuilder')->shouldReceive('getDIC')->once()->andReturn($mockPimple)->getMock();

        $that = $this;  //hurp durp

        $params = array(
            'hosts' => array('localhost'),
            'dic' => function ($hosts, $params) use ($mockDIC, $that) {

                $expected = array(array('scheme' => 'http', 'host' => 'localhost', 'port' => 9200));
                $that->assertEquals($expected, $hosts);
                return $mockDIC;
            }
        );
        $client = new Elasticsearch\Client($params);

    }

    public function testConstructorWithPort()
    {
        $mockPimple = m::mock('Pimple')->shouldReceive('offsetGet')->getMock()->shouldReceive('offsetSet')->getMock();
        $mockDIC = m::mock('DICBuilder')->shouldReceive('getDIC')->once()->andReturn($mockPimple)->getMock();

        $that = $this;  //hurp durp

        $params = array(
            'hosts' => array('localhost:9200'),
            'dic' => function ($hosts, $params) use ($mockDIC, $that) {

                $expected = array(array('scheme' => 'http', 'host' => 'localhost', 'port' => 9200));
                $that->assertEquals($expected, $hosts);
                return $mockDIC;
            }
        );
        $client = new Elasticsearch\Client($params);

    }

    public function testConstructorWithSchemeAndPort()
    {
        $mockPimple = m::mock('Pimple')->shouldReceive('offsetGet')->getMock()->shouldReceive('offsetSet')->getMock();
        $mockDIC = m::mock('DICBuilder')->shouldReceive('getDIC')->once()->andReturn($mockPimple)->getMock();

        $that = $this;  //hurp durp

        $params = array(
            'hosts' => array('http://localhost:9200'),
            'dic' => function ($hosts, $params) use ($mockDIC, $that) {

                $expected = array(array('scheme' => 'http', 'host' => 'localhost', 'port' => 9200));
                $that->assertEquals($expected, $hosts);
                return $mockDIC;
            }
        );
        $client = new Elasticsearch\Client($params);

    }




    /**
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return void
     */
    public function testConstructorStringParam()
    {
        // String parameter instead of an array.
        $params = 'some arbitrary string';
        $client = new Elasticsearch\Client($params);

    }//end testConstructorStringParam()


    /**
     *
     * @expectedException \Elasticsearch\Common\Exceptions\UnexpectedValueException
     *
     * @return void
     */
    public function testConstructorInvalidParam()
    {
        // String parameter instead of an array.
        $params = array('randomParam' => 'some arbitrary string');
        $client = new Elasticsearch\Client($params);
    }


    /**
     * This test is rather hacky...better way to test than check headers in log?
     *
     * @group integration
     */
    public function testBasicAuth()
    {
        $path = vfsStream::url('root');

        $params = array();
        $params['logging'] = true;
        $params['connectionParams']['auth'] = array('username', 'password', 'Basic');
        $params['logPath'] = "$path/elasticsearch.log";
        $params['logLevel'] = LogLevel::INFO;

        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);

        $client = new Elasticsearch\Client($params);

        try {
            $client->ping();
        } catch (Exception $e) {
            // Ok to fail, not actually trying to connect.  Just want to see
            // log for basic auth headers
        }

        $log = file_get_contents('vfs://root/elasticsearch.log');
        $basicAuthSignature = 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=';
        $this->assertContains($basicAuthSignature, $log);
    }


    /**
     * @group integration
     */
    public function testNoBasicAuth()
    {
        $path = vfsStream::url('root');

        $params = array();
        $params['logging'] = true;
        $params['logPath'] = "$path/elasticsearch.log";
        $params['logLevel'] = LogLevel::INFO;

        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);

        $client = new Elasticsearch\Client($params);

        try {
            $client->ping();
        } catch (Exception $e) {
            // Ok to fail, not actually trying to connect.  Just want to see
            // log
        }

        $log = file_get_contents('vfs://root/elasticsearch.log');
        $basicAuthSignature = '"authorization"';
        $this->assertNotContains($basicAuthSignature, $log);
    }

    /**
     * @group integration
     */
    public function testDisableLogging()
    {
        $path = vfsStream::url('root');

        $params = array();
        $params['logging'] = false;
        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);
        $client = new Elasticsearch\Client($params);

        try {
            $client->ping();
        } catch (Exception $e) {
            // Ok to fail, not actually trying to connect.  Just want to see
            // log
        }

        $logExists = file_exists('vfs://root/elasticsearch.log');
        $this->assertFalse($logExists);
    }

    public function testHighTimeout()
    {
        $params = array();
        $params['connectionParams']['timeout'] = 5000;
        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);
        $client = new Elasticsearch\Client($params);

        try {
            $client->ping();
        } catch (Exception $e) {

        }

    }

    public function testHTTPS()
    {
        // Hosts param must be an array.
        $params = array('hosts' => array('https://localhost'));
        $client = new Elasticsearch\Client($params);

        try {
            $client->exists(array('index' => 't', 'type' => 't', 'id' => 1));
        } catch (\Exception $e) {

        }

        $last = $client->transport->getLastConnection()->getLastRequestInfo();
        $this->assertEquals('https://localhost:9200/t/t/1?', $last['request']['uri']);

    }

    public function testCustomQueryParams() {
        $params = array();

        $params['hosts'] = array ($_SERVER['ES_TEST_HOST']);
        $client = new Elasticsearch\Client($params);

        $getParams = array(
            'index' => 'test',
            'type' => 'test',
            'id' => 1,
            'parent' => 'abc',
            'custom' => array('customToken' => 'abc', 'otherToken' => 123)
        );
        $exists = $client->exists($getParams);
    }
}