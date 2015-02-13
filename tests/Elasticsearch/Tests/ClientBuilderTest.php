<?php


namespace Elasticsearch\Tests;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }


    public function testSimple()
    {
        $clientBuilder = ClientBuilder::create();
        $client = $clientBuilder->setHosts(['127.0.0.1:9200'])->build();

        //$future = $client->search(['client' => ['future' => true]]);

        //$future = $client->search(['index' => 'abc', 'type' => 'abc', 'body' => []]);

        //$response = $future->wait();

        $params = [
            'index' => 'test',
            'type' => 'test',
            'id' => 1,
            'client' => [
                'verbose' => true
            ]
        ];
        $response = $client->get($params);
        print_r($response);


    }
}