<?php
/**
 * User: zach
 * Date: 5/7/13
 * Time: 2:19 PM
 */

namespace Elasticsearch\Tests\Connections;
use Elasticsearch;
use Mockery as m;
use Elasticsearch\Connections\GuzzleConnection;


/**
 * Class GuzzleConnectionTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/Connections
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class GuzzleConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function testNoGuzzleClient()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams = null;

        $log = m::mock('\Monolog\Logger')->shouldReceive('critical')->once()->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);

    }

}