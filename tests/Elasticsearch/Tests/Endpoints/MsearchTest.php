<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Msearch;
use Mockery as m;

/**
 * Class MsearchTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class MsearchTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_all/_msearch';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Msearch($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_msearch';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Msearch($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_msearch';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Msearch($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_msearch';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Msearch($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetIllegalBody()
    {
        $query = 5;

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Msearch($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testValidMsearch()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_msearch',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Msearch($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }
}