<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:54 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Segments;
use Mockery as m;

/**
 * Class SegmentsTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class SegmentsTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidSegmentsWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_segments',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Segments($mockTransport);
        $action->performRequest();

    }

    public function testValidSegmentsWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_segments',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Segments($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}