<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:22 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Flush;
use Mockery as m;

/**
 * Class FlushTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class FlushTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidFlushWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_flush',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Flush($mockTransport);
        $action->performRequest();

    }

    public function testValidFlushWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_flush',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Flush($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}