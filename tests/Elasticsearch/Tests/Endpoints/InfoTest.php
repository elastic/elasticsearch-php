<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Endpoints\Info;
use Mockery as m;

/**
 * Class InfoTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class InfoTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidInfo()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Info($mockTransport);
        $action->performRequest();

    }
}