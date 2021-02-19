<?php

namespace Iprice\Elasticsearch\ConnectionPool\Selectors;

use Iprice\Elasticsearch\Connections\ConnectionInterface;

/**
 * Class RoundRobinSelector
 *
 * @category Elasticsearch
 * @package  Iprice\Elasticsearch\ConnectionPool\Selectors\ConnectionPool
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RoundRobinSelector implements SelectorInterface
{
    /**
     * @var int
     */
    private $current = 0;

    /**
     * Select the next connection in the sequence
     *
     * @param  ConnectionInterface[] $connections an array of ConnectionInterface instances to choose from
     *
     * @return \Iprice\Elasticsearch\Connections\ConnectionInterface
     */
    public function select($connections)
    {
        $this->current += 1;

        return $connections[$this->current % count($connections)];
    }
}
