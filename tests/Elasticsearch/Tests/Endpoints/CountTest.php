<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Endpoints\Count;
use Mockery as m;

/**
 * Class CountTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class CountTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_count';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Count($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_count';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Count($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_count';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Count($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_count';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Count($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

    public function testValidCount()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_count',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Count($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->setID('testID')
        ->performRequest();

    }
}