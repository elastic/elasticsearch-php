<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\ConnectionPool\Selectors;

use Elasticsearch;
use Elasticsearch\Connections\ConnectionInterface;
use Mockery as m;

/**
 * Class StickyRoundRobinSelectorTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests\ConnectionPool\StickyRoundRobinSelectorTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class StickyRoundRobinSelectorTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testTenConnections()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector();

        $mockConnections = [];
        $mockConnections[] = m::mock(ConnectionInterface::class)
                             ->shouldReceive('isAlive')->times(16)->andReturn(true)->getMock();

        foreach (range(0, 9) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class);
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertSame($mockConnections[0], $retConnection);
        }
    }

    public function testTenConnectionsFirstDies()
    {
        $roundRobin = new Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector();

        $mockConnections = [];
        $mockConnections[] = m::mock(ConnectionInterface::class)
                             ->shouldReceive('isAlive')->once()->andReturn(false)->getMock();

        $mockConnections[] = m::mock(ConnectionInterface::class)
                             ->shouldReceive('isAlive')->times(15)->andReturn(true)->getMock();

        foreach (range(0, 8) as $index) {
            $mockConnections[] = m::mock(ConnectionInterface::class);
        }

        foreach (range(0, 15) as $index) {
            $retConnection = $roundRobin->select($mockConnections);

            $this->assertSame($mockConnections[1], $retConnection);
        }
    }
}
