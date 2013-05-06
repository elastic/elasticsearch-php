<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\Connections;


class Connection implements ConnectionInterface
{
    private $transportSchema = 'http';

    public function __construct($host, $port=9200)
    {

    }

    public function getTransportSchema()
    {
        return $this->transportSchema;
    }

    public function performRequest($method, $uri, $params=null, $body=null)
    {

    }

}