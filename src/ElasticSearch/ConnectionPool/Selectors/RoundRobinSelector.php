<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:02 PM
 */

namespace ElasticSearch\ConnectionPool\Selectors;


class RoundRobinSelector implements SelectorInterface
{

    protected $connections;

    public function __construct($connections)
    {

    }
}