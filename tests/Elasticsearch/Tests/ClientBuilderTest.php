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
        $clientBuilder->setHosts(['127.0.0.1:9200'])->build();

        //$future = $client->search(['client' => ['future' => true]]);

        //$future = $client->search(['index' => 'abc', 'type' => 'abc', 'body' => []]);

        //$response = $future->wait();

        $params = [
            'index' => 'my_index',
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        $response = $client->indices()->create($params);
        print_r($response);


    }
}