<?php
declare(strict_types = 1);

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\BadMethodCallException;
use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\NoNodesAvailableException;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Namespaces\AbstractNamespace;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Namespaces\BooleanRequestWrapper;
use Elasticsearch\Namespaces\CatNamespace;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\IngestNamespace;
use Elasticsearch\Namespaces\NodesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Elasticsearch\Namespaces\TasksNamespace;
use Elasticsearch\Namespaces\AsyncSearchNamespace;
use Elasticsearch\Namespaces\AutoscalingNamespace;
use Elasticsearch\Namespaces\CcrNamespace;
use Elasticsearch\Namespaces\DataFrameTransformDeprecatedNamespace;
use Elasticsearch\Namespaces\EnrichNamespace;
use Elasticsearch\Namespaces\EqlNamespace;
use Elasticsearch\Namespaces\GraphNamespace;
use Elasticsearch\Namespaces\IlmNamespace;
use Elasticsearch\Namespaces\LicenseNamespace;
use Elasticsearch\Namespaces\MigrationNamespace;
use Elasticsearch\Namespaces\MlNamespace;
use Elasticsearch\Namespaces\MonitoringNamespace;
use Elasticsearch\Namespaces\RollupNamespace;
use Elasticsearch\Namespaces\SearchableSnapshotsNamespace;
use Elasticsearch\Namespaces\SecurityNamespace;
use Elasticsearch\Namespaces\SlmNamespace;
use Elasticsearch\Namespaces\SqlNamespace;
use Elasticsearch\Namespaces\SslNamespace;
use Elasticsearch\Namespaces\TransformNamespace;
use Elasticsearch\Namespaces\WatcherNamespace;
use Elasticsearch\Namespaces\XpackNamespace;

