<?php

namespace Elasticsearch\ConnectionPool\Selectors;

interface SelectorInterface
{
    public function select($connections);
}
