<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints\Cluster\Node;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Cluster\Node\HotThreads;
use Mockery as m;

/**
 * Class SettingsTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster\Node
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class SettingsTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidSettingsWithNodeID()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'GET',
                                 '/_cluster/nodes/abc/hot_threads',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new HotThreads($mockTransport);
        $action->setNodeID('abc')
        ->performRequest();

    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidSettingsWithInvalidNodeID()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new HotThreads($mockTransport);

        $nodeID = array('field' => 'value');

        $action->setNodeID($nodeID)
        ->performRequest();

    }

    public function testValidSettingsWithoutNodeID()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_cluster/nodes/hot_threads',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new HotThreads($mockTransport);
        $action->performRequest();

    }
}