<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 1:02 PM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Suggest;
use Mockery as m;

/**
 * Class SuggestTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class SuggestTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    /**
     * @expectedException RuntimeException
     */
    public function testGetURIWithNoIndexOrBody()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');;

        $action = new Suggest($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithNoIndex()
    {

        $uri = '/_suggest';
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

        $action = new Suggest($mockTransport);
        $action->setBody($body)->performRequest();

    }

    public function testValidSuggest()
    {
        $body = 'abc';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_suggest',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Suggest($mockTransport);
        $action->setBody($body)->setIndex('testIndex')
        ->performRequest();

    }
}