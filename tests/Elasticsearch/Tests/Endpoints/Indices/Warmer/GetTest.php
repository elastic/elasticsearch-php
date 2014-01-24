<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 4:11 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Warmer;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Warmer\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Warmer
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testGetNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_warmer',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->performRequest();

    }

    public function testGetWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_warmer',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }


    /**
     * @expectedException RuntimeException
     */
    public function testGetWithIndexAndType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->performRequest();

    }

    public function testGetWithIndexAndName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_warmer/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->performRequest();

    }

    public function testGetWithIndexTypeAndName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_warmer/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->setName('testName')->performRequest();

    }


}