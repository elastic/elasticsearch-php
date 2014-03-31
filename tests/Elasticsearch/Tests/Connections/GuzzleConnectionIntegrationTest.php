<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 2:43 PM
 */

namespace Elasticsearch\Tests\Connections;
use Elasticsearch;
use Elasticsearch\Common\Exceptions\Curl;
use Guzzle\Http\Client;
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
class GuzzleConnectionIntegrationTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }


    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotResolveHostException
     */
    public function test5xxErrorBadHost()
    {
        $hostDetails = array('host' => 'localhost5', 'port' => 9200);

        $connectionParams['guzzleClient'] = new Client();

        $log = m::mock('\Monolog\Logger')->shouldReceive('error')->once()->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/');

    }


    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function test5xxErrorBadPort()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9800);
        $connectionParams['guzzleClient'] = new Client();
        $log = m::mock('\Monolog\Logger')->shouldReceive('error')->once()->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/');

    }


    /**
     * @group ignore
     */
    public function test4xxErrorNonexistantEndpoint()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams['guzzleClient'] = new Client();
        $log = m::mock('\Monolog\Logger')
                ->shouldReceive('debug')
                ->times(6)->getMock()
                ->shouldReceive('info')
                ->times(4)->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);
        $ret = $connection->performRequest('GET', '/abc');

        $this->assertEquals(400, $ret['status']);

    }

    /**
     * @group ignore
     */
    public function testQueryParams()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams['guzzleClient'] = new Client();
        $log = m::mock('\Monolog\Logger')
               ->shouldReceive('debug')
               ->times(3)->getMock()
               ->shouldReceive('info')
               ->times(2)->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);
        $params['pretty'] = 'true';

        $ret = $connection->performRequest('GET', '/', $params);

        $this->assertEquals(200, $ret['status']);

        $expectedURI = 'http://localhost:9200/?pretty=true';
        $this->assertEquals($expectedURI, $ret['info']['url']);

    }

    /**
     * @group ignore
     */
    public function testQueryURI()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams['guzzleClient'] = new Client();
        $log = m::mock('\Monolog\Logger')
               ->shouldReceive('debug')
               ->times(3)->getMock()
               ->shouldReceive('info')
               ->times(2)->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);

        $ret = $connection->performRequest('GET', '/_cluster/nodes/');

        $expectedURI = 'http://localhost:9200/_cluster/nodes/';
        $this->assertEquals($expectedURI, $ret['info']['url']);

    }

    /**
     * @group ignore
     */
    public function test4xxErrorInvalidIndexAndQueryBody()
    {
        $hostDetails = array('host' => 'localhost', 'port' => 9200);
        $connectionParams['guzzleClient'] = new Client();
        $log = m::mock('\Monolog\Logger')
               ->shouldReceive('debug')
               ->times(6)->getMock()
               ->shouldReceive('info')
               ->times(4)->getMock();

        $connection = new GuzzleConnection($hostDetails, $connectionParams, $log, $log);

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


    }
}