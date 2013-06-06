<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints
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
    public function testNoIndexTypeOrID()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $delete = new Delete($mockTransport);
        $delete->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $delete = new Delete($mockTransport);
        $delete->setType('testType')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $delete = new Delete($mockTransport);
        $delete->setIndex('testIndex')->setID('testID')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoID()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $delete = new Delete($mockTransport);
        $delete->setType('testType')->setIndex('testIndex')->performRequest();

    }

    public function testValidDelete()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/testType/testID',
                                 array(),
                                 null
                             )
                         ->getMock();

        $delete = new Delete($mockTransport);
        $delete->setIndex('testIndex')
            ->setType('testType')
            ->setID('testID')
            ->performRequest();

    }
}