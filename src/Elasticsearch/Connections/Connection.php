<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\Connections;


class Connection implements ConnectionInterface
{
    const TRANSPORT_SCHEMA = 'http';

    public function __construct($host, $port=9200)
    {

    }

}