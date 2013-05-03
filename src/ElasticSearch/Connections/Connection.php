<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace ElasticSearch\Connections;


class Connection {
    public function __construct($params, $host, $port)
    {
        print_r(func_get_args());
    }
}