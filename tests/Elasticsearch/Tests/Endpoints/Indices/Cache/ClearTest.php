<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:14 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Cache;

use Elasticsearch\Endpoints\Indices\Cache\Clear;
use Mockery as m;

/**
 * Class ClearTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cache
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */

class ClearTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidSegmentsWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_cache/clear',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Clear($mockTransport);
        $action->performRequest();

    }

    public function testValidSegmentsWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/_cache/clear',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Clear($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}