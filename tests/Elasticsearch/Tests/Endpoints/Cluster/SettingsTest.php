<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Cluster\Settings;
use Mockery as m;

/**
 * Class SettingsTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class SettingsTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testSetBody()
    {
        $query['docs'] = '1';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 m::any(),
                                 m::any(),
                                 array(),
                                 $query
                             )
                         ->getMock();

        $action = new Settings($mockTransport);
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

        $action = new Settings($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testValidSettingsWithBody()
    {
        $settings = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 'PUT',
                                 '/_cluster/settings',
                                 array(),
                                 $settings
                             )
                         ->getMock();

        $action = new Settings($mockTransport);
        $action->setBody($settings)
            ->performRequest();

    }

    public function testValidSettingsWithoutBody()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')
                         ->with(
                                 'GET',
                                 '/_cluster/settings',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Settings($mockTransport);
        $action->performRequest();

    }
}