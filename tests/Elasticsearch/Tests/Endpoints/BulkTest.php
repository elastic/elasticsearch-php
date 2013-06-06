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
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 'bulk data'
                             )
                         ->getMock();

        $action = new Bulk($mockTransport);
        $action->setBody('bulk data')
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetIllegalQuery()
    {
        $query = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Bulk($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_all/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Bulk($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Bulk($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Bulk($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_bulk';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Bulk($mockTransport);
        $action->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

}