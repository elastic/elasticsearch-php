<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:17 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices\Exists;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Exists;
use Mockery as m;

/**
 * Class IndicesTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Exists
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class IndicesTest extends \PHPUnit_Framework_TestCase
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

        $index = new Exists($mockTransport);
        $index->performRequest();

    }

    public function testValidIndicesExists()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'HEAD',
                                 '/testIndex',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Exists($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }



}