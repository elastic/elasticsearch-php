<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 3:03 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Template;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Template\Put;
use Mockery as m;

/**
 * Class PutTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Template
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
    public function testNoNameNoBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Put($mockTransport);
        $action->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Put($mockTransport);
        $index->setName('testName')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Put($mockTransport);
        $index->setBody(array())->performRequest();

    }

    public function testValidPut()
    {
        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/_template/testName',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Put($mockTransport);
        $action->setIndex('testIndex')->setName('testName')->setBody($body)
        ->performRequest();

    }


}