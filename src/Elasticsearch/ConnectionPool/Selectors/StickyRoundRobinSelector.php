<?php
/**
 * User: zach
 * Date: 9/24/13
 * Time: 9:38 AM
 */

namespace Elasticsearch\ConnectionPool\Selectors;


use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class StickyRoundRobinSelector
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool\Selectors\ConnectionPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class StickyRoundRobinSelector implements SelectorInterface
{

    /**
     * @var int
     */
    private $current = 0;


    /**
     * Use current connection unless it is dead, otherwise round-robin
     *
     * @param array $connections Array of connections to choose from
     *
     * @return ConnectionInterface
     */
    public function select($connections)
    {
        /** @var ConnectionInterface[] $connections */
        if ($connections[$this->current]->isAlive()) {
            return $connections[$this->current];
        }

        $this->current += 1;

        return $connections[$this->current % count($connections)];

    }

}