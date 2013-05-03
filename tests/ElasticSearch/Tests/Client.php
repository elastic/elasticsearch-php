<?php

namespace ElasticSearch\Tests;
use ElasticSearch;

/**
 * Class Client
 *
 * @category   Tests
 * @package    ElasticSearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class Client extends \PHPUnit_Framework_TestCase
{


    /**
     *
     * @expectedException \ElasticSearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Hosts parameter must be an array of strings
     *
     * @covers Client::__construct
     * @return void
     */
    public function testConstructorStringHost()
    {
        // Hosts param must be an array.
        $hosts = 'localhost';
        $client = new ElasticSearch\Client($hosts);

    }//end testConstructorStringHost()


    /**
     *
     * @expectedException \ElasticSearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Port must be a valid integer
     *
     * @covers Client::__construct
     * @return void
     */
    public function testConstructorIllegalPort()
    {
        // Hosts param with single entry + illegal port.
        $hosts = array('localhost:abc');
        $client = new ElasticSearch\Client($hosts);

    }//end testConstructorIllegalPort()


    /**
     *
     * @expectedException \ElasticSearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Port must be a valid integer
     *
     * @covers Client::__construct
     * @return void
     */
    public function testConstructorEmptyPort()
    {
        // Hosts param with single entry + colon but no port.
        $hosts = array('localhost:');
        $client = new ElasticSearch\Client($hosts);

    }//end testConstructorEmptyPort()


    /**
     *
     * @expectedException \ElasticSearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage Parameters must be an array
     *
     * @covers Client::__construct
     * @return void
     */
    public function testConstructorStringParam()
    {
        // String parameter instead of an array.
        $params = 'some arbitrary string';
        $client = new ElasticSearch\Client(null, $params);

    }//end testConstructorStringParam()


    /**
     *
     * @expectedException \ElasticSearch\Common\Exceptions\UnexpectedValueException
     * @expectedExceptionMessage randomParam is not a recognized parameter
     *
     * @covers Client::__construct
     * @return void
     */
    public function testConstructorInvalidParam()
    {
        // String parameter instead of an array.
        $params = array('randomParam' => 'some arbitrary string');
        $client = new ElasticSearch\Client(null, $params);
    }
}