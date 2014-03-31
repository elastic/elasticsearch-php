<?php
/**
 * User: zach
 * Date: 9/20/13
 * Time: 6:38 PM
 */

namespace Elasticsearch\Tests\Connections;
use Elasticsearch;
use Elasticsearch\Connections\AbstractConnection;
use Mockery as m;



/**
 * Class AbstractConnectionTest
 *
 * @category   Tests
 * @package    AbstractConnectionTest
 * @subpackage Tests/Connections
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class AbstractConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testPing()
    {
        $logger = new Elasticsearch\Common\EmptyLogger();

        $stub = $this->getMockForAbstractClass(
            'Elasticsearch\Connections\AbstractConnection',
            array(
                array('host' => 'localhost', 'port' => 9200),
                array(),
                $logger,
                $logger
            )
        );

        $options = array('timeout' => 1);
        $return = array('status' => 200);

        $stub->expects($this->once())
             ->method('performRequest')
             ->with('HEAD', '', null, null, $options)
             ->will($this->returnValue($return));

        /** @var AbstractConnection $stub */
        $ret = $stub->ping();

        $this->assertTrue($ret);
    }

    public function testPingBadCode()
    {
        $logger = new Elasticsearch\Common\EmptyLogger();

        $stub = $this->getMockForAbstractClass(
            'Elasticsearch\Connections\AbstractConnection',
            array(
                array('host' => 'localhost', 'port' => 9200),
                array(),
                $logger,
                $logger
            )
        );

        $options = array('timeout' => 1);
        $return = array('status' => 400);

        $stub->expects($this->once())
             ->method('performRequest')
             ->with('HEAD', '', null, null, $options)
             ->will($this->returnValue($return));

        /** @var AbstractConnection $stub */
        $ret = $stub->ping();

        $this->assertFalse($ret);
    }


    public function testPingTimeout()
    {
        $logger = new Elasticsearch\Common\EmptyLogger();
        $stub = $this->getMockForAbstractClass(
            'Elasticsearch\Connections\AbstractConnection',
            array(
                array('host' => 'localhost', 'port' => 9200),
                array(),
                $logger,
                $logger
            )
        );

        $options = array('timeout' => 1);
        $return = array('status' => 400);

        $stub->expects($this->once())
             ->method('performRequest')
             ->with('HEAD', '', null, null, $options)
             ->will($this->throwException(new Elasticsearch\Common\Exceptions\Curl\OperationTimeoutException()));

        /** @var AbstractConnection $stub */
        $ret = $stub->ping();

        $this->assertFalse($ret);
    }

    public function testURLPrefix()
    {
        $logger = new Elasticsearch\Common\EmptyLogger();

        $stub = $this->getMockForAbstractClass(
            'Elasticsearch\Connections\AbstractConnection',
            array(
                array('host' => 'localhost', 'port' => 9200, 'path' => '/prefix'),
                array(),
                $logger,
                $logger
            )
        );

        /** @var AbstractConnection $stub */
        $this->assertEquals('http://localhost:9200/prefix', $stub->getHost());
    }

}

