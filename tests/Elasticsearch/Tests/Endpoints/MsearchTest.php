<?php
/**
 * User: zach
 * Date: 6/5/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Msearch;
use Mockery as m;

/**
 * Class MsearchTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class MsearchTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }


    /**
     * @expectedException RuntimeException
     */
    public function testGetURIWithNoIndexTypeOrBody()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');

        $action = new Msearch($mockTransport, $mockSerializer);
        $action->performRequest();

    }

    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_msearch';
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();
        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');
        
        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_msearch';
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');
        
        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->setIndex('testIndex')
        ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_msearch';
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');
        
        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_msearch';
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');
        
        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }


    public function testValidMsearch()
    {
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/testType/_msearch',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer');
        
        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->setIndex('testIndex')
        ->setType('testType')
        ->performRequest();

    }

    public function testSerializeArrayBody()
    {
        $uri = '/_msearch';
        $body = array(array('query'=>array('match_all' => array())),array('query'=>array('match_all' => array())));
        $serializedBody = json_encode($body[0])."\n".json_encode($body[1])."\n";
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $serializedBody
                             )
                         ->getMock();

        $mockSerializer = m::mock('\Elasticsearch\Serializers\ArrayToJSONSerializer')
                          ->shouldReceive('serialize')
                          ->once()
                          ->with($body[0])
                          ->andReturn(json_encode($body[0]))
                          ->getMock()
                          ->shouldReceive('serialize')
                          ->once()
                          ->with($body[1])
                          ->andReturn(json_encode($body[1]))
                          ->getMock();

        $action = new Msearch($mockTransport, $mockSerializer);
        $action->setBody($body)->performRequest();

    }

}