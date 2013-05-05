<?php
/**
 * User: zach
 * Date: 5/2/13
 * Time: 11:38 PM
 */

namespace Elasticsearch\ConnectionPool;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Connections\ConnectionInterface;

/**
 * Class DeadPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool\DeadPool
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class DeadPool
{
    /**
     * Pool of dead connections waiting to be resurrected
     *
     * @var array
     */
    private $deadPool = array();

    /**
     * Timeout value before a dead connection is retried
     *
     * @var int
     */
    private $deadTime;


    /**
     * Deadpool Constructor
     *
     * @param int $deadTime Timeout value before a dead connection is retried
     */
    public function __construct($deadTime=60)
    {
        $this->deadTime = $deadTime;

    }//end __construct()


    /**
     * Resurrect will return eligible dead nodes back to the connection pool
     *
     * @param bool $force If set to true, will force method
     * to resurrect at least one connection
     *
     * @return array
     */
    public function resurrect($force=false)
    {
        $deadPool    = $this->deadPool;
        $resurrected = array();

        if (count($deadPool) === 0) {
            return $resurrected;
        }

        $foundResurrected = false;
        foreach ($deadPool as $key => $value) {
            if ($value['time'] < time()) {
                $resurrected[] = $value['connection'];
                unset($deadPool[$key]);
                $foundResurrected = true;
            }
        }

        // We are being forced to resurrect, but no dead nodes were found as
        // eligible.  Time to just force one.
        if ($force === true && $foundResurrected === false) {
            $connection    = array_shift($deadPool);
            $resurrected[] = $connection['connection'];
        }

        return $resurrected;

    }//end resurrect()


    /**
     * Adds a connection to the deadpool
     *
     * @param ConnectionInterface $connection A connection to add to the deadpool
     * @param null|int            $time       Timestamp to begin the resurrection timer
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function markDead(ConnectionInterface $connection, $time=null)
    {
        if (isset($time) !== true) {
            $time = time();
        }
        $this->deadPool[] = array(
                             'connection' => $connection,
                             'time'       => $time + $this->deadTime,
                            );

    }//end markDead()


}//end class