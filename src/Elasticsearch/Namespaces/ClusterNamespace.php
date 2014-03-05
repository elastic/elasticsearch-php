<?php
/**
 * User: zach
 * Date: 5/9/13
 * Time: 5:13 PM
 */

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
     * $params['fields']        = (list) A comma-separated list of fields for `fielddata` metric (supports wildcards)
     *        ['metric_family'] = (enum) Limit the information returned to a certain metric family
     *        ['metric']        = (enum) Limit the information returned for `indices` family to a specific metric
     *        ['node_id']       = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['all']           = (boolean) Return all available information
     *        ['clear']         = (boolean) Reset the default level of detail
     *        ['fs']            = (boolean) Return information about the filesystem
     *        ['http']          = (boolean) Return information about HTTP
     *        ['indices']       = (boolean) Return information about indices
     *        ['jvm']           = (boolean) Return information about the JVM
     *        ['network']       = (boolean) Return information about network
     *        ['os']            = (boolean) Return information about the operating system
     *        ['process']       = (boolean) Return information about the Elasticsearch process
     *        ['thread_pool']   = (boolean) Return information about the thread pool
     *        ['transport']     = (boolean) Return information about transport
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodeStats($params = array())
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        unset($params['node_id']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Node\Stats $endpoint */
        $endpoint = $endpointBuilder('Cluster\Node\Stats');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']                      = (string) Limit the information returned to a specific index
     *        ['level']                      = (enum) Specify the level of detail for returned information
     *        ['local']                      = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout']             = (time) Explicit operation timeout for connection to master node
     *        ['timeout']                    = (time) Explicit operation timeout
     *        ['wait_for_active_shards']     = (number) Wait until the specified number of shards is active
     *        ['wait_for_nodes']             = (number) Wait until the specified number of nodes is available
     *        ['wait_for_relocating_shards'] = (number) Wait until the specified number of relocating shards is finished
     *        ['wait_for_status']            = (enum) Wait until cluster is in a specific state
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function health($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Health $endpoint */
        $endpoint = $endpointBuilder('Cluster\Health');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['dry_run']         = (boolean) Simulate the operation only and return the resulting state
     *        ['filter_metadata'] = (boolean) Don't return cluster state metadata (default: false)
     *        ['body']            = (boolean) Don't return cluster state metadata (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function reroute($params = array())
    {
        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Reroute $endpoint */
        $endpoint = $endpointBuilder('Cluster\Reroute');
        $endpoint->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['node_id']     = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['all']         = (boolean) Return all available information
     *        ['clear']       = (boolean) Reset the default settings
     *        ['http']        = (boolean) Return information about HTTP
     *        ['jvm']         = (boolean) Return information about the JVM
     *        ['network']     = (boolean) Return information about network
     *        ['os']          = (boolean) Return information about the operating system
     *        ['plugin']      = (boolean) Return information about plugins
     *        ['process']     = (boolean) Return information about the Elasticsearch process
     *        ['settings']    = (boolean) Return information about node settings
     *        ['thread_pool'] = (boolean) Return information about the thread pool
     *        ['transport']   = (boolean) Return information about transport
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodeInfo($params = array())
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        unset($params['node_id']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Node\Info $endpoint */
        $endpoint = $endpointBuilder('Cluster\Node\Info');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['node_id']   = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['interval']  = (time) The interval for the second sampling of threads
     *        ['snapshots'] = (number) Number of samples of thread stacktrace (default: 10)
     *        ['threads']   = (number) Specify the number of threads to provide information for (default: 3)
     *        ['type']      = (enum) The type to sample (default: cpu)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodeHotThreads($params = array())
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        unset($params['node_id']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Node\HotThreads $endpoint */
        $endpoint = $endpointBuilder('Cluster\Node\HotThreads');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['filter_blocks']          = (boolean) Do not return information about blocks
     *        ['filter_index_templates'] = (boolean) Do not return information about index templates
     *        ['filter_indices']         = (list) Limit returned metadata information to specific indices
     *        ['filter_metadata']        = (boolean) Do not return information about indices metadata
     *        ['filter_nodes']           = (boolean) Do not return information about nodes
     *        ['filter_routing_table']   = (boolean) Do not return information about shard allocation (`routing_table` and `routing_nodes`)
     *        ['local']                  = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout']         = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function state($params = array())
    {

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\State $endpoint */
        $endpoint = $endpointBuilder('Cluster\State');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['node_id'] = (list) A comma-separated list of node IDs or names to perform the operation on; use `_local` to perform the operation on the node you're connected to, leave empty to perform the operation on all nodes
     *        ['delay']   = (time) Set the delay for the operation (default: 1s)
     *        ['exit']    = (boolean) Exit the JVM as well (default: true)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodeShutdown($params = array())
    {
        $nodeID = $this->extractArgument($params, 'node_id');
        unset($params['node_id']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Node\Shutdown $endpoint */
        $endpoint = $endpointBuilder('Cluster\Node\Shutdown');
        $endpoint->setNodeID($nodeID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['body'] = ()
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putSettings($params = array())
    {
        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint */
        $endpoint = $endpointBuilder('Cluster\Settings\Put');
        $endpoint->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * @param array $params
     *
     * @return array
     */
    public function getSettings($params = array())
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\Settings\Put $endpoint */
        $endpoint = $endpointBuilder('Cluster\Settings\Get');
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['local']   = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout']  = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function pendingTasks($params = array())
    {

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Cluster\PendingTasks $endpoint */
        $endpoint = $endpointBuilder('Cluster\PendingTasks');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }






}