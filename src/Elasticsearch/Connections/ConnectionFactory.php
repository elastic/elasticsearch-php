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
     * @param $hostDetails
     *
     * @return AbstractConnection
     */
    public function create($hostDetails)
    {
        return $this->container['connection'](
            $hostDetails,
            $this->container['connectionParamsShared'],
            $this->container['logObject'],
            $this->container['traceObject']
        );
    }
}