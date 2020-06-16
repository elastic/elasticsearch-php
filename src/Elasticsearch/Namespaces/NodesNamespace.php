<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class NodesNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NodesNamespace extends AbstractNamespace
{

    /**
     * $params['node_id']             = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['interval']            = (time) The interval for the second sampling of threads
     * $params['snapshots']           = (number) Number of samples of thread stacktrace (default: 10)
     * $params['threads']             = (number) Specify the number of threads to provide information for (default: 3)
     * $params['ignore_idle_threads'] = (boolean) Don't show threads that are in known-idle places, such as waiting on a socket select or pulling from an empty task queue (default: true)
     * $params['type']                = (enum) The type to sample (default: cpu) (Options = cpu,wait,block)
     * $params['timeout']             = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-hot-threads.html
     */
    public function hotThreads(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Nodes\HotThreads');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['node_id']       = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['metric']        = (list) A comma-separated list of metrics you wish returned. Leave empty to return all.
     * $params['flat_settings'] = (boolean) Return settings in flat format (default: false)
     * $params['timeout']       = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-info.html
     */
    public function info(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Nodes\Info');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);
        $endpoint->setMetric($metric);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['node_id'] = (list) A comma-separated list of node IDs to span the reload/reinit call. Should stay empty because reloading usually involves all cluster nodes.
     * $params['timeout'] = (time) Explicit operation timeout
     * $params['body']    = (array) An object containing the password for the elasticsearch keystore
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/secure-settings.html#reloadable-secure-settings
     */
    public function reloadSecureSettings(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Nodes\ReloadSecureSettings');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['node_id']                    = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['metric']                     = (list) Limit the information returned to the specified metrics
     * $params['index_metric']               = (list) Limit the information returned for `indices` metric to the specific index metrics. Isn't used if `indices` (or `all`) metric isn't specified.
     * $params['completion_fields']          = (list) A comma-separated list of fields for `fielddata` and `suggest` index metric (supports wildcards)
     * $params['fielddata_fields']           = (list) A comma-separated list of fields for `fielddata` index metric (supports wildcards)
     * $params['fields']                     = (list) A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)
     * $params['groups']                     = (boolean) A comma-separated list of search groups for `search` index metric
     * $params['level']                      = (enum) Return indices stats aggregated at index, node or shard level (Options = indices,node,shards) (Default = node)
     * $params['types']                      = (list) A comma-separated list of document types for the `indexing` index metric
     * $params['timeout']                    = (time) Explicit operation timeout
     * $params['include_segment_file_sizes'] = (boolean) Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested) (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-stats.html
     */
    public function stats(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');
        $index_metric = $this->extractArgument($params, 'index_metric');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Nodes\Stats');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);
        $endpoint->setMetric($metric);
        $endpoint->setIndexMetric($index_metric);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['node_id'] = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['metric']  = (list) Limit the information returned to the specified metrics
     * $params['timeout'] = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-usage.html
     */
    public function usage(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Nodes\Usage');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);
        $endpoint->setMetric($metric);

        return $this->performRequest($endpoint);
    }
}
