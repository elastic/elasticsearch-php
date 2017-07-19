<?php

namespace Elasticsearch\Namespaces;

use Elasticsearch\Endpoints\Remote\Info;

/**
 * Class RemoteNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\TasksNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RemoteNamespace extends AbstractNamespace
{
    /**
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function info($params = array())
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Info $endpoint */
        $endpoint = $endpointBuilder('Remote\Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
