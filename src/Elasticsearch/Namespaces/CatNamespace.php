<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

/**
 * Class CatNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\CatNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class CatNamespace extends AbstractNamespace
{
    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function aliases(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Aliases $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Aliases');
        $endpoint->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *
     * @return callable|array
     */
    public function allocation(array $params = [])
    {
        $nodeID = $this->extractArgument($params, 'node_id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Allocation $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Allocation');
        $endpoint->setNodeId($nodeID);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function count(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Count $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Count');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['ts']             = (bool) Set to false to disable timestamping
     *
     * @return callable|array
     */
    public function health(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Health $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Health');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['help'] = (bool) Return help information
     *
     * @return callable|array
     */
    public function help(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Help $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Help');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *        ['pri']            = (bool) Set to true to return stats only for primary shards
     *
     * @return callable|array
     */
    public function indices(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Indices $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Indices');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function master(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Master $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Master');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function nodes(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Nodes $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Nodes');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function nodeAttrs(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\NodeAttrs $endpoint
*/
        $endpoint = $endpointBuilder('Cat\NodeAttrs');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function pendingTasks(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\PendingTasks $endpoint
*/
        $endpoint = $endpointBuilder('Cat\PendingTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *
     * @return callable|array
     */
    public function recovery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Recovery $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Recovery');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function repositories(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Repositories $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Repositories');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *
     * @return callable|array
     */
    public function shards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Shards $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Shards');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *        ['repository']     = (string) Name of repository from which to fetch the snapshot information
     *
     * @return callable|array
     */
    public function snapshots(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Snapshots $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Snapshots');
        $endpoint->setRepository($repository);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['full_id']        = (bool) Enables displaying the complete node ids
     *        ['size']           = (enum) The multiplier in which to display values ([ "", "k", "m", "g", "t", "p" ])
     *
     * @return callable|array
     */
    public function threadPool(array $params = [])
    {
        $threadPoolPatterns = $this->extractArgument($params, 'thread_pool_patterns');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\ThreadPool $endpoint
*/
        $endpoint = $endpointBuilder('Cat\ThreadPool');
        $endpoint->setThreadPoolPatterns($threadPoolPatterns);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *        ['fields']         = (list) A comma-separated list of fields to return the fielddata size
     *
     * @return callable|array
     */
    public function fielddata(array $params = [])
    {
        $fields = $this->extractArgument($params, 'fields');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Fielddata $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Fielddata');
        $endpoint->setFields($fields);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function plugins(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Plugins $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Plugins');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function segments(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Segments $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Segments');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     *        ['node_id']        = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['format']         = (string) a short version of the Accept header, e.g. json, yaml
     *        ['actions']        = (list) A comma-separated list of actions that should be returned. Leave empty to return all.
     *        ['detailed']       = (boolean) Return detailed task information (default: false)
     *        ['parent_node']    = (string) Return tasks with specified parent node.
     *        ['parent_task']    = (number) Return tasks with specified parent task id. Set to -1 to return all.
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *
     * @return callable|array
     */
    public function tasks(array $params = [])
    {
        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Tasks $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Tasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']          = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['h']              = (list) Comma-separated list of column names to display
     *        ['help']           = (bool) Return help information
     *        ['v']              = (bool) Verbose mode. Display column headers
     *        ['bytes']          = (enum) The unit in which to display byte values
     *
     * @return callable|array
     */
    public function templates(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Cat\Templates $endpoint
*/
        $endpoint = $endpointBuilder('Cat\Templates');
        $endpoint->setName($name)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }
}
