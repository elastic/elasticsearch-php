<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:25 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Exists;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Exists\Types;
use Mockery as m;

/**
 * Class TypesTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Exists
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class TypesTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndexNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Types($mockTransport);
        $index->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Types($mockTransport);
        $index->setType('testType')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Types($mockTransport);
        $index->setIndex('testIndex')->performRequest();

    }


    public function testValidTypesExists()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'HEAD',
                                 '/testIndex/testType',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Types($mockTransport);
        $action->setIndex('testIndex')->setType('testType')->performRequest();

    }



}