<?php
/**
 * User: zach
 * Date: 5/7/13
 * Time: 2:19 PM
 */

namespace Elasticsearch\Tests\Connections;
use Elasticsearch;

/**
 * Class CurlMultiConnectionTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/Sniffers
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class CurlMultiConnectionTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test no multihandle
     *
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage curlMultiHandle must be set in connectionParams
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testNoMultihandle()
    {
        $host = 'localhost';
        $port = 9200;
        $connectionParams = null;

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);

    }//end testNoMultihandle()


    /**
     * Test bad host name
     *
     * @expectedException \Elasticsearch\Common\Exceptions\TransportException
     * @expectedExceptionMessage Curl error: Couldn't resolve host 'localhost5'
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testBadHost()
    {
        $host = 'localhost5';
        $port = 9200;
        $connectionParams['curlMultiHandle'] = curl_multi_init();

        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();
        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/');

    }//end testBadHost()


    /**
     * Test bad port number
     *
     * @expectedException \Elasticsearch\Common\Exceptions\TransportException
     * @expectedExceptionMessage Curl error: couldn't connect to host
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testBadPort()
    {
        $host = 'localhost';
        $port = 9800;
        $connectionParams['curlMultiHandle'] = curl_multi_init();
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/');

    }


}