<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

/**
 * Class ClientIntegrationTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientIntegrationTest extends \PHPUnit_Framework_TestCase
{


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
     */
    public function testIndexDocumentThenGet()
    {
        $client = new Elasticsearch\Client();
        $doc    = array('testField' => 'abc');
        $index  = 'test';
        $type   = 'test';
        $ret    = $client->index($index, $type, $doc);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($index, $ret['_index']);
        $this->assertEquals($type, $ret['_type']);

        $retDoc = $client->get('test', $ret['_id']);

        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($doc, $retDoc['_source']);
        $this->assertEquals($ret['_id'], $retDoc['_id']);
        $this->assertEquals($index, $retDoc['_index']);
        $this->assertEquals($type, $retDoc['_type']);
        $this->assertEquals($ret['_version'], $retDoc['_version']);

    }//end testIndexDocumentThenGet()


    /**
     * Index a document, with ID, then retrieve it with a get
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::get
     *
     * @return void
     */
    public function testIndexDocumentWithIDThenGet()
    {
        $client = new Elasticsearch\Client();
        $doc    = array('testField' => 'abc');
        $index  = 'test';
        $type   = 'test';
        $id     = time();
        $ret    = $client->index($index, $type, $doc, $id);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($index, $ret['_index']);
        $this->assertEquals($type, $ret['_type']);
        $this->assertEquals($id, $ret['_id']);

        $retDoc = $client->get('test', $id);

        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($doc, $retDoc['_source']);
        $this->assertEquals($id, $retDoc['_id']);
        $this->assertEquals($index, $retDoc['_index']);
        $this->assertEquals($type, $retDoc['_type']);
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
     */
    public function testIndexDocumentWithIDThenDeleteThenGet()
    {
        $client = new Elasticsearch\Client();
        $doc    = array('testField' => 'abc');
        $index  = 'test';
        $type   = 'test';
        $id     = time();

        $ret    = $client->index($index, $type, $doc, $id);
        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($index, $ret['_index']);
        $this->assertEquals($type, $ret['_type']);
        $this->assertEquals($id, $ret['_id']);

        $retDoc = $client->get('test', $id);
        $this->assertEquals(1, $retDoc['exists']);
        $this->assertEquals($doc, $retDoc['_source']);
        $this->assertEquals($id, $retDoc['_id']);
        $this->assertEquals($index, $retDoc['_index']);
        $this->assertEquals($type, $retDoc['_type']);
        $this->assertEquals($ret['_version'], $retDoc['_version']);

        $retDelete = $client->delete($index, $type, $id);
        $this->assertEquals(1, $retDelete['ok']);
        $this->assertEquals(1, $retDelete['found']);
        $this->assertEquals($index, $retDelete['_index']);

        $retDoc = $client->get('test', $id);
        $this->assertNotEquals(1, $retDoc['exists']);


    }//end testIndexDocumentWithIDThenDeleteThenGet()


    /**
     * Index a document, then retrieve it with a search
     *
     * @covers \Elasticsearch\Client::index
     * @covers \Elasticsearch\Client::search
     *
     * @return void
     */
    public function testIndexDocumentThenSearch()
    {
        $client = new Elasticsearch\Client();
        $index  = 'testintegrationindex'.microtime(true);
        $client->indices()->createIndex($index);

        usleep(500000); // @todo replace this with a legit call to cluster health API

        $doc    = array('testField' => 'abc');
        $type   = 'test';
        $params = array('refresh' => true);
        $ret    = $client->index($index, $type, $doc, null, $params);

        $this->assertEquals(1, $ret['ok']);
        $this->assertEquals(1, $ret['_version']);
        $this->assertEquals($index, $ret['_index']);
        $this->assertEquals($type, $ret['_type']);

        $query['query']['match'] = $doc;
        $retDoc = $client->search($query, $index, $type);

        $this->assertEquals($ret['_id'], $retDoc['hits']['hits'][0]['_id']);

        $client->indices()->deleteIndex($index);

    }//end testIndexDocumentThenSearch()
}