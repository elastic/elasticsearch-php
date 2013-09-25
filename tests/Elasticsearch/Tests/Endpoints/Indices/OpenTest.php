<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:34 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Open;
use Mockery as m;

/**
 * Class OpenTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class OpenTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Open($mockTransport);
        $action->performRequest();

    }

    public function testValidOpen()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/_open',
                                 array(),
                                 null
                             )
                         ->getMock();



        $action = new Open($mockTransport);
        $action->setIndex('testIndex')

        ->performRequest();

    }

}