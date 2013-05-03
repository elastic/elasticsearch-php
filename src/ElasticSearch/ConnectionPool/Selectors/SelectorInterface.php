<?php
/**
 * User: zach
 * Date: 5/2/13
 * Time: 8:30 PM
 */

namespace ElasticSearch\ConnectionPool\Selectors;

interface SelectorInterface
{
    public function __construct();
    public function select($connections);
}