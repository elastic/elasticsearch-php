<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 3:03 PM
 */


namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Scroll;
use Mockery as m;

/**
 * Class ScrollTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@Elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://Elasticsearch.org
 */
class ScrollTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testSetStringBody()
    {
        $body = 'scrollid';

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Scroll($mockTransport);
        $action->setBody($body);


    }


    public function testWithBodyNoScrollID()
    {
        $body = 'scrollID';
        $uri = '/_search/scroll';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();



        $action = new Scroll($mockTransport);
        $action->setBody($body)
        ->performRequest();

    }

    public function testWithBodyAndScrollID()
    {
        $body = 'scrollID';
        $uri = "/_search/scroll/$body";

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();



        $action = new Scroll($mockTransport);
        $action->setBody($body)->setScrollID($body)
        ->performRequest();

    }
}