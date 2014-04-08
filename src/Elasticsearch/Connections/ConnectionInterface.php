<?php
/**
 * User: zach
 * Date: 5/3/13
 * Time: 11:42 AM
 */

namespace Elasticsearch\Connections;

use Psr\Log\LoggerInterface;

/**
 * Interface ConnectionInterface
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Connections
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
interface ConnectionInterface
{
    public function __construct($hostDetails, $connectionParams, LoggerInterface $log, LoggerInterface $trace);

    public function getTransportSchema();

    public function isAlive();

    public function markAlive();

    public function markDead();

    public function getLastRequestInfo();

    public function performRequest($method, $uri, $params = null, $body = null);
}