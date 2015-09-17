<?php

namespace Elasticsearch\Tests;

use Elasticsearch;
use Elasticsearch\ClientBuilder;
use Mockery as m;

/**
 * Class ClientTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testOneGoodOneBadHostNoException()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(['127.0.0.1:80', $_SERVER['ES_TEST_HOST']])->build();

        // Perform three requests to make sure the bad host is tried at least once
        $client->info();
        $client->info();
        $client->info();
    }

    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function testOneGoodOneBadHostNoRetryException()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(['127.0.0.1:80', $_SERVER['ES_TEST_HOST']])->setRetries(0)->build();

        // Perform three requests to make sure the bad host is tried at least once
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
    }

    /**
     * @expectedException Elasticsearch\Common\Exceptions\NoNodesAvailableException
     */
    public function testBadHost()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(['127.0.0.1:80'])->build();
        $response = $client->info();
    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function testConstructorIllegalPort()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(['localhost:abc'])->build();
    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     */
    public function testZeroRetries()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts(['127.0.0.1:80'])->setRetries(0)->build();
        $client->exists(array("index" => 'test', 'type' => 'test', 'id' => 'test'));
    }

    public function testCustomQueryParams()
    {
        $params = array();

        $client = Elasticsearch\ClientBuilder::create()->setHosts([$_SERVER['ES_TEST_HOST']])->build();

        $getParams = array(
            'index' => 'test',
            'type' => 'test',
            'id' => 1,
            'parent' => 'abc',
            'custom' => array('customToken' => 'abc', 'otherToken' => 123)
        );
        $exists = $client->exists($getParams);
    }

    public function testFromConfig()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'handler' => ClientBuilder::singleHandler()
        ];
        $client = ClientBuilder::fromConfig($params);
    }

    /**
     * @expectedException \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function testFromConfigBadParam()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'imNotReal' => 5
        ];
        $client = ClientBuilder::fromConfig($params);
    }

    public function testFromConfigBadParamQuiet()
    {
        $params = [
            'hosts' => [
                'localhost:9200'
            ],
            'retries' => 2,
            'imNotReal' => 5
        ];
        $client = ClientBuilder::fromConfig($params, true);
    }
}
