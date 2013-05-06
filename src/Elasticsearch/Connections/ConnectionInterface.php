<?php
/**
 * User: zach
 * Date: 5/3/13
 * Time: 11:42 AM
 */

namespace Elasticsearch\Connections;

interface ConnectionInterface
{
    public function __construct($host, $port);
    public function getTransportSchema();
    public function performRequest($method, $uri, $params=null, $body=null);
}