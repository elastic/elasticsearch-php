<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:56 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Mapping;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Mapping\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Mapping
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetTest extends \PHPUnit_Framework_TestCase
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
                                 '/testIndex/_mapping',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testValidGetWithType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_mapping/testType',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testValidGetWithNoIndexOrType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_mapping',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->performRequest();

    }

    public function testValidGetWithIndexAndType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_mapping/testType',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setType('testType')
        ->performRequest();

    }


}