<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:02 PM
 */

namespace Elasticsearch\ConnectionPool\Selectors;


use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class RoundRobinSelector
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool\Selectors\ConnectionPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class RoundRobinSelector implements SelectorInterface
{

    /**
     * @var int
     */
    private $current = 0;


    /**
     * Select the next connectioion in the sequence
     *
     * @param array $connections Array of connections to choose from
     *
     * @return ConnectionInterface
     */
    public function select($connections)
    {
        $this->current += 1;

        return $connections[$this->current % count($connections)];

    }


}//end class