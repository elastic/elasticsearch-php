<?php
/**
 * User: zach
 * Date: 6/7/13
 * Time: 2:13 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices;

use Elasticsearch\Endpoints\Indices\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints\Indices
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidDeleteWithNoIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->performRequest();

    }

    public function testValidDeleteWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/testIndex',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}