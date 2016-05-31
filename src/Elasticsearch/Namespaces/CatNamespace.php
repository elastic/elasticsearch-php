<?php

namespace Elasticsearch\Namespaces;

/**
 * Class CatNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\CatNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class CatNamespace extends AbstractNamespace
{
    /**
     * $params['name']           = (list) A comma-separated list of alias names to return
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function aliases($params = [])
    {
        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Aliases $endpoint */
        $endpoint = $endpointBuilder('Cat\Aliases');
        $endpoint->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['node_id']        = (list) A comma-separated list of node IDs or names to limit the returned information
     *        ['bytes']          = (enum) The unit in which to display byte values (b,k,m,g)
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function allocation($params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Allocation $endpoint */
        $endpoint = $endpointBuilder('Cat\Allocation');
        $endpoint->setNodeId($nodeID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to limit the returned information
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function count($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Count $endpoint */
        $endpoint = $endpointBuilder('Cat\Count');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['ts']             = (boolean) Set to false to disable timestamping (default: true)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function health($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Health $endpoint */
        $endpoint = $endpointBuilder('Cat\Health');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['help'] = (boolean) Return help information(default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function help($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Help $endpoint */
        $endpoint = $endpointBuilder('Cat\Help');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to limit the returned information
     *        ['bytes']          = (enum) The unit in which to display byte values (b,k,m,g)
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['pri']            = (boolean) Set to true to return stats only for primary shards (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function indices($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Indices $endpoint */
        $endpoint = $endpointBuilder('Cat\Indices');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function master($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Master $endpoint */
        $endpoint = $endpointBuilder('Cat\Master');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodes($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Nodes $endpoint */
        $endpoint = $endpointBuilder('Cat\Nodes');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function nodeAttrs($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\NodeAttrs $endpoint */
        $endpoint = $endpointBuilder('Cat\NodeAttrs');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function pendingTasks($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\PendingTasks $endpoint */
        $endpoint = $endpointBuilder('Cat\PendingTasks');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to limit the returned information
     *        ['bytes']          = (enum) The unit in which to display byte values (b,k,m,g)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function recovery($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Recovery $endpoint */
        $endpoint = $endpointBuilder('Cat\Recovery');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function repositories($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Repositories $endpoint */
        $endpoint = $endpointBuilder('Cat\Repositories');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to limit the returned information
     *        ['bytes']          = (enum) The unit in which to display byte values
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function shards($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Shards $endpoint */
        $endpoint = $endpointBuilder('Cat\Shards');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']         = (list) Name of repository from which to fetch the snapshot information (Required)
     *        ['local']              = (bool) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['ignore_unavailable'] = (boolean) Set to true to ignore unavailable snapshots (default: false)
     *        ['master_timeout']     = (time) Explicit operation timeout for connection to master node
     *        ['h']                  = (list) Comma-separated list of column names to display
     *        ['help']               = (boolean) Return help information (default: false)
     *        ['v']                  = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function snapshots($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Snapshots $endpoint */
        $endpoint = $endpointBuilder('Cat\Snapshots');
        $endpoint->setRepository($repository);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *        ['full_id']        = (boolean) Enables displaying the complete node ids (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function threadPool($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\ThreadPool $endpoint */
        $endpoint = $endpointBuilder('Cat\ThreadPool');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['fields']         = (list) A comma-separated list of fields to return in the output
     *        ['bytes']          = (enum) The unit in which to display byte values (b,k,m,g)
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function fielddata($params = [])
    {
        $fields = $this->extractArgument($params, 'fields');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\FieldData $endpoint */
        $endpoint = $endpointBuilder('Cat\FieldData');
        $endpoint->setFields($fields);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (boolean) Return help information (default: false)
     *        ['v']              = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function plugins($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Plugins $endpoint */
        $endpoint = $endpointBuilder('Cat\Plugins');
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index'] = (list) A comma-separated list of index names to limit the returned information
     *        ['h']     = (list) Comma-separated list of column names to display
     *        ['help']  = (boolean) Return help information (default: false)
     *        ['v']     = (boolean) Verbose mode. Display column headers (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function segments($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Cat\Segments $endpoint */
        $endpoint = $endpointBuilder('Cat\Segments');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }
}
