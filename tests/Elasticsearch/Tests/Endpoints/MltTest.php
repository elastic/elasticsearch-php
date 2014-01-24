<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Mlt;
use Mockery as m;

/**
 * Class MltTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class MltTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }


    /**
     * @expectedException RuntimeException
     */
    public function testNoIndexTypeOrID()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Mlt($mockTransport);
        $action->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Mlt($mockTransport);
        $action->setType('testType')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Mlt($mockTransport);
        $action->setIndex('testIndex')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoID()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Mlt($mockTransport);
        $action->setType('testType')->setIndex('testIndex')->performRequest();

    }

    public function testValidMlt()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/testID/_mlt',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Mlt($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->setID('testID')
        ->performRequest();

    }
}