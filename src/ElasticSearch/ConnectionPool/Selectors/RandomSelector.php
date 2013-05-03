<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:02 PM
 */

namespace ElasticSearch\ConnectionPool\Selectors;

use ElasticSearch\Connections\ConnectionInterface;

/**
 * Class RandomSelector
 *
 * @category ElasticSearch
 * @package  ElasticSearch\Connections\ConnectionInterface
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class RandomSelector implements SelectorInterface
{


    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Select a random connection from the provided array
     *
     * @param array $connections Array of Connection objects
     *
     * @return ConnectionInterface
     */
    public function select($connections) {

        return $connections[array_rand($connections)];

    }//end select()
}