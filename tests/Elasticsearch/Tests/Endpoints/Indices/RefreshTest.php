<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:51 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Refresh;
use Mockery as m;

/**
 * Class RefreshTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class RefreshTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidRefreshWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_refresh',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Refresh($mockTransport);
        $action->performRequest();

    }

    public function testValidRefreshWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_refresh',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Refresh($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}