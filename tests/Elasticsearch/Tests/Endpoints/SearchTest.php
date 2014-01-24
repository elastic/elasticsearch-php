<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 11:10 AM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Search;
use Mockery as m;

/**
 * Class SearchTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class SearchTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testSetStringBody()
    {
        $body = 'testQuery';
        $uri = '/_search';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $body
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->setBody($body)
            ->performRequest();

    }

    public function testSetArrayQuery()
    {
        $query['query'] = 'testQuery';
        $uri = '/_search';
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 $query
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->setBody($query)
        ->performRequest();

    }


    public function testGetURIWithNoIndexOrType()
    {

        $uri = '/_search';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->performRequest();

    }

    public function testGetURIWithIndexButNoType()
    {
        $uri = '/testIndex/_search';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->setIndex('testIndex')
            ->performRequest();

    }

    public function testGetURIWithTypeButNoIndex()
    {

        $uri = '/_all/testType/_search';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->setType('testType')
        ->performRequest();

    }

    public function testGetURIWithBothTypeAndIndex()
    {

        $uri = '/testIndex/testType/_search';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 m::any(),
                                 $uri,
                                 array(),
                                 m::any()
                             )
                         ->getMock();

        $search = new Search($mockTransport);
        $search->setIndex('testIndex')
            ->setType('testType')
            ->performRequest();

    }

}