/**
 * Class Client
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Client
{
    const VERSION = '7.8';

    /**
     * @var Transport
     */
    public $transport;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var callable
     */
    protected $endpoints;

    /**
     * @var NamespaceBuilderInterface[]
     */
    protected $registeredNamespaces = [];

    /**
     * @var CatNamespace
     */
    protected $cat;
    
    /**
     * @var ClusterNamespace
     */
    protected $cluster;
    
    /**
     * @var IndicesNamespace
     */
    protected $indices;
    
    /**
     * @var IngestNamespace
     */
    protected $ingest;
    
    /**
     * @var NodesNamespace
     */
    protected $nodes;
    
    /**
     * @var SnapshotNamespace
     */
    protected $snapshot;
    
    /**
     * @var TasksNamespace
     */
    protected $tasks;
    
    /**
     * @var AsyncSearchNamespace
     */
    protected $asyncSearch;
    
    /**
     * @var AutoscalingNamespace
     */
    protected $autoscaling;
    
    /**
     * @var CcrNamespace
     */
    protected $ccr;
    
    /**
     * @var DataFrameTransformDeprecatedNamespace
     */
    protected $dataFrameTransformDeprecated;
    
    /**
     * @var EnrichNamespace
     */
    protected $enrich;
    
    /**
     * @var EqlNamespace
     */
    protected $eql;
    
    /**
     * @var GraphNamespace
     */
    protected $graph;
    
    /**
     * @var IlmNamespace
     */
    protected $ilm;
    
    /**
     * @var LicenseNamespace
     */
    protected $license;
    
    /**
     * @var MigrationNamespace
     */
    protected $migration;
    
    /**
     * @var MlNamespace
     */
    protected $ml;
    
    /**
     * @var MonitoringNamespace
     */
    protected $monitoring;
    
    /**
     * @var RollupNamespace
     */
    protected $rollup;
    
    /**
     * @var SearchableSnapshotsNamespace
     */
    protected $searchableSnapshots;
    
    /**
     * @var SecurityNamespace
     */
    protected $security;
    
    /**
     * @var SlmNamespace
     */
    protected $slm;
    
    /**
     * @var SqlNamespace
     */
    protected $sql;
    
    /**
     * @var SslNamespace
     */
    protected $ssl;
    
    /**
     * @var TransformNamespace
     */
    protected $transform;
    
    /**
     * @var WatcherNamespace
     */
    protected $watcher;
    
    /**
     * @var XpackNamespace
     */
    protected $xpack;
    

    /**
     * Client constructor
     *
     * @param Transport           $transport
     * @param callable            $endpoint
     * @param AbstractNamespace[] $registeredNamespaces
     */
    public function __construct(Transport $transport, callable $endpoint, array $registeredNamespaces)
    {
        $this->transport = $transport;
        $this->endpoints = $endpoint;
        $this->cat = new CatNamespace($transport, $endpoint);
        $this->cluster = new ClusterNamespace($transport, $endpoint);
        $this->indices = new IndicesNamespace($transport, $endpoint);
        $this->ingest = new IngestNamespace($transport, $endpoint);
        $this->nodes = new NodesNamespace($transport, $endpoint);
        $this->snapshot = new SnapshotNamespace($transport, $endpoint);
        $this->tasks = new TasksNamespace($transport, $endpoint);
        $this->asyncSearch = new AsyncSearchNamespace($transport, $endpoint);
        $this->autoscaling = new AutoscalingNamespace($transport, $endpoint);
        $this->ccr = new CcrNamespace($transport, $endpoint);
        $this->dataFrameTransformDeprecated = new DataFrameTransformDeprecatedNamespace($transport, $endpoint);
        $this->enrich = new EnrichNamespace($transport, $endpoint);
        $this->eql = new EqlNamespace($transport, $endpoint);
        $this->graph = new GraphNamespace($transport, $endpoint);
        $this->ilm = new IlmNamespace($transport, $endpoint);
        $this->license = new LicenseNamespace($transport, $endpoint);
        $this->migration = new MigrationNamespace($transport, $endpoint);
        $this->ml = new MlNamespace($transport, $endpoint);
        $this->monitoring = new MonitoringNamespace($transport, $endpoint);
        $this->rollup = new RollupNamespace($transport, $endpoint);
        $this->searchableSnapshots = new SearchableSnapshotsNamespace($transport, $endpoint);
        $this->security = new SecurityNamespace($transport, $endpoint);
        $this->slm = new SlmNamespace($transport, $endpoint);
        $this->sql = new SqlNamespace($transport, $endpoint);
        $this->ssl = new SslNamespace($transport, $endpoint);
        $this->transform = new TransformNamespace($transport, $endpoint);
        $this->watcher = new WatcherNamespace($transport, $endpoint);
        $this->xpack = new XpackNamespace($transport, $endpoint);

        $this->registeredNamespaces = $registeredNamespaces;
    }

    /**
     * $params['index']                  = (string) Default index for items which don't provide one
     * $params['type']                   = DEPRECATED (string) Default document type for items which don't provide one
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the bulk operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['_source']                = (list) True or false to return the _source field or not, or default list of fields to return, can be overridden on each sub-request
     * $params['_source_excludes']       = (list) Default list of fields to exclude from the returned _source field, can be overridden on each sub-request
     * $params['_source_includes']       = (list) Default list of fields to extract and return from the _source field, can be overridden on each sub-request
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['body']                   = (array) The operation definition and data (action-data pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-bulk.html
     */
    public function bulk(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Bulk');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['scroll_id'] = DEPRECATED (list) A comma-separated list of scroll IDs to clear
     * $params['body']      = (array) A comma-separated list of scroll IDs to clear if none was specified via the scroll_id parameter
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-body.html#_clear_scroll_api
     */
    public function clearScroll(array $params = [])
    {
        $scroll_id = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ClearScroll');
        $endpoint->setParams($params);
        $endpoint->setScrollId($scroll_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     * $params['type']               = DEPRECATED (list) A comma-separated list of types to restrict the results
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']   = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['min_score']          = (number) Include only documents with a specific `_score` value in the result
     * $params['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']            = (list) A comma-separated list of specific routing values
     * $params['q']                  = (string) Query in the Lucene query string syntax
     * $params['analyzer']           = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']   = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']   = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                 = (string) The field to use as default where no field prefix is given in the query string
     * $params['lenient']            = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['terminate_after']    = (number) The maximum count for each shard, upon reaching which the query execution will terminate early
     * $params['body']               = (array) A query to restrict the results specified with the Query DSL (optional)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-count.html
     */
    public function count(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Count');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['type']                   = DEPRECATED (string) The type of the document
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte)
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['body']                   = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
     */
    public function create(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Create');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) The document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['type']                   = DEPRECATED (string) The type of the document
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the delete operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['if_seq_no']              = (number) only perform the delete operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the delete operation if the last operation that has changed the document has the specified primary term
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete.html
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Delete');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                  = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)
     * $params['type']                   = DEPRECATED (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     * $params['analyzer']               = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']       = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']       = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                     = (string) The field to use as default where no field prefix is given in the query string
     * $params['from']                   = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['conflicts']              = (enum) What to do when the delete by query hits version conflicts? (Options = abort,proceed) (Default = abort)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']             = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                      = (string) Query in the Lucene query string syntax
     * $params['routing']                = (list) A comma-separated list of specific routing values
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']            = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['search_timeout']         = (time) Explicit timeout for each search request. Defaults to no timeout.
     * $params['size']                   = (number) Deprecated, please use `max_docs` instead
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['sort']                   = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']        = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                  = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['version']                = (boolean) Specify whether to return document version as part of a hit
     * $params['request_cache']          = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['refresh']                = (boolean) Should the effected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['scroll_size']            = (number) Size on the scroll request powering the delete by query (Default = 100)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the delete by query is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle for this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['body']                   = (array) The search definition using the Query DSL (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete-by-query.html
     */
    public function deleteByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteByQuery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-delete-by-query.html
     */
    public function deleteByQueryRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteByQueryRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Script ID
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     */
    public function deleteScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['type']             = DEPRECATED (string) The type of the document (use `_all` to fetch the first document matching the ID across all types)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     */
    public function exists(array $params = []): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Exists');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['type']             = DEPRECATED (string) The type of the document; deprecated and optional starting with 7.0
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     */
    public function existsSource(array $params = []): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ExistsSource');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['type']             = DEPRECATED (string) The type of the document
     * $params['analyze_wildcard'] = (boolean) Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)
     * $params['analyzer']         = (string) The analyzer for the query string query
     * $params['default_operator'] = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']               = (string) The default field for query string query (default: _all)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['lenient']          = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                = (string) Query in the Lucene query string syntax
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['body']             = (array) The query definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-explain.html
     */
    public function explain(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Explain');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['fields']             = (list) A comma-separated list of field names
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['include_unmapped']   = (boolean) Indicates whether unmapped fields should be included in the response. (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-field-caps.html
     */
    public function fieldCaps(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('FieldCaps');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['type']             = DEPRECATED (string) The type of the document (use `_all` to fetch the first document matching the ID across all types)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Get');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Script ID
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     */
    public function getScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/painless/master/painless-contexts.html
     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function getScriptContext(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScriptContext');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function getScriptLanguages(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScriptLanguages');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['type']             = DEPRECATED (string) The type of the document; deprecated and optional starting with 7.0
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     */
    public function getSource(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetSource');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID
     * $params['index']                  = (string) The name of the index (Required)
     * $params['type']                   = DEPRECATED (string) The type of the document
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['op_type']                = (enum) Explicit operation type. Defaults to `index` for requests with an explicit document ID, and to `create`for requests without an explicit document ID (Options = index,create)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte)
     * $params['if_seq_no']              = (number) only perform the index operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the index operation if the last operation that has changed the document has the specified primary term
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['body']                   = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
     */
    public function index(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Index');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
     */
    public function info(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The name of the index
     * $params['type']             = DEPRECATED (string) The type of the document
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['body']             = (array) Document identifiers; can be either `docs` (containing full document information) or `ids` (when index and type is provided in the URL. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-get.html
     */
    public function mget(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Mget');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                         = (list) A comma-separated list of index names to use as default
     * $params['type']                          = DEPRECATED (list) A comma-separated list of document types to use as default
     * $params['search_type']                   = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['max_concurrent_searches']       = (number) Controls the maximum number of concurrent searches the multi search api will execute
     * $params['typed_keys']                    = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['pre_filter_shard_size']         = (number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
     * $params['max_concurrent_shard_requests'] = (number) The number of concurrent shard requests each sub search executes concurrently per node. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)
     * $params['rest_total_hits_as_int']        = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips']       = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                          = (array) The request definitions (metadata-search request definition pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-multi-search.html
     */
    public function msearch(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Msearch');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                   = (list) A comma-separated list of index names to use as default
     * $params['type']                    = DEPRECATED (list) A comma-separated list of document types to use as default
     * $params['search_type']             = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['typed_keys']              = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['max_concurrent_searches'] = (number) Controls the maximum number of concurrent searches the multi search api will execute
     * $params['rest_total_hits_as_int']  = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips'] = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                    = (array) The request definitions (metadata-search request definition pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-multi-search.html
     */
    public function msearchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('MsearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The index in which the document resides.
     * $params['type']             = DEPRECATED (string) The type of the document.
     * $params['ids']              = (list) A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
     * $params['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = false)
     * $params['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['fields']           = (list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['routing']          = (string) Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['realtime']         = (boolean) Specifies if requests are real-time as opposed to near-real-time (default: true).
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     * $params['body']             = (array) Define ids, documents, parameters or a list of parameters per document here. You must at least provide a list of document ids. See documentation.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-termvectors.html
     */
    public function mtermvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('MTermVectors');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
     */
    public function ping(array $params = []): bool
    {

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ping');
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']             = (string) Script ID (Required)
     * $params['context']        = (string) Script context
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     * $params['body']           = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     */
    public function putScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $context = $this->extractArgument($params, 'context');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('PutScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setContext($context);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['search_type']        = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['body']               = (array) The ranking evaluation search definition, including search requests, document ratings and ranking metric definition. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-rank-eval.html
     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function rankEval(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('RankEval');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['refresh']                = (boolean) Should the affected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the reindex operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the reindex is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['scroll']                 = (time) Control how long to keep the search context alive (Default = 5m)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['body']                   = (array) The search definition using the Query DSL and the prototype for the index request. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
     */
    public function reindex(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Reindex');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
     */
    public function reindexRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ReindexRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']   = (string) The id of the stored search template
     * $params['body'] = (array) The search definition template and its params
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html#_validating_templates
     */
    public function renderSearchTemplate(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('RenderSearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['body'] = (array) The script to execute
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/painless/master/painless-execute-api.html
     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function scriptsPainlessExecute(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ScriptsPainlessExecute');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['scroll_id']              = DEPRECATED (string) The scroll ID
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['rest_total_hits_as_int'] = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['body']                   = (array) The scroll ID if not passed by URL or query parameter.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-body.html#request-body-search-scroll
     */
    public function scroll(array $params = [])
    {
        $scroll_id = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setParams($params);
        $endpoint->setScrollId($scroll_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                         = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['type']                          = DEPRECATED (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     * $params['analyzer']                      = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']              = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['ccs_minimize_roundtrips']       = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['default_operator']              = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                            = (string) The field to use as default where no field prefix is given in the query string
     * $params['explain']                       = (boolean) Specify whether to return detailed information about score computation as part of a hit
     * $params['stored_fields']                 = (list) A comma-separated list of stored fields to return as part of a hit
     * $params['docvalue_fields']               = (list) A comma-separated list of fields to return as the docvalue representation of a field for each hit
     * $params['from']                          = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']            = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']              = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']              = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']              = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                       = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']                    = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                             = (string) Query in the Lucene query string syntax
     * $params['routing']                       = (list) A comma-separated list of specific routing values
     * $params['scroll']                        = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']                   = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['size']                          = (number) Number of hits to return (default: 10)
     * $params['sort']                          = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                       = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']              = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']              = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']               = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                         = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['suggest_field']                 = (string) Specify which field to use for suggestions
     * $params['suggest_mode']                  = (enum) Specify suggest mode (Options = missing,popular,always) (Default = missing)
     * $params['suggest_size']                  = (number) How many suggestions to return in response
     * $params['suggest_text']                  = (string) The source text for which the suggestions should be returned
     * $params['timeout']                       = (time) Explicit operation timeout
     * $params['track_scores']                  = (boolean) Whether to calculate and return scores even if they are not used for sorting
     * $params['track_total_hits']              = (boolean) Indicate if the number of documents that match the query should be tracked
     * $params['allow_partial_search_results']  = (boolean) Indicate if an error should be returned if there is a partial search failure or timeout (Default = true)
     * $params['typed_keys']                    = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['version']                       = (boolean) Specify whether to return document version as part of a hit
     * $params['seq_no_primary_term']           = (boolean) Specify whether to return sequence number and primary term of the last modification of each hit
     * $params['request_cache']                 = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['batched_reduce_size']           = (number) The number of shard results that should be reduced at once on the coordinating node. This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large. (Default = 512)
     * $params['max_concurrent_shard_requests'] = (number) The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)
     * $params['pre_filter_shard_size']         = (number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
     * $params['rest_total_hits_as_int']        = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['body']                          = (array) The search definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-search.html
     */
    public function search(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Search');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']            = (string) Specific routing value
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-shards.html
     */
    public function searchShards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('SearchShards');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                   = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['type']                    = DEPRECATED (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     * $params['ignore_unavailable']      = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']        = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']        = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']        = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['preference']              = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']                 = (list) A comma-separated list of specific routing values
     * $params['scroll']                  = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']             = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['explain']                 = (boolean) Specify whether to return detailed information about score computation as part of a hit
     * $params['profile']                 = (boolean) Specify whether to profile the query execution
     * $params['typed_keys']              = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['rest_total_hits_as_int']  = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips'] = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                    = (array) The search definition template and its params (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html
     */
    public function searchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('SearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The index in which the document resides. (Required)
     * $params['id']               = (string) The id of the document, when not specified a doc param should be supplied.
     * $params['type']             = DEPRECATED (string) The type of the document.
     * $params['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. (Default = false)
     * $params['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. (Default = true)
     * $params['fields']           = (list) A comma-separated list of fields to return.
     * $params['offsets']          = (boolean) Specifies if term offsets should be returned. (Default = true)
     * $params['positions']        = (boolean) Specifies if term positions should be returned. (Default = true)
     * $params['payloads']         = (boolean) Specifies if term payloads should be returned. (Default = true)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random).
     * $params['routing']          = (string) Specific routing value.
     * $params['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default: true).
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     * $params['body']             = (array) Define parameters and or supply a document to get termvectors for. See documentation.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-termvectors.html
     */
    public function termvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $id = $this->extractArgument($params, 'id');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('TermVectors');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setId($id);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['type']                   = DEPRECATED (string) The type of the document
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the update operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['lang']                   = (string) The script language (default: painless)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['retry_on_conflict']      = (number) Specify how many times should the operation be retried when a conflict occurs (default: 0)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['if_seq_no']              = (number) only perform the update operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the update operation if the last operation that has changed the document has the specified primary term
     * $params['body']                   = (array) The request definition requires either `script` or partial `doc` (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update.html
     */
    public function update(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Update');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                  = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)
     * $params['type']                   = DEPRECATED (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     * $params['analyzer']               = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']       = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']       = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                     = (string) The field to use as default where no field prefix is given in the query string
     * $params['from']                   = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['conflicts']              = (enum) What to do when the update by query hits version conflicts? (Options = abort,proceed) (Default = abort)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['pipeline']               = (string) Ingest pipeline to set on index requests made by this action. (default: none)
     * $params['preference']             = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                      = (string) Query in the Lucene query string syntax
     * $params['routing']                = (list) A comma-separated list of specific routing values
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']            = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['search_timeout']         = (time) Explicit timeout for each search request. Defaults to no timeout.
     * $params['size']                   = (number) Deprecated, please use `max_docs` instead
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['sort']                   = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']        = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                  = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['version']                = (boolean) Specify whether to return document version as part of a hit
     * $params['version_type']           = (boolean) Should the document increment the version number (internal) on hit or not (reindex)
     * $params['request_cache']          = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['refresh']                = (boolean) Should the affected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the update by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['scroll_size']            = (number) Size on the scroll request powering the update by query (Default = 100)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the update by query operation is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['body']                   = (array) The search definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update-by-query.html
     */
    public function updateByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('UpdateByQuery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setType($type);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-update-by-query.html
     */
    public function updateByQueryRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('UpdateByQueryRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    public function cat(): CatNamespace
    {
        return $this->cat;
    }
    public function cluster(): ClusterNamespace
    {
        return $this->cluster;
    }
    public function indices(): IndicesNamespace
    {
        return $this->indices;
    }
    public function ingest(): IngestNamespace
    {
        return $this->ingest;
    }
    public function nodes(): NodesNamespace
    {
        return $this->nodes;
    }
    public function snapshot(): SnapshotNamespace
    {
        return $this->snapshot;
    }
    public function tasks(): TasksNamespace
    {
        return $this->tasks;
    }
    public function asyncSearch(): AsyncSearchNamespace
    {
        return $this->asyncSearch;
    }
    public function autoscaling(): AutoscalingNamespace
    {
        return $this->autoscaling;
    }
    public function ccr(): CcrNamespace
    {
        return $this->ccr;
    }
    public function dataFrameTransformDeprecated(): DataFrameTransformDeprecatedNamespace
    {
        return $this->dataFrameTransformDeprecated;
    }
    public function enrich(): EnrichNamespace
    {
        return $this->enrich;
    }
    public function eql(): EqlNamespace
    {
        return $this->eql;
    }
    public function graph(): GraphNamespace
    {
        return $this->graph;
    }
    public function ilm(): IlmNamespace
    {
        return $this->ilm;
    }
    public function license(): LicenseNamespace
    {
        return $this->license;
    }
    public function migration(): MigrationNamespace
    {
        return $this->migration;
    }
    public function ml(): MlNamespace
    {
        return $this->ml;
    }
    public function monitoring(): MonitoringNamespace
    {
        return $this->monitoring;
    }
    public function rollup(): RollupNamespace
    {
        return $this->rollup;
    }
    public function searchableSnapshots(): SearchableSnapshotsNamespace
    {
        return $this->searchableSnapshots;
    }
    public function security(): SecurityNamespace
    {
        return $this->security;
    }
    public function slm(): SlmNamespace
    {
        return $this->slm;
    }
    public function sql(): SqlNamespace
    {
        return $this->sql;
    }
    public function ssl(): SslNamespace
    {
        return $this->ssl;
    }
    public function transform(): TransformNamespace
    {
        return $this->transform;
    }
    public function watcher(): WatcherNamespace
    {
        return $this->watcher;
    }
    public function xpack(): XpackNamespace
    {
        return $this->xpack;
    }

    /**
     * Catchall for registered namespaces
     *
     * @return object
     * @throws BadMethodCallException if the namespace cannot be found
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->registeredNamespaces[$name])) {
            return $this->registeredNamespaces[$name];
        }
        throw new BadMethodCallException("Namespace [$name] not found");
    }

    /**
     * @return null|mixed
     */
    public function extractArgument(array &$params, string $arg)
    {
        if (array_key_exists($arg, $params) === true) {
            $value = $params[$arg];
            $value = (is_object($value) && !is_iterable($value)) ?
                (array) $value :
                $value;
            unset($params[$arg]);
            return $value;
        } else {
            return null;
        }
    }

    /**
     * @return callable|array
     */
    private function performRequest(AbstractEndpoint $endpoint)
    {
        $promise =  $this->transport->performRequest(
            $endpoint->getMethod(),
            $endpoint->getURI(),
            $endpoint->getParams(),
            $endpoint->getBody(),
            $endpoint->getOptions()
        );

        return $this->transport->resultOrFuture($promise, $endpoint->getOptions());
    }
}
