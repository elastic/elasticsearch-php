<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class DanglingIndicesNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DanglingIndicesNamespace extends AbstractNamespace
{

    /**
     * $params['index_uuid']       = (string) The UUID of the dangling index
     * $params['accept_data_loss'] = (boolean) Must be set to true in order to delete the dangling index
     * $params['timeout']          = (time) Explicit operation timeout
     * $params['master_timeout']   = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
     */
    public function deleteDanglingIndex(array $params = [])
    {
        $index_uuid = $this->extractArgument($params, 'index_uuid');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\DeleteDanglingIndex');
        $endpoint->setParams($params);
        $endpoint->setIndexUuid($index_uuid);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index_uuid']       = (string) The UUID of the dangling index
     * $params['accept_data_loss'] = (boolean) Must be set to true in order to import the dangling index
     * $params['timeout']          = (time) Explicit operation timeout
     * $params['master_timeout']   = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
     */
    public function importDanglingIndex(array $params = [])
    {
        $index_uuid = $this->extractArgument($params, 'index_uuid');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\ImportDanglingIndex');
        $endpoint->setParams($params);
        $endpoint->setIndexUuid($index_uuid);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
     */
    public function listDanglingIndices(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\ListDanglingIndices');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
