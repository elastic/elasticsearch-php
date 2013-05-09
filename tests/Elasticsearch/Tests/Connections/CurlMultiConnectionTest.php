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

    }//end testBadPort()


    /**
     * Test nonexistant endpoint
     *
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testNonexistantEndpoint()
    {
        $host = 'localhost';
        $port = 9200;
        $connectionParams['curlMultiHandle'] = curl_multi_init();
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/abc');

        $this->assertEquals(400, $ret['status']);

    }//end testNonexistantEndpoint()


    /**
     * Test query params
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testQueryParams()
    {
        $host = 'localhost';
        $port = 9200;
        $connectionParams['curlMultiHandle'] = curl_multi_init();
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);
        $params['pretty'] = 'true';

        $ret = $connection->performRequest('GET', '/', $params);

        $this->assertEquals(200, $ret['status']);

        $expectedURI = 'http://localhost:9200/?pretty=true';
        $this->assertEquals($expectedURI, $ret['info']['url']);

    }//end testQueryParams()


    /**
     * Test query URI
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testQueryURI()
    {
        $host = 'localhost';
        $port = 9200;
        $connectionParams['curlMultiHandle'] = curl_multi_init();
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);

        $ret = $connection->performRequest('GET', '/_cluster/nodes/');

        $expectedURI = 'http://localhost:9200/_cluster/nodes/';
        $this->assertEquals($expectedURI, $ret['info']['url']);

    }//end testQueryURI()


    /**
     * Test query body
     *
     * @covers \Elasticsearch\Connections\CurlMultiConnection::performRequest
     * @return void
     */
    public function testQueryBody()
    {
        $host = 'localhost';
        $port = 9200;
        $connectionParams['curlMultiHandle'] = curl_multi_init();
        $log = $this->getMockBuilder('\Monolog\Logger')
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Elasticsearch\Connections\CurlMultiConnection($host, $port, $connectionParams, $log, $log);

        $body = '{"testsetting":"123"}';

        /*
            The index _doesnotexist is used with an underscore
            because ES won't create it...invalid.
        */

        $ret = $connection->performRequest('POST', '/_doesnotexist', null, $body);

        $this->assertEquals(400, $ret['status']);

        $expectedURI = 'http://localhost:9200/_doesnotexist';
        $this->assertEquals($expectedURI, $ret['info']['url']);

        // Best we can do to make sure the post actually posted.
        $this->assertEquals(strlen(($body)), $ret['info']['size_upload']);


    }//end testQueryBody()


}//end class