<?php
/**
 * User: zach
 * Date: 6/6/13
 * Time: 11:10 AM
 */

namespace Elasticsearch\Tests\Endpoints\Cluster;

use Elasticsearch\Endpoints\Cluster\Health;
use Mockery as m;

/**
 * Class HealthTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cluster
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class HealthTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testGetURIWithNoIndex()
    {

        $uri = '/_cluster/health';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Health($mockTransport);
        $action->performRequest();

    }

    public function testGetURIWithIndex()
    {
        $uri = '/_cluster/health/testIndex';

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 $uri,
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Health($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }

}