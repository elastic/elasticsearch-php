<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 8:59 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Alias;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Alias\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cache
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
    public function testNoIndexOrName()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->setName('testName')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoName()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }

    public function testValidDelete()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex/_alias/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setName('testName')
        ->performRequest();

    }


}