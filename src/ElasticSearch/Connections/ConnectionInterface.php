<?php
/**
 * User: zach
 * Date: 5/3/13
 * Time: 11:42 AM
 */

namespace ElasticSearch\Connections;

interface ConnectionInterface
{
    public function __construct($host, $port);
}