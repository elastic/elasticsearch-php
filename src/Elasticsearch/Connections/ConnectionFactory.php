<?php
/**
 * User: zach
 * Date: 9/19/13
 * Time: 1:29 PM
 */

namespace Elasticsearch\Connections;

use Elasticsearch\Common\AbstractFactory;

class ConnectionFactory extends AbstractFactory
{
    /**
     * @param string $host
     * @param int $port
     *
     * @return AbstractConnection
     */
    public function create($host, $port)
    {
        return $this->container['connection'](
            $host,
            $port,
            $this->container['connectionParamsShared'],
            $this->container['logObject'],
            $this->container['traceObject']
        );
    }
}