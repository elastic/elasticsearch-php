<?php


namespace Elasticsearch\Tests;
use Elasticsearch\Client;
use Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }


    public function testSimple()
    {
        error_reporting(E_NOTICE);
        $resp = json_decode("{\"sort\":-92233720368547758080000000000000000000000000000}");
        print_r($resp);
        print_r(json_last_error());
        exit;
        $client = Client::newBuilder()->setHosts(['127.0.0.1:9200'])->build();

        //$future = $client->search(['client' => ['future' => true]]);

        $future = $client->search(['index' => 'abc', 'type' => 'abc', 'body' => []]);

        $response = $future->wait();

        print_r($response);



    }
}