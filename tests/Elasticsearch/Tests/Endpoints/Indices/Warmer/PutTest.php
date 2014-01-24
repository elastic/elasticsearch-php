<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 4:13 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Warmer;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Warmer\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Warmer
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class PutTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testPutNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_warmer/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setName('testName')->setBody(array())->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testPutNoBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testPutNoName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setBody(array())->performRequest();

    }



    public function testPutWithIndexNameAndBody()
    {
        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/_warmer/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->setBody($body)->performRequest();

    }

    public function testPutWithIndexTypeNameAndBody()
    {
        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/testType/_warmer/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->setBody($body)->setType('testType')->performRequest();

    }

}