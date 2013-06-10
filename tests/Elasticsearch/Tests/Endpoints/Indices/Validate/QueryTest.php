<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 3:30 PM
 */


namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Validate\Query;
use Mockery as m;

/**
 * Class QueryTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidQueryWithNoIndexNoType()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_all/_validate/query',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Query($mockTransport);
        $action->performRequest();

    }

    public function testValidQueryWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_validate/query',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Query($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

    public function testValidQueryWithType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_all/testType/_validate/query',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Query($mockTransport);
        $action->setType('testType')
        ->performRequest();

    }

    public function testValidQueryWithIndexAndType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_validate/query',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Query($mockTransport);
        $action->setIndex('testIndex')->setType('testType')
        ->performRequest();

    }

    public function testValidQueryWithBody()
    {

        $body = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_all/_validate/query',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Query($mockTransport);
        $action->setBody($body)
        ->performRequest();

    }


}