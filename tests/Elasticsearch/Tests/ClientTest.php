<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

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
}