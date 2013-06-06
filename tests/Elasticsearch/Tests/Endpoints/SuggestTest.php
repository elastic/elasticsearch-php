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
     * @expectedException InvalidArgumentException
     */
    public function testSetIllegalBody()
    {
        $query = 5;

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $action = new Suggest($mockTransport);
        $action->setBody($query)
        ->performRequest();

    }

    public function testGetURIWithNoIndex()
    {

        $uri = '/_suggest';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $action = new Suggest($mockTransport);
        $action->performRequest();

    }

    public function testValidSuggest()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_suggest',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Suggest($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }
}