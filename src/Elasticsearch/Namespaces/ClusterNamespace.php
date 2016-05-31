<?php

namespace Elasticsearch\Namespaces;

/**
 * Class ClusterNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\ClusterNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ClusterNamespace extends AbstractNamespace
{
    /**
     * $params['index']                      = (list) Limit the information returned to a specific index
     *        ['level']                      = (enum) Specify the level of detail for returned information
     * (cluster,indices,shards) (default: cluster)
     *        ['local']                      = (boolean) Return local information, do not retrieve the state from
     * master node (default: false)
     *        ['master_timeout']             = (time) Explicit operation timeout for connection to master node
     *        ['timeout']                    = (time) Explicit operation timeout
     *        ['wait_for_active_shards']     = (number) Wait until the specified number of shards is active
     *        ['wait_for_nodes']             = (string) Wait until the specified number of nodes is available
     *        ['wait_for_relocating_shards'] = (number) Wait until the specified number of relocating shards is
     * finished
     *        ['wait_for_status']            = (enum) Wait until cluster is in a specific state (green,yellow,red)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function health($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Health $endpoint */
        $endpoint = $endpointBuilder('Cluster\Health');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['dry_run']         = (boolean) Simulate the operation only and return the resulting state
     *        ['explain']         = (boolean) Return an explanation of why the commands can or cannot be executed
     *        ['filter_metadata'] = (boolean) Don't return cluster state metadata (default: false)
     *        ['metric']          = (list) Limit the information returned to the specified metrics. Defaults to all but
     * metadata (_all,blocks,metadata,nodes,routing_table,master_node,version)
     *        ['master_timeout']  = (time) Explicit operation timeout for connection to master node
     *        ['timeout']         = (time) Explicit operation timeout
     *        ['body']            = The definition of `commands` to perform (`move`, `cancel`, `allocate`)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function reroute($params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Reroute $endpoint */
        $endpoint = $endpointBuilder('Cluster\Reroute');
        $endpoint->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['metric']             = (list) Limit the information returned to the specified metrics
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout']     = (time) Specify timeout for connection to master
     *        ['flat_settings']      = (boolean) Return settings in flat format (default: false)
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function state($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $metric = $this->extractArgument($params, 'metric');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\State $endpoint */
        $endpoint = $endpointBuilder('Cluster\State');
        $endpoint->setParams($params)
                 ->setIndex($index)
                 ->setMetric($metric);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['node_id']       = (list) A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to, leave empty to get information from all
     * nodes
     *        ['flat_settings'] = (boolean) Return settings in flat format (default: false)
     *        ['human']         = (boolean) Whether to return time and byte values in human-readable format. (default:
     * false)
     *        ['timeout']       = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function stats($params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Stats $endpoint */
        $endpoint = $endpointBuilder('Cluster\Stats');
        $endpoint->setNodeID($nodeID)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['flat_settings']  = (boolean) Return settings in flat format (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['body']           = The settings to be updated. Can be either `transient` or `persistent` (survives
     * cluster restart).
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putSettings($params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint */
        $endpoint = $endpointBuilder('Cluster\Settings\Put');
        $endpoint->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['flat_settings']  = (boolean) Return settings in flat format (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params
     *
     * @return array
     */
    public function getSettings($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint */
        $endpoint = $endpointBuilder('Cluster\Settings\Get');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function pendingTasks($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\PendingTasks $endpoint */
        $endpoint = $endpointBuilder('Cluster\PendingTasks');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }
}
