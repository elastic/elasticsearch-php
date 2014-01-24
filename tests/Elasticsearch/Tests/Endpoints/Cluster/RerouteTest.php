<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints\Cluster;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Cluster\Reroute;
use Mockery as m;

/**
 * Class RerouteTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class RerouteTest extends \PHPUnit_Framework_TestCase
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

        $action = new Reroute($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testValidReroute()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_cluster/reroute',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Reroute($mockTransport);
        $action->performRequest();

    }
}