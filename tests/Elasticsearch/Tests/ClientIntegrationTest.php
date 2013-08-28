<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

/**
 * Class ClientIntegrationTest
 * @package Elasticsearch\Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientIntegrationTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @group ignore
     */
    public function testClient()
    {
        $client = new Elasticsearch\Client();
    }


    /**
     * Index a document then retrieve it with a get
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::get
     *
     * @return void
     * @group ignore
     */
    public function testIndexDocumentThenGet()
    {
        $client = new Elasticsearch\Client();

        $params = array();
        $params['body']  = array('testField' => 'abc');
        $params['index'] = 'test';
        $params['type']  = 'test';
        $ret = $client->index($params);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($params['index'], $ret['_index']);
        $this->assertEquals($params['type'], $ret['_type']);

        $getParams = array();
        $getParams['index'] = $params['index'];
        $getParams['type'] = $params['type'];
        $getParams['id'] = $ret['_id'];
        $retDoc = $client->get($getParams);

        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($params['body'], $retDoc['_source']);
        $this->assertEquals($ret['_id'], $retDoc['_id']);
        $this->assertEquals($params['index'], $retDoc['_index']);
        $this->assertEquals($params['type'], $retDoc['_type']);
        $this->assertEquals($ret['_version'], $retDoc['_version']);

    }


    /**
     * Index a document, with ID, then retrieve it with a get
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::get
     *
     * @return void
     * @group ignore
     */
    public function testIndexDocumentWithIDThenGet()
    {
        $client = new Elasticsearch\Client();
        $params = array();
        $params['body']  = array('testField' => 'abc');
        $params['index'] = 'test';
        $params['type']  = 'test';
        $params['id']    = (string)microtime(true);
        $ret = $client->index($params);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($params['index'], $ret['_index']);
        $this->assertEquals($params['type'], $ret['_type']);
        $this->assertEquals($params['id'], $ret['_id']);

        $getParams = array();
        $getParams['index'] = $params['index'];
        $getParams['type'] = $params['type'];
        $getParams['id'] = $params['id'];
        $retDoc = $client->get($getParams);

        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($params['body'], $retDoc['_source']);
        $this->assertEquals($ret['_id'], $retDoc['_id']);
        $this->assertEquals($params['index'], $retDoc['_index']);
        $this->assertEquals($params['type'], $retDoc['_type']);
        $this->assertEquals($ret['_version'], $retDoc['_version']);

    }//end testIndexDocumentWithIDThenGet()


    /**
     * Index a document, with ID, then retrieve it with a get
     * then delete it
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::get
     * @covers \Elasticsearch\Client::delete
     *
     * @return void
     * @group ignore
     */
    public function testIndexDocumentWithIDThenDeleteThenGet()
    {
        $client = new Elasticsearch\Client();
        $params = array();
        $params['body']  = array('testField' => 'abc');
        $params['index'] = 'test';
        $params['type']  = 'test';
        $params['id']    = (string)microtime(true);
        $ret = $client->index($params);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($params['index'], $ret['_index']);
        $this->assertEquals($params['type'], $ret['_type']);
        $this->assertEquals($params['id'], $ret['_id']);

        $getParams = array();
        $getParams['index'] = $params['index'];
        $getParams['type'] = $params['type'];
        $getParams['id'] = $params['id'];
        $retDoc = $client->get($getParams);

        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($params['body'], $retDoc['_source']);
        $this->assertEquals($ret['_id'], $retDoc['_id']);
        $this->assertEquals($params['index'], $retDoc['_index']);
        $this->assertEquals($params['type'], $retDoc['_type']);
        $this->assertEquals($ret['_version'], $retDoc['_version']);

        $deleteParams = array();
        $deleteParams['index'] = $params['index'];
        $deleteParams['type'] = $params['type'];
        $deleteParams['id'] = $params['id'];
        $retDelete = $client->delete($deleteParams);

        $this->assertEquals(1, $retDelete['ok']);
        $this->assertEquals(1, $retDelete['found']);
        $this->assertEquals($deleteParams['index'], $retDelete['_index']);

        $retDoc = $client->get($getParams);
        $this->assertNotEquals(1, $retDoc['exists']);


    }//end testIndexDocumentWithIDThenDeleteThenGet()


    /**
     * Index a document, then retrieve it with a search
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::search
     *
     * @return void
     * @group ignore
     */
    public function testIndexDocumentThenSearch()
    {
        $client = new Elasticsearch\Client();
        $indexParams['index']  = 'testintegrationindex'.microtime(true);
        $client->indices()->create($indexParams);

        usleep(500000); // @todo replace this with a legit call to cluster health API

        $params = array();
        $params['body']  = array('testField' => 'abc');
        $params['index'] = $indexParams['index'];
        $params['type']  = 'test';
        $params['refresh'] = true;
        $ret = $client->index($params);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($params['index'], $ret['_index']);
        $this->assertEquals($params['type'], $ret['_type']);

        $searchParams['index'] = $indexParams['index'];
        $searchParams['type']  = 'test';
        $searchParams['body']['query']['match'] =  $params['body'];
        $retDoc = $client->search($searchParams);

        $this->assertEquals($ret['_id'], $retDoc['hits']['hits'][0]['_id']);

        $deleteParams['index'] = $indexParams['index'];
        $client->indices()->delete($deleteParams);

    }//end testIndexDocumentThenSearch()
}