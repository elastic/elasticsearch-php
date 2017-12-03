<?php

namespace Elasticsearch\Namespaces;


class XpackNamespace extends AbstractNamespace
{

    /**
     * @param array $params
     * @return array
     */
    public function get($params = array())
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Xpack\Get $endpoint */
        $endpoint = $endpointBuilder('Xpack\Get');

        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}