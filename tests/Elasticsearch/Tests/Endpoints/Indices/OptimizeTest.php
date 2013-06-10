<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:48 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Optimize;
use Mockery as m;

/**
 * Class OptimizeTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class OptimizeTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidOptimizeWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_optimize',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Optimize($mockTransport);
        $action->performRequest();

    }

    public function testValidOptimizeWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/_optimize',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Optimize($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}