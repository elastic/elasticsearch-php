<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 12:46 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Gateway;

use Elasticsearch\Endpoints\Indices\Gateway\Snapshot;
use Mockery as m;

/**
 * Class SnapshotTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Gateway
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */

class SnapshotTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testValidSnapshotWithNoIndex()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_gateway/snapshot',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Snapshot($mockTransport);
        $action->performRequest();

    }

    public function testValidSnapshotWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/testIndex/_gateway/snapshot',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Snapshot($mockTransport);
        $action->setIndex('testIndex')
        ->performRequest();

    }


}