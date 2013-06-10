<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 3:02 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Status;
use Mockery as m;

/**
 * Class StatusTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class StatusTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidStatusWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_status',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Status($mockTransport);
        $action->performRequest();

    }

    public function testValidStatusWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_status',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Status($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}