<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:59 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Settings;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Indices\Settings\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Settings
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class PutTest extends \PHPUnit_Framework_TestCase
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

        $action = new Put($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetIllegalBody()
    {
        $query = 5;

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Put($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testValidSegmentsWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_settings',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->performRequest();

    }

    public function testValidSegmentsWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/_settings',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}