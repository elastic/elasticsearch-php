<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 9:12 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Alias;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Alias\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cache
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */

class PutTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testSetArrayBody()
    {
        $body = array('field' => 'value');
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/_alias/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setBody($body)->setIndex('testIndex')->setName('testName')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoBody()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');
        $action = new Put($mockTransport);
        $action->performRequest();
    }


    public function testNoIndex()
    {
        $body = array('field' => 'value');
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_alias/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setBody($body)->setName('testName')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoName()
    {
        $body = array('field' => 'value');
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Put($mockTransport);
        $action->setBody($body)->setIndex('testIndex')
        ->performRequest();

    }


    public function testValidPutWithIndexBodyAndName()
    {
        $body = array('field' => 'value');
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/_alias/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setBody($body)->setIndex('testIndex')->setName('testName')
        ->performRequest();

    }


}