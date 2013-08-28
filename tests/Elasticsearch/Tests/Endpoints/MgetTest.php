<?php
/**
 * User: zach
 * Date: 6/6/13
 * Time: 11:10 AM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Mget;
use Mockery as m;

/**
 * Class MgetTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class MgetTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testSetBody()
    {
        $query['docs'] = '1';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 $query
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetIllegalQuery()
    {
        $query = 5;

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Mget($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_mget';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_mget';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/testType/_mget';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_mget';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

}