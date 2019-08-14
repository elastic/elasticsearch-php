<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

/**
 * Class ClusterNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\ClusterNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClusterNamespace extends AbstractNamespace
{
    /**
     * Endpoint: cluster.health
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-health.html
     *
     * $params[
     *   'index'                           => '(list) Limit the information returned to a specific index',
     *   'expand_wildcards'                => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = all)',
     *   'level'                           => '(enum) Specify the level of detail for returned information (Options = cluster,indices,shards) (Default = cluster)',
     *   'local'                           => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout'                  => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'                         => '(time) Explicit operation timeout',
     *   'wait_for_active_shards'          => '(string) Wait until the specified number of shards is active',
     *   'wait_for_nodes'                  => '(string) Wait until the specified number of nodes is available',
     *   'wait_for_events'                 => '(enum) Wait until all currently queued events with the given priority are processed (Options = immediate,urgent,high,normal,low,languid)',
     *   'wait_for_no_relocating_shards'   => '(boolean) Whether to wait until there are no relocating shards in the cluster',
     *   'wait_for_no_initializing_shards' => '(boolean) Whether to wait until there are no initializing shards in the cluster',
     *   'wait_for_status'                 => '(enum) Wait until cluster is in a specific state (Options = green,yellow,red)',
     * ]
     * @return callable|array
     */
    public function health(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Health $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Health');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.reroute
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-reroute.html
     *
     * $params[
     *   'body'           => '(string) The definition of `commands` to perform (`move`, `cancel`, `allocate`)',
     *   'dry_run'        => '(boolean) Simulate the operation only and return the resulting state',
     *   'explain'        => '(boolean) Return an explanation of why the commands can or cannot be executed',
     *   'retry_failed'   => '(boolean) Retries allocation of shards that are blocked due to too many subsequent allocation failures',
     *   'metric'         => '(list) Limit the information returned to the specified metrics. Defaults to all but metadata (Options = _all,blocks,metadata,nodes,routing_table,master_node,version)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'        => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function reroute(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Reroute $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Reroute');
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.state
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-state.html
     *
     * $params[
     *   'index'                     => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'metric'                    => '(list) Limit the information returned to the specified metrics',
     *   'local'                     => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout'            => '(time) Specify timeout for connection to master',
     *   'flat_settings'             => '(boolean) Return settings in flat format (default: false)',
     *   'wait_for_metadata_version' => '(number) Wait for the metadata version to be equal or greater than the specified metadata version',
     *   'wait_for_timeout'          => '(time) The maximum time to wait for wait_for_metadata_version before timing out',
     *   'ignore_unavailable'        => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'          => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'          => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
     * @return callable|array
     */
    public function state(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $metric = $this->extractArgument($params, 'metric');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\State $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\State');
        $endpoint->setParams($params)
            ->setIndex($index)
            ->setMetric($metric);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-stats.html
     *
     * $params[
     *   'node_id'       => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'flat_settings' => '(boolean) Return settings in flat format (default: false)',
     *   'timeout'       => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function stats(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Stats $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Stats');
        $endpoint->setNodeID($nodeID)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.put_settings
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-update-settings.html
     *
     * $params[
     *   'body'           => '(string) The settings to be updated. Can be either `transient` or `persistent` (survives cluster restart). (Required)',
     *   'flat_settings'  => '(boolean) Return settings in flat format (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'        => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function putSettings(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Settings\Put');
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.get_settings
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-update-settings.html
     *
     * $params[
     *   'flat_settings'    => '(boolean) Return settings in flat format (default: false)',
     *   'master_timeout'   => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'          => '(time) Explicit operation timeout',
     *   'include_defaults' => '(boolean) Whether to return all default clusters setting. (Default = false)',
     * ]
     * @return callable|array
     */
    public function getSettings(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\Settings\Get');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.pending_tasks
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-pending.html
     *
     * $params[
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
     * @return callable|array
     */
    public function pendingTasks(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\PendingTasks $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\PendingTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.allocation_explain
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-allocation-explain.html
     *
     * $params[
     *   'body'                  => '(string) The index, shard, and primary flag to explain. Empty means 'explain the first unassigned shard'',
     *   'include_yes_decisions' => '(boolean) Return 'YES' decisions in explanation (default: false)',
     *   'include_disk_info'     => '(boolean) Return information about disk usage and shard sizes (default: false)',
     * ]
     * @return callable|array
     */
    public function allocationExplain(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\AllocationExplain $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\AllocationExplain');
        $endpoint->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cluster.remote_info
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-remote-info.html
     *
     * @return callable|array
     */
    public function remoteInfo(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cluster\RemoteInfo $endpoint
*/
        $endpoint = $endpointBuilder('Cluster\RemoteInfo');

        return $this->performRequest($endpoint);
    }
}
