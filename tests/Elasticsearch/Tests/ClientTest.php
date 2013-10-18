<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

use Monolog\Logger;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use Symfony\Component\Config\Definition\Exception\Exception;

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

    public function setUp()
    {
        $this->root = vfsStream::setup('root');
    }

    /**
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return void
     */
    public function testConstructorStringHost()
    {
        // Hosts param must be an array.
        $params = array('hosts' => 'localhost');
        $client = new Elasticsearch\Client($params);

    }//end testConstructorStringHost()


    /**
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return void
     */
    public function testConstructorIllegalPort()
    {
        // Hosts param with single entry + illegal port.
        $params = array(
            'hosts' => array('localhost:abc')
        );
        $client = new Elasticsearch\Client($params);

    }//end testConstructorIllegalPort()


    /**
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return void
     */
    public function testConstructorEmptyPort()
    {
        // Hosts param with single entry + colon but no port.
        $params = array(
            'hosts' => array('localhost:')
        );
        $client = new Elasticsearch\Client($params);

    }//end testConstructorEmptyPort()


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
     */
    public function testBasicAuth()
    {
        $path = vfsStream::url('root');

        $params = array();
        $params['connectionParams']['auth'] = array('username', 'password', 'Basic');
        $params['logPath'] = "$path/elasticsearch.log";
        $params['logLevel'] = Logger::INFO;
        $client = new Elasticsearch\Client($params);

        try {
            $client->ping();
        } catch (Exception $e) {
            // Ok to fail, not actually trying to connect.  Just want to see
            // log for basic auth headers
        }

        $log = file_get_contents('vfs://root/elasticsearch.log');
        $basicAuthSignature = '"authorization":["Basic dXNlcm5hbWU6cGFzc3dvcmQ="]';
        $this->assertContains($basicAuthSignature, $log);
    }

    public function testNoBasicAuth()
    {
        $path = vfsStream::url('root');

        $params = array();
        $params['logPath'] = "$path/elasticsearch.log";
        $params['logLevel'] = Logger::INFO;
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
}