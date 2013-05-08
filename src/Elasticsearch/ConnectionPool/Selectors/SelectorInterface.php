<?php
/**
 * User: zach
 * Date: 5/2/13
 * Time: 8:30 PM
 */

namespace Elasticsearch\ConnectionPool\Selectors;

interface SelectorInterface
{
    public function select($connections);
}