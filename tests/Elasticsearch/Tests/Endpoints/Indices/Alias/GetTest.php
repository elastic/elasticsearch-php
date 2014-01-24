<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 9:07 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\Indices\Alias\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cache
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */

class GetTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testNoIndexOrName()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_alias',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->performRequest();

    }


    public function testNoName()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_alias',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }

    public function testValidGetWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_alias/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setName('testName')
        ->performRequest();

    }

    public function testValidGetWithoutIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_alias/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setName('testName')
        ->performRequest();

    }


}