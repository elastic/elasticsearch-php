<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetTest extends \PHPUnit_Framework_TestCase
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

        $index = new Get($mockTransport);
        $index->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Get($mockTransport);
        $index->setType('testType')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Get($mockTransport);
        $index->setIndex('testIndex')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoID()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Get($mockTransport);
        $index->setIndex('testIndex')->setType('testType')->performRequest();

    }

    public function testValidGet()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/abc',
                                 array(),
                                 null
                             )
                         ->getMock();



        $index = new Get($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setID('abc')
        ->performRequest();

    }

    public function testValidIndexWithSourceOnly()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/abc/_source',
                                 array(),
                                 null
                             )
                         ->getMock();



        $index = new Get($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setID('abc')
        ->returnOnlySource()
        ->performRequest();

    }

    public function testValidIndexWithExistenceOnly()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'HEAD',
                                 '/testIndex/testType/abc',
                                 array(),
                                 null
                             )
                         ->getMock();



        $index = new Get($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setID('abc')
        ->checkOnlyExistance()
        ->performRequest();

    }

}