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
     * Endpoint: cat.aliases
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-alias.html
     *
     * $params[
     *   'name'           => '(list) A comma-separated list of alias names to return',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.allocation
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-allocation.html
     *
     * $params[
     *   'node_id'        => '(list) A comma-separated list of node IDs or names to limit the returned information',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'          => '(enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.count
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-count.html
     *
     * $params[
     *   'index'          => '(list) A comma-separated list of index names to limit the returned information',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.health
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-health.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'ts'             => '(boolean) Set to false to disable timestamping (Default = true)',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.help
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat.html
     *
     * $params[
     *   'help' => '(boolean) Return help information (Default = false)',
     *   's'    => '(list) Comma-separated list of column names or column aliases to sort by',
     * ]
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
     * Endpoint: cat.indices
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-indices.html
     *
     * $params[
     *   'index'                     => '(list) A comma-separated list of index names to limit the returned information',
     *   'format'                    => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'                     => '(enum) The unit in which to display byte values (Options = b,k,m,g)',
     *   'local'                     => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout'            => '(time) Explicit operation timeout for connection to master node',
     *   'h'                         => '(list) Comma-separated list of column names to display',
     *   'health'                    => '(enum) A health status ("green", "yellow", or "red" to filter only indices matching the specified health status (Options = green,yellow,red)',
     *   'help'                      => '(boolean) Return help information (Default = false)',
     *   'pri'                       => '(boolean) Set to true to return stats only for primary shards (Default = false)',
     *   's'                         => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'                         => '(boolean) Verbose mode. Display column headers (Default = false)',
     *   'include_unloaded_segments' => '(boolean) If set to true segment stats will include stats for segments that are not currently loaded into memory (Default = false)',
     * ]
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
     * Endpoint: cat.master
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-master.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.nodes
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-nodes.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'full_id'        => '(boolean) Return the full node ID instead of the shortened version (default: false)',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.nodeattrs
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-nodeattrs.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.pending_tasks
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-pending-tasks.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
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
 * @var \Elasticsearch\Endpoints\Cat\PendingTasks $endpoint
*/
        $endpoint = $endpointBuilder('Cat\PendingTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: cat.recovery
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-recovery.html
     *
     * $params[
     *   'index'          => '(list) A comma-separated list of index names to limit the returned information',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'          => '(enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.repositories
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-repositories.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (Default = false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.shards
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-shards.html
     *
     * $params[
     *   'index'          => '(list) A comma-separated list of index names to limit the returned information',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'          => '(enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.snapshots
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-snapshots.html
     *
     * $params[
     *   'repository'         => '(list) Name of repository from which to fetch the snapshot information',
     *   'format'             => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'ignore_unavailable' => '(boolean) Set to true to ignore unavailable snapshots (Default = false)',
     *   'master_timeout'     => '(time) Explicit operation timeout for connection to master node',
     *   'h'                  => '(list) Comma-separated list of column names to display',
     *   'help'               => '(boolean) Return help information (Default = false)',
     *   's'                  => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'                  => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.thread_pool
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-thread-pool.html
     *
     * $params[
     *   'thread_pool_patterns' => '(list) A comma-separated list of regular-expressions to filter the thread pools in the output',
     *   'format'               => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'size'                 => '(enum) The multiplier in which to display values (Options = ,k,m,g,t,p)',
     *   'local'                => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout'       => '(time) Explicit operation timeout for connection to master node',
     *   'h'                    => '(list) Comma-separated list of column names to display',
     *   'help'                 => '(boolean) Return help information (Default = false)',
     *   's'                    => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'                    => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.fielddata
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-fielddata.html
     *
     * $params[
     *   'fields'         => '(list) A comma-separated list of fields to return the fielddata size',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'          => '(enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     *   'fields'         => '(list) A comma-separated list of fields to return in the output',
     * ]
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
     * Endpoint: cat.plugins
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-plugins.html
     *
     * $params[
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.segments
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-segments.html
     *
     * $params[
     *   'index'  => '(list) A comma-separated list of index names to limit the returned information',
     *   'format' => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'bytes'  => '(enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)',
     *   'h'      => '(list) Comma-separated list of column names to display',
     *   'help'   => '(boolean) Return help information (Default = false)',
     *   's'      => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'      => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.tasks
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
     *
     * $params[
     *   'format'      => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'node_id'     => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'actions'     => '(list) A comma-separated list of actions that should be returned. Leave empty to return all.',
     *   'detailed'    => '(boolean) Return detailed task information (default: false)',
     *   'parent_task' => '(number) Return tasks with specified parent task id. Set to -1 to return all.',
     *   'h'           => '(list) Comma-separated list of column names to display',
     *   'help'        => '(boolean) Return help information (Default = false)',
     *   's'           => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'           => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
     * Endpoint: cat.templates
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/cat-templates.html
     *
     * $params[
     *   'name'           => '(string) A pattern that returned template names must match',
     *   'format'         => '(string) a short version of the Accept header, e.g. json, yaml',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'h'              => '(list) Comma-separated list of column names to display',
     *   'help'           => '(boolean) Return help information (Default = false)',
     *   's'              => '(list) Comma-separated list of column names or column aliases to sort by',
     *   'v'              => '(boolean) Verbose mode. Display column headers (Default = false)',
     * ]
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
