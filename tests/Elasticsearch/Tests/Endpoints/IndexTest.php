<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Index;
use Mockery as m;

/**
 * Class IndexTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class IndexTest extends \PHPUnit_Framework_TestCase
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

        $index = new Index($mockTransport);
        $index->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Index($mockTransport);
        $index->setType('testType')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoType()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Index($mockTransport);
        $index->setIndex('testIndex')->performRequest();

    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoDocumentBody()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Index($mockTransport);
        $index->setIndex('testIndex')->setType('testType')->performRequest();

    }

    public function testValidIndexNoID()
    {
        $doc = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/testType',
                                 array(),
                                 $doc
                             )
                         ->getMock();



        $index = new Index($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setBody($doc)
        ->performRequest();

    }

    public function testValidIndexWithID()
    {
        $doc = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/testType/abc',
                                 array(),
                                 $doc
                             )
                         ->getMock();



        $index = new Index($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setID('abc')
        ->setBody($doc)
        ->performRequest();

    }

    public function testValidIndexNoIDWithCreateIfAbsent()
    {
        $doc    = array('field' => 'value');
        $params = array('op_type' => 'create');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/testType',
                                 $params,
                                 $doc
                             )
                         ->getMock();



        $index = new Index($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setBody($doc)
        ->createIfAbsent()
        ->performRequest();

    }

    public function testValidIndexWithIDWithCreateIfAbsent()
    {
        $doc = array('field' => 'value');

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'PUT',
                                 '/testIndex/testType/abc/_create',
                                 array(),
                                 $doc
                             )
                         ->getMock();



        $index = new Index($mockTransport);
        $index->setIndex('testIndex')
        ->setType('testType')
        ->setID('abc')
        ->setBody($doc)
        ->createIfAbsent()
        ->performRequest();

    }
}