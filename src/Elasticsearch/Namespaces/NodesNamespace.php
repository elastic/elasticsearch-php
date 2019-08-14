<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

/**
 * Class NodesNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\NodesNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class NodesNamespace extends AbstractNamespace
{
    /**
     * Endpoint: nodes.stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-stats.html
     *
     * $params[
     *   'metric'                     => '(list) Limit the information returned to the specified metrics',
     *   'index_metric'               => '(list) Limit the information returned for `indices` metric to the specific index metrics. Isn't used if `indices` (or `all`) metric isn't specified.',
     *   'node_id'                    => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'completion_fields'          => '(list) A comma-separated list of fields for `fielddata` and `suggest` index metric (supports wildcards)',
     *   'fielddata_fields'           => '(list) A comma-separated list of fields for `fielddata` index metric (supports wildcards)',
     *   'fields'                     => '(list) A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)',
     *   'groups'                     => '(boolean) A comma-separated list of search groups for `search` index metric',
     *   'level'                      => '(enum) Return indices stats aggregated at index, node or shard level (Options = indices,node,shards) (Default = node)',
     *   'types'                      => '(list) A comma-separated list of document types for the `indexing` index metric',
     *   'timeout'                    => '(time) Explicit operation timeout',
     *   'include_segment_file_sizes' => '(boolean) Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested) (Default = false)',
     * ]
     * @return callable|array
     */
    public function stats(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');
        $index_metric = $this->extractArgument($params, 'index_metric');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Nodes\Stats $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Nodes\Stats');
        $endpoint->setNodeID($nodeID)
            ->setMetric($metric)
            ->setIndexMetric($index_metric)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: nodes.usage
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-usage.html
     *
     * $params[
     *   'metric'  => '(list) Limit the information returned to the specified metrics',
     *   'node_id' => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'timeout' => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function usage(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Nodes\Usage $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Nodes\Usage');
        $endpoint->setNodeID($nodeID)->setMetric($metric);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: nodes.info
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-info.html
     *
     * $params[
     *   'node_id'       => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'metric'        => '(list) A comma-separated list of metrics you wish returned. Leave empty to return all.',
     *   'flat_settings' => '(boolean) Return settings in flat format (default: false)',
     *   'timeout'       => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function info(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        $metric = $this->extractArgument($params, 'metric');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Nodes\Info $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Nodes\Info');
        $endpoint->setNodeID($nodeID)->setMetric($metric);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: nodes.hot_threads
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-hot-threads.html
     *
     * $params[
     *   'node_id'             => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'interval'            => '(time) The interval for the second sampling of threads',
     *   'snapshots'           => '(number) Number of samples of thread stacktrace (default: 10)',
     *   'threads'             => '(number) Specify the number of threads to provide information for (default: 3)',
     *   'ignore_idle_threads' => '(boolean) Don't show threads that are in known-idle places, such as waiting on a socket select or pulling from an empty task queue (default: true)',
     *   'type'                => '(enum) The type to sample (default: cpu) (Options = cpu,wait,block)',
     *   'timeout'             => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function hotThreads(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Nodes\HotThreads $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Nodes\HotThreads');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: nodes.reload_secure_settings
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/secure-settings.html#reloadable-secure-settings
     *
     * $params[
     *   'node_id' => '(list) A comma-separated list of node IDs to span the reload/reinit call. Should stay empty because reloading usually involves all cluster nodes.',
     *   'timeout' => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function reloadSecureSettings(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Nodes\ReloadSecureSettings $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Nodes\ReloadSecureSettings');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
