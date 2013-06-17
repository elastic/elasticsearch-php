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
    /** @var  Client */
    private $client;

    private $document;
    private $largeDocument;
    private $mediumDocument;

    protected function setUp()
    {
        $this->client = new Client();
        $indexParams['index']  = 'benchmarking_index';
        $this->client->indices()->create($indexParams);

        $this->document = array();
        $this->document['body']  = array('testField' => 'abc');
        $this->document['index'] = 'benchmarking_index';
        $this->document['type']  = 'test';

        $this->mediumDocument = array();
        $this->mediumDocument['body']['testField'] = str_repeat('a', 5000);
        $this->mediumDocument['index']             = 'benchmarking_index';
        $this->mediumDocument['type']              = 'test';

        $this->largeDocument = array();
        $this->largeDocument['body']['testField'] = str_repeat('a', 10000);
        $this->largeDocument['index']             = 'benchmarking_index';
        $this->largeDocument['type']              = 'test';

    }

    protected function tearDown()
    {
        $indexParams['index']  = 'benchmarking_index';
        $this->client->indices()->delete($indexParams);
    }


    /**
     * @iterations 1000
     */
    public function curlMultiHandleIndexing()
    {
        $this->client->index($this->document);
    }

    /**
     * @iterations 1000
     */
    public function curlMultiHandleIndexingMedium()
    {
        $this->client->index($this->mediumDocument);
    }

    /**
     * @iterations 1000
     */
    public function curlMultiHandleIndexingLarge()
    {
        $this->client->index($this->largeDocument);
    }
}