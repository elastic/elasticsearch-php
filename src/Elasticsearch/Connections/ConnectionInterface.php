<?php
/**
 * User: zach
 * Date: 5/3/13
 * Time: 11:42 AM
 */

namespace Elasticsearch\Connections;

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
    public function __construct($host, $port, $connectionParams);
    public function getTransportSchema();
    public function performRequest($method, $uri, $params=null, $body=null);
}