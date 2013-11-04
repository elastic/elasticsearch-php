<?php
/**
 * User: zach
 * Date: 11/04/13
 * Time: 9:55 AM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Mapping;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Mapping\GetField;
use Mockery as m;

/**
 * Class GetFieldTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Mapping
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetFieldTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidGetWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_mapping/field/test',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new GetField($mockTransport);
        $action->setIndex('testIndex')
               ->setField('test')
               ->performRequest();

    }

    public function testValidGetWithType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_all/testType/_mapping/field/test',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new GetField($mockTransport);
        $action->setType('testType')
               ->setField('test')
               ->performRequest();

    }

    public function testValidGetWithNoIndexOrType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_all/_mapping/field/test',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new GetField($mockTransport);
        $action->setField('test')
               ->performRequest();

    }

    public function testValidGetWithIndexAndType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_mapping/field/test',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new GetField($mockTransport);
        $action->setIndex('testIndex')
            ->setType('testType')
            ->setField('test')
            ->performRequest();

    }


    /**
     * @expectedException \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function testNoField()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->never()
                         ->getMock();

        $action = new GetField($mockTransport);
        $action->setIndex('testIndex')
               ->setType('testType')
               ->performRequest();

    }


}