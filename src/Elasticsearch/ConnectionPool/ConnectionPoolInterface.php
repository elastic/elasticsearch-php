<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tongz
 * Date: 2/13/15
 * Time: 12:06 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Elasticsearch\ConnectionPool;


use Elasticsearch\Connections\ConnectionInterface;

interface ConnectionPoolInterface {

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