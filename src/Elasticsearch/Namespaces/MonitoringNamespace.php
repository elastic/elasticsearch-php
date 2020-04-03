<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class MonitoringNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MonitoringNamespace extends AbstractNamespace
{

    /**
     * $params['type']               = DEPRECATED (string) Default document type for items which don't provide one
     * $params['system_id']          = (string) Identifier of the monitored system
     * $params['system_api_version'] = (string) API Version of the monitored system
     * $params['interval']           = (string) Collection interval (e.g., '10s' or '10000ms') of the payload
     * $params['body']               = (array) The operation definition and data (action-data pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/monitor-elasticsearch-cluster.html
     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function bulk(array $params = [])
    {
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Monitoring\Bulk');
        $endpoint->setParams($params);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
