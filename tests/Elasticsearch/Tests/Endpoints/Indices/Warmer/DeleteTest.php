<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 4:01 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Warmer;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Warmer\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Warmer
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    /**
     * @expectedException RuntimeException
     */
    public function testDeleteNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->performRequest();

    }


    /**
     * @expectedException RuntimeException
     */
    public function testDeleteWithOnlyIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testDeleteWithOnlyName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->setName('testName')->performRequest();

    }
    public function testDeleteWithIndexAndName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/_warmer/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->performRequest();

    }


}