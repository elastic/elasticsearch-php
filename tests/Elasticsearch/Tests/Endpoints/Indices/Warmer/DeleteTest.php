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

    public function testDeleteWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/_warmer',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }

    public function testDeleteWithIndexAndType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/testType/_warmer',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->performRequest();

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

    public function testDeleteWithIndexTypeAndName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/testType/_warmer/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->setName('testName')->performRequest();

    }


}