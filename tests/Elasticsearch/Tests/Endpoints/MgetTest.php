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
        $body['docs'] = '1';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setBody($body)
        ->performRequest();

    }


    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_mget';
        $body['docs'] = '1';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setBody($body)->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_mget';
        $body['docs'] = '1';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setBody($body)->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_mget';
        $body['docs'] = '1';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Mget($mockTransport);
        $action->setBody($body)->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_mget';
        $body['docs'] = '1';
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
        $action->setBody($body)->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

}