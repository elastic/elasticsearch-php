<?php

declare(strict_types = 1);

namespace Elasticsearch\ConnectionPool;

use Elasticsearch\Connections\ConnectionInterface;

/**
 * ConnectionPoolInterface
 *
 * @category Elasticsearch
 * @package  Elasticsearch\ConnectionPool
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
interface ConnectionPoolInterface
{
    /**
     * @param bool $force
     *
     * @return ConnectionInterface
     */
    public function nextConnection($force = false);

    /**
     * @return void
     */
    public function scheduleCheck();
}
