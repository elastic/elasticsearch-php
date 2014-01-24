<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints\Cluster\Settings;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Cluster\Settings\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster\Settings
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class PutTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testPutBody()
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

    public function testValidPutWithBody()
    {
        $Puttings = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_cluster/settings',
                                 array(),
                                 $Puttings
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setBody($Puttings)
            ->performRequest();

    }

    public function testValidPutWithoutBody()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_cluster/settings',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->performRequest();

    }
}