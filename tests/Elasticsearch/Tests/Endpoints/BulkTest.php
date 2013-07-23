<?php
/**
 * User: zach
 * Date: 6/6/13
 * Time: 11:10 AM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Bulk;
use Mockery as m;

/**
 * Class BulkTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class BulkTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testSetBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 'bulk data'
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Bulk($mockTransport, $mockSerializer);
        $action->setBody('bulk data')
        ->performRequest();

    }


    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_all/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Bulk($mockTransport, $mockSerializer);
        $action->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Bulk($mockTransport, $mockSerializer);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Bulk($mockTransport, $mockSerializer);
        $action->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Bulk($mockTransport, $mockSerializer);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

}