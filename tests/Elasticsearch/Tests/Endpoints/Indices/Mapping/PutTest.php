<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 2:01 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Mapping;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Mapping\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Mappings
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class PutTest extends \PHPUnit_Framework_TestCase
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

        $index = new Put($mockTransport);
        $index->setType('testType')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Put($mockTransport);
        $index->setIndex('testType')->performRequest();

    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidBody()
    {
        $body = 5;

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Put($mockTransport);
        $index->setIndex('testType')->setBody($body)->performRequest();

    }

    public function testValidPutWithIndex()
    {

        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/_mapping',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setBody($body)
        ->performRequest();

    }

    public function testValidPutWithIndexAndType()
    {

        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/testType/_mapping',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->setBody($body)
        ->performRequest();

    }


}