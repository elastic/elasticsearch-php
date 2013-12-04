<?php
/**
 * User: zach
 * Date: 6/14/13
 * Time: 11:13 AM
 */

namespace Elasticsearch\Benchmarks;

use \Athletic\AthleticEvent;
use Elasticsearch\Client;

class IndexingEvent extends AthleticEvent
{
    private $setupClient;

    /** @var  Client */
    private $client;

    /** @var  Client */
    private $guzzleClient;

    private $document;
    private $largeDocument;
    private $mediumDocument;

    protected function classSetUp()
    {
        $curlParams = array(
            'connectionClass' => '\Elasticsearch\Connections\CurlMultiConnection'
        );
        $this->client = new Client($curlParams);

        $guzzleParams = array(
            'connectionClass' => '\Elasticsearch\Connections\GuzzleConnection'
        );
        $this->guzzleClient = new Client($guzzleParams);


        $this->setupClient = new Client();
        $indexParams['index']  = 'benchmarking_index';
        $indexParams['body']['test']['_all']['enabled'] = false;
        $indexParams['body']['test']['properties']['testField'] = array(
            'type' => 'string',
            'store' => 'no',
            'index' => 'no'
        );

        $this->setupClient->indices()->create($indexParams);

        $this->document = array();
        $this->document['body']  = array('testField' => 'abc');
        $this->document['index'] = 'benchmarking_index';
        $this->document['type']  = 'test';

        $this->mediumDocument = array();
        $this->mediumDocument['body']['testField'] = str_repeat('a', 1000);
        $this->mediumDocument['index']             = 'benchmarking_index';
        $this->mediumDocument['type']              = 'test';

        $this->largeDocument = array();
        $this->largeDocument['body']['testField'] = str_repeat('a', 5000);
        $this->largeDocument['index']             = 'benchmarking_index';
        $this->largeDocument['type']              = 'test';

    }

    protected function classTearDown()
    {
        $indexParams['index']  = 'benchmarking_index';
        $this->setupClient->indices()->delete($indexParams);
    }


    /**
     * @iterations 100
     * @group small
     * @baseline
     */
    public function curlMultiHandleSmall()
    {
        $this->client->index($this->document);
    }

    /**
     * @iterations 100
     * @group medium
     * @baseline
     */
    public function curlMultiHandleMedium()
    {
        $this->client->index($this->mediumDocument);
    }

    /**
     * @iterations 100
     * @group large
     * @baseline
     */
    public function curlMultiHandleLarge()
    {
        $this->client->index($this->largeDocument);
    }

    /**
     * @iterations 100
     * @group small
     */
    public function guzzleSmall()
    {
        $this->guzzleClient->index($this->document);
    }

    /**
     * @iterations 100
     * @group medium
     */
    public function guzzleMedium()
    {
        $this->guzzleClient->index($this->mediumDocument);
    }


    /**
     * @iterations 100
     * @group large
     */
    public function guzzleLarge()
    {
        $this->guzzleClient->index($this->largeDocument);
    }

}