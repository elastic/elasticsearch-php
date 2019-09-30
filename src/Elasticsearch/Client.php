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
use Elasticsearch\Namespaces\CatNamespace;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\IngestNamespace;
use Elasticsearch\Namespaces\NamespaceBuilderInterface;
use Elasticsearch\Namespaces\NodesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Elasticsearch\Namespaces\BooleanRequestWrapper;
use Elasticsearch\Namespaces\TasksNamespace;

/**
 * Class Client
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Client
{
    const VERSION = '7.3.0';

    /**
     * @var Transport
     */
    public $transport;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var IndicesNamespace
     */
    protected $indices;

    /**
     * @var ClusterNamespace
     */
    protected $cluster;

    /**
     * @var NodesNamespace
     */
    protected $nodes;

    /**
     * @var SnapshotNamespace
     */
    protected $snapshot;

    /**
     * @var CatNamespace
     */
    protected $cat;

    /**
     * @var IngestNamespace
     */
    protected $ingest;

    /**
     * @var TasksNamespace
     */
    protected $tasks;

    /**
     * @var callable
     */
    protected $endpoints;

    /**
     * @var NamespaceBuilderInterface[]
     */
    protected $registeredNamespaces = [];

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
        $this->indices   = new IndicesNamespace($transport, $endpoint);
        $this->cluster   = new ClusterNamespace($transport, $endpoint);
        $this->nodes     = new NodesNamespace($transport, $endpoint);
        $this->snapshot  = new SnapshotNamespace($transport, $endpoint);
        $this->cat       = new CatNamespace($transport, $endpoint);
        $this->ingest    = new IngestNamespace($transport, $endpoint);
        $this->tasks     = new TasksNamespace($transport, $endpoint);
        $this->registeredNamespaces = $registeredNamespaces;
    }

    /**
     * Endpoint: info
     *
     * @see http://www.elastic.co/guide/
     *
     * @return callable|array
     */
    public function info(array $params = [])
    {
        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Info $endpoint
         */
        $endpoint = $endpointBuilder('Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: ping
     *
     * @see http://www.elastic.co/guide/
     *
     */
    public function ping(array $params = []): bool
    {
        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Ping $endpoint
         */
        $endpoint = $endpointBuilder('Ping');
        $endpoint->setParams($params);

        try {
            $this->performRequest($endpoint);
        } catch (Missing404Exception $exception) {
            return false;
        } catch (TransportException $exception) {
            return false;
        } catch (NoNodesAvailableException $exception) {
            return false;
        }

        return true;
    }

    /**
     * Endpoint: rank_eval
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-rank-eval.html
     *
     * $params[
     *   'body'               => '(string) The ranking evaluation search definition, including search requests, document ratings and ranking metric definition. (Required)',
     *   'index'              => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
     * @return callable|array
     */
    public function rankEval(array $params)
    {
        $body = $this->extractArgument($params, 'body');
        $index = $this->extractArgument($params, 'index');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\RankEval $endpoint
         */
        $endpoint = $endpointBuilder('RankEval');
        $endpoint->setBody($body)
            ->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: get
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     *
     * $params[
     *   'id'               => '(string) The document ID (Required)',
     *   'index'            => '(string) The name of the index (Required)',
     *   'type'             => '(string) The type of the document (use `_all` to fetch the first document matching the ID across all types)',
     *   'stored_fields'    => '(list) A comma-separated list of stored fields to return in the response',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'realtime'         => '(boolean) Specify whether to perform the operation in realtime or search mode',
     *   'refresh'          => '(boolean) Refresh the shard containing the document before performing the operation',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     * @return callable|array
     */
    public function get(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Get $endpoint
         */
        $endpoint = $endpointBuilder('Get');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: get_source
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     *
     * $params[
     *   'id'               => '(string) The document ID (Required)',
     *   'index'            => '(string) The name of the index (Required)',
     *   'type'             => '(string) The type of the document; deprecated and optional starting with 7.0',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'realtime'         => '(boolean) Specify whether to perform the operation in realtime or search mode',
     *   'refresh'          => '(boolean) Refresh the shard containing the document before performing the operation',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     * @return callable|array
     */
    public function getSource(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Get $endpoint
         */
        $endpoint = $endpointBuilder('Source\Get');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: exists_source
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     *
     * $params[
     *   'id'               => '(string) The document ID (Required)',
     *   'index'            => '(string) The name of the index (Required)',
     *   'type'             => '(string) The type of the document; deprecated and optional starting with 7.0',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'realtime'         => '(boolean) Specify whether to perform the operation in realtime or search mode',
     *   'refresh'          => '(boolean) Refresh the shard containing the document before performing the operation',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     */
    public function existsSource(array $params): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Exists $endpoint
         */
        $endpoint = $endpointBuilder('Source\Exists');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * Endpoint: delete
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete.html
     *
     * $params[
     *   'id'                     => '(string) The document ID (Required)',
     *   'index'                  => '(string) The name of the index (Required)',
     *   'type'                   => '(string) The type of the document',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the delete operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'refresh'                => '(enum) If `true` then refresh the effected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)',
     *   'routing'                => '(string) Specific routing value',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'if_seq_no'              => '(number) only perform the delete operation if the last operation that has changed the document has the specified sequence number',
     *   'if_primary_term'        => '(number) only perform the delete operation if the last operation that has changed the document has the specified primary term',
     *   'version'                => '(number) Explicit version number for concurrency control',
     *   'version_type'           => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     * @return callable|array
     */
    public function delete(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $this->verifyNotNullOrEmpty("id", $id);
        $this->verifyNotNullOrEmpty("index", $index);

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Delete $endpoint
         */
        $endpoint = $endpointBuilder('Delete');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: delete_by_query
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete-by-query.html
     *
     * $params[
     *   'body'                   => '(string) The search definition using the Query DSL (Required)',
     *   'index'                  => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)',
     *   'type'                   => '(list) A comma-separated list of document types to search; leave empty to perform the operation on all types',
     *   'analyzer'               => '(string) The analyzer to use for the query string',
     *   'analyze_wildcard'       => '(boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)',
     *   'default_operator'       => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'                     => '(string) The field to use as default where no field prefix is given in the query string',
     *   'from'                   => '(number) Starting offset (default: 0)',
     *   'ignore_unavailable'     => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'       => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'conflicts'              => '(enum) What to do when the delete by query hits version conflicts? (Options = abort,proceed) (Default = abort)',
     *   'expand_wildcards'       => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'lenient'                => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'preference'             => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'q'                      => '(string) Query in the Lucene query string syntax',
     *   'routing'                => '(list) A comma-separated list of specific routing values',
     *   'scroll'                 => '(time) Specify how long a consistent view of the index should be maintained for scrolled search',
     *   'search_type'            => '(enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)',
     *   'search_timeout'         => '(time) Explicit timeout for each search request. Defaults to no timeout.',
     *   'size'                   => '(number) Number of hits to return (default: 10)',
     *   'sort'                   => '(list) A comma-separated list of <field>:<direction> pairs',
     *   '_source'                => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes'       => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes'       => '(list) A list of fields to extract and return from the _source field',
     *   'terminate_after'        => '(number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.',
     *   'stats'                  => '(list) Specific 'tag' of the request for logging and statistical purposes',
     *   'version'                => '(boolean) Specify whether to return document version as part of a hit',
     *   'request_cache'          => '(boolean) Specify if request cache should be used for this request or not, defaults to index level setting',
     *   'refresh'                => '(boolean) Should the effected indexes be refreshed?',
     *   'timeout'                => '(time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'scroll_size'            => '(number) Size on the scroll request powering the delete by query',
     *   'wait_for_completion'    => '(boolean) Should the request should block until the delete by query is complete. (Default = true)',
     *   'requests_per_second'    => '(number) The throttle for this request in sub-requests per second. -1 means no throttle. (Default = 0)',
     *   'slices'                 => '(number) The number of slices this task should be divided into. Defaults to 1 meaning the task isn't sliced into subtasks. (Default = 1)',
     * ]
     * @return callable|array
     */
    public function deleteByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\DeleteByQuery $endpoint
         */
        $endpoint = $endpointBuilder('DeleteByQuery');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: delete_by_query_rethrottle
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-delete-by-query.html
     *
     * $params[
     *   'task_id'             => '(string) The task id to rethrottle (Required)',
     *   'requests_per_second' => '(number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)',
     * ]
     * @return callable|array
     */
    public function deleteByQueryRethrottle(array $params)
    {
        $taskId = $this->extractArgument($params, 'task_id');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\DeleteByQueryRethrottle $endpoint
         */
        $endpoint = $endpointBuilder('DeleteByQueryRethrottle');
        $endpoint->setTaskId($taskId);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: count
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-count.html
     *
     * $params[
     *   'body'               => '(string) A query to restrict the results specified with the Query DSL (optional)',
     *   'index'              => '(list) A comma-separated list of indices to restrict the results',
     *   'type'               => '(list) A comma-separated list of types to restrict the results',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'ignore_throttled'   => '(boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'min_score'          => '(number) Include only documents with a specific `_score` value in the result',
     *   'preference'         => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'routing'            => '(list) A comma-separated list of specific routing values',
     *   'q'                  => '(string) Query in the Lucene query string syntax',
     *   'analyzer'           => '(string) The analyzer to use for the query string',
     *   'analyze_wildcard'   => '(boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)',
     *   'default_operator'   => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'                 => '(string) The field to use as default where no field prefix is given in the query string',
     *   'lenient'            => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'terminate_after'    => '(number) The maximum count for each shard, upon reaching which the query execution will terminate early',
     * ]
     * @return callable|array
     */
    public function count(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\Count $endpoint
         */
        $endpoint = $endpointBuilder('Count');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: termvectors
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-termvectors.html
     *
     * $params[
     *   'body'             => '(string) Define parameters and or supply a document to get termvectors for. See documentation.',
     *   'index'            => '(string) The index in which the document resides. (Required)',
     *   'type'             => '(string) The type of the document.',
     *   'id'               => '(string) The id of the document, when not specified a doc param should be supplied.',
     *   'term_statistics'  => '(boolean) Specifies if total term frequency and document frequency should be returned. (Default = false)',
     *   'field_statistics' => '(boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. (Default = true)',
     *   'fields'           => '(list) A comma-separated list of fields to return.',
     *   'offsets'          => '(boolean) Specifies if term offsets should be returned. (Default = true)',
     *   'positions'        => '(boolean) Specifies if term positions should be returned. (Default = true)',
     *   'payloads'         => '(boolean) Specifies if term payloads should be returned. (Default = true)',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random).',
     *   'routing'          => '(string) Specific routing value.',
     *   'realtime'         => '(boolean) Specifies if request is real-time as opposed to near-real-time (default: true).',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     * @return callable|array
     */
    public function termvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $id    = $this->extractArgument($params, 'id');
        $body  = $this->extractArgument($params, 'body');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\TermVectors $endpoint
         */
        $endpoint = $endpointBuilder('TermVectors');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setID($id)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: mtermvectors
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-termvectors.html
     *
     * $params[
     *   'body'             => '(string) Define ids, documents, parameters or a list of parameters per document here. You must at least provide a list of document ids. See documentation.',
     *   'index'            => '(string) The index in which the document resides.',
     *   'type'             => '(string) The type of the document.',
     *   'ids'              => '(list) A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body',
     *   'term_statistics'  => '(boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = false)',
     *   'field_statistics' => '(boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)',
     *   'fields'           => '(list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs".',
     *   'offsets'          => '(boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)',
     *   'positions'        => '(boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)',
     *   'payloads'         => '(boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".',
     *   'routing'          => '(string) Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".',
     *   'realtime'         => '(boolean) Specifies if requests are real-time as opposed to near-real-time (default: true).',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     * @return callable|array
     */
    public function mtermvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $body  = $this->extractArgument($params, 'body');

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
         * @var \Elasticsearch\Endpoints\MTermVectors $endpoint
         */
        $endpoint = $endpointBuilder('MTermVectors');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: exists
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
     *
     * $params[
     *   'id'               => '(string) The document ID (Required)',
     *   'index'            => '(string) The name of the index (Required)',
     *   'type'             => '(string) The type of the document (use `_all` to fetch the first document matching the ID across all types)',
     *   'stored_fields'    => '(list) A comma-separated list of stored fields to return in the response',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'realtime'         => '(boolean) Specify whether to perform the operation in realtime or search mode',
     *   'refresh'          => '(boolean) Refresh the shard containing the document before performing the operation',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     *   'version'          => '(number) Explicit version number for concurrency control',
     *   'version_type'     => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     * ]
     */
    public function exists(array $params): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
         * @var callable $endpointBuilder
         */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Exists $endpoint
        */
        $endpoint = $endpointBuilder('Exists');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type);

        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * Endpoint: mget
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-get.html
     *
     * $params[
     *   'body'             => '(string) Document identifiers; can be either `docs` (containing full document information) or `ids` (when index and type is provided in the URL. (Required)',
     *   'index'            => '(string) The name of the index',
     *   'type'             => '(string) The type of the document',
     *   'stored_fields'    => '(list) A comma-separated list of stored fields to return in the response',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'realtime'         => '(boolean) Specify whether to perform the operation in realtime or search mode',
     *   'refresh'          => '(boolean) Refresh the shard containing the document before performing the operation',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     * ]
     * @return callable|array
     */
    public function mget(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Mget $endpoint
        */
        $endpoint = $endpointBuilder('Mget');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: msearch
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-multi-search.html
     *
     * $params[
     *   'body'                          => '(string) The request definitions (metadata-search request definition pairs), separated by newlines (Required)',
     *   'index'                         => '(list) A comma-separated list of index names to use as default',
     *   'type'                          => '(list) A comma-separated list of document types to use as default',
     *   'search_type'                   => '(enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)',
     *   'max_concurrent_searches'       => '(number) Controls the maximum number of concurrent searches the multi search api will execute',
     *   'typed_keys'                    => '(boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response',
     *   'pre_filter_shard_size'         => '(number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on it's rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint. (Default = 128)',
     *   'max_concurrent_shard_requests' => '(number) The number of concurrent shard requests each sub search executes concurrently per node. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)',
     *   'rest_total_hits_as_int'        => '(boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)',
     *   'ccs_minimize_roundtrips'       => '(boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)',
     * ]
     * @return callable|array
     */
    public function msearch(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Msearch $endpoint
        */
        $endpoint = $endpointBuilder('Msearch');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: msearch_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/search-multi-search.html
     *
     * $params[
     *   'body'                    => '(string) The request definitions (metadata-search request definition pairs), separated by newlines (Required)',
     *   'index'                   => '(list) A comma-separated list of index names to use as default',
     *   'type'                    => '(list) A comma-separated list of document types to use as default',
     *   'search_type'             => '(enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)',
     *   'typed_keys'              => '(boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response',
     *   'max_concurrent_searches' => '(number) Controls the maximum number of concurrent searches the multi search api will execute',
     *   'rest_total_hits_as_int'  => '(boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)',
     *   'ccs_minimize_roundtrips' => '(boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)',
     * ]
     * @return callable|array
     */
    public function msearchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\MsearchTemplate $endpoint
        */
        $endpoint = $endpointBuilder('MsearchTemplate');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: create
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
     *
     * $params[
     *   'body'                   => '(string) The document (Required)',
     *   'id'                     => '(string) Document ID (Required)',
     *   'index'                  => '(string) The name of the index (Required)',
     *   'type'                   => '(string) The type of the document',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'refresh'                => '(enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)',
     *   'routing'                => '(string) Specific routing value',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'version'                => '(number) Explicit version number for concurrency control',
     *   'version_type'           => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     *   'pipeline'               => '(string) The pipeline id to preprocess incoming documents with',
     * ]
     * @return callable|array
     */
    public function create(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Create $endpoint
        */
        $endpoint = $endpointBuilder('Create');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: bulk
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-bulk.html
     *
     * $params[
     *   'body'                   => '(string) The operation definition and data (action-data pairs), separated by newlines (Required)',
     *   'index'                  => '(string) Default index for items which don't provide one',
     *   'type'                   => '(string) Default document type for items which don't provide one',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the bulk operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'refresh'                => '(enum) If `true` then refresh the effected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)',
     *   'routing'                => '(string) Specific routing value',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'type'                   => '(string) Default document type for items which don't provide one',
     *   '_source'                => '(list) True or false to return the _source field or not, or default list of fields to return, can be overridden on each sub-request',
     *   '_source_excludes'       => '(list) Default list of fields to exclude from the returned _source field, can be overridden on each sub-request',
     *   '_source_includes'       => '(list) Default list of fields to extract and return from the _source field, can be overridden on each sub-request',
     *   'pipeline'               => '(string) The pipeline id to preprocess incoming documents with',
     * ]
     * @return callable|array
     */
    public function bulk(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Bulk $endpoint
        */
        $endpoint = $endpointBuilder('Bulk');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: index
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
     *
     * $params[
     *   'body'                   => '(string) The document (Required)',
     *   'id'                     => '(string) Document ID',
     *   'index'                  => '(string) The name of the index (Required)',
     *   'type'                   => '(string) The type of the document',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'op_type'                => '(enum) Explicit operation type (Options = index,create) (Default = index)',
     *   'refresh'                => '(enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)',
     *   'routing'                => '(string) Specific routing value',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'version'                => '(number) Explicit version number for concurrency control',
     *   'version_type'           => '(enum) Specific version type (Options = internal,external,external_gte,force)',
     *   'if_seq_no'              => '(number) only perform the index operation if the last operation that has changed the document has the specified sequence number',
     *   'if_primary_term'        => '(number) only perform the index operation if the last operation that has changed the document has the specified primary term',
     *   'pipeline'               => '(string) The pipeline id to preprocess incoming documents with',
     * ]
     * @return callable|array
     */
    public function index(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Index $endpoint
        */
        $endpoint = $endpointBuilder('Index');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: reindex
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
     *
     * $params[
     *   'body'                   => '(string) The search definition using the Query DSL and the prototype for the index request. (Required)',
     *   'refresh'                => '(boolean) Should the effected indexes be refreshed?',
     *   'timeout'                => '(time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the reindex operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'wait_for_completion'    => '(boolean) Should the request should block until the reindex is complete. (Default = true)',
     *   'requests_per_second'    => '(number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)',
     *   'scroll'                 => '(time) Control how long to keep the search context alive (Default = 5m)',
     *   'slices'                 => '(number) The number of slices this task should be divided into. Defaults to 1 meaning the task isn't sliced into subtasks. (Default = 1)',
     * ]
     * @return callable|array
     */
    public function reindex(array $params)
    {
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;
        /**
        * @var \Elasticsearch\Endpoints\Reindex $endpoint
        */
        $endpoint = $endpointBuilder('Reindex');
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: reindex_rethrottle
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
     *
     * $params[
     *   'task_id'             => '(string) The task id to rethrottle (Required)',
     *   'requests_per_second' => '(number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)',
     * ]
     * @return callable|array
     */
    public function reindexRethrottle(array $params)
    {
        $taskId = $this->extractArgument($params, 'task_id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;
        /**
        * @var \Elasticsearch\Endpoints\ReindexRethrottle $endpoint
        */
        $endpoint = $endpointBuilder('ReindexRethrottle');
        $endpoint->setTaskId($taskId);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: explain
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-explain.html
     *
     * $params[
     *   'body'             => '(string) The query definition using the Query DSL',
     *   'id'               => '(string) The document ID (Required)',
     *   'index'            => '(string) The name of the index (Required)',
     *   'type'             => '(string) The type of the document',
     *   'analyze_wildcard' => '(boolean) Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)',
     *   'analyzer'         => '(string) The analyzer for the query string query',
     *   'default_operator' => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'               => '(string) The default field for query string query (default: _all)',
     *   'stored_fields'    => '(list) A comma-separated list of stored fields to return in the response',
     *   'lenient'          => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'preference'       => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'q'                => '(string) Query in the Lucene query string syntax',
     *   'routing'          => '(string) Specific routing value',
     *   '_source'          => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes' => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes' => '(list) A list of fields to extract and return from the _source field',
     * ]
     * @return callable|array
     */
    public function explain(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Explain $endpoint
        */
        $endpoint = $endpointBuilder('Explain');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: search
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-search.html
     *
     * $params[
     *   'body'                          => '(string) The search definition using the Query DSL',
     *   'index'                         => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices',
     *   'type'                          => '(list) A comma-separated list of document types to search; leave empty to perform the operation on all types',
     *   'analyzer'                      => '(string) The analyzer to use for the query string',
     *   'analyze_wildcard'              => '(boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)',
     *   'ccs_minimize_roundtrips'       => '(boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)',
     *   'default_operator'              => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'                            => '(string) The field to use as default where no field prefix is given in the query string',
     *   'explain'                       => '(boolean) Specify whether to return detailed information about score computation as part of a hit',
     *   'stored_fields'                 => '(list) A comma-separated list of stored fields to return as part of a hit',
     *   'docvalue_fields'               => '(list) A comma-separated list of fields to return as the docvalue representation of a field for each hit',
     *   'from'                          => '(number) Starting offset (default: 0)',
     *   'ignore_unavailable'            => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'ignore_throttled'              => '(boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled',
     *   'allow_no_indices'              => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'              => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'lenient'                       => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'preference'                    => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'q'                             => '(string) Query in the Lucene query string syntax',
     *   'routing'                       => '(list) A comma-separated list of specific routing values',
     *   'scroll'                        => '(time) Specify how long a consistent view of the index should be maintained for scrolled search',
     *   'search_type'                   => '(enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)',
     *   'size'                          => '(number) Number of hits to return (default: 10)',
     *   'sort'                          => '(list) A comma-separated list of <field>:<direction> pairs',
     *   '_source'                       => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes'              => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes'              => '(list) A list of fields to extract and return from the _source field',
     *   'terminate_after'               => '(number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.',
     *   'stats'                         => '(list) Specific 'tag' of the request for logging and statistical purposes',
     *   'suggest_field'                 => '(string) Specify which field to use for suggestions',
     *   'suggest_mode'                  => '(enum) Specify suggest mode (Options = missing,popular,always) (Default = missing)',
     *   'suggest_size'                  => '(number) How many suggestions to return in response',
     *   'suggest_text'                  => '(string) The source text for which the suggestions should be returned',
     *   'timeout'                       => '(time) Explicit operation timeout',
     *   'track_scores'                  => '(boolean) Whether to calculate and return scores even if they are not used for sorting',
     *   'track_total_hits'              => '(boolean) Indicate if the number of documents that match the query should be tracked',
     *   'allow_partial_search_results'  => '(boolean) Indicate if an error should be returned if there is a partial search failure or timeout (Default = true)',
     *   'typed_keys'                    => '(boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response',
     *   'version'                       => '(boolean) Specify whether to return document version as part of a hit',
     *   'seq_no_primary_term'           => '(boolean) Specify whether to return sequence number and primary term of the last modification of each hit',
     *   'request_cache'                 => '(boolean) Specify if request cache should be used for this request or not, defaults to index level setting',
     *   'batched_reduce_size'           => '(number) The number of shard results that should be reduced at once on the coordinating node. This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large. (Default = 512)',
     *   'max_concurrent_shard_requests' => '(number) The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)',
     *   'pre_filter_shard_size'         => '(number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on it's rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint. (Default = 128)',
     *   'rest_total_hits_as_int'        => '(boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)',
     * ]
     * @return callable|array
     */
    public function search(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Search $endpoint
        */
        $endpoint = $endpointBuilder('Search');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: search_shards
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-shards.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices',
     *   'preference'         => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'routing'            => '(string) Specific routing value',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
     * @return callable|array
     */
    public function searchShards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\SearchShards $endpoint
        */
        $endpoint = $endpointBuilder('SearchShards');
        $endpoint->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: search_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html
     *
     * $params[
     *   'body'                    => '(string) The search definition template and its params (Required)',
     *   'index'                   => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices',
     *   'type'                    => '(list) A comma-separated list of document types to search; leave empty to perform the operation on all types',
     *   'ignore_unavailable'      => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'ignore_throttled'        => '(boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled',
     *   'allow_no_indices'        => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'        => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'preference'              => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'routing'                 => '(list) A comma-separated list of specific routing values',
     *   'scroll'                  => '(time) Specify how long a consistent view of the index should be maintained for scrolled search',
     *   'search_type'             => '(enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)',
     *   'explain'                 => '(boolean) Specify whether to return detailed information about score computation as part of a hit',
     *   'profile'                 => '(boolean) Specify whether to profile the query execution',
     *   'typed_keys'              => '(boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response',
     *   'rest_total_hits_as_int'  => '(boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)',
     *   'ccs_minimize_roundtrips' => '(boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)',
     * ]
     * @return callable|array
     */
    public function searchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Search $endpoint
        */
        $endpoint = $endpointBuilder('SearchTemplate');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: scroll
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-scroll.html
     *
     * $params[
     *   'body'                   => '(string) The scroll ID if not passed by URL or query parameter.',
     *   'scroll_id'              => '(string) The scroll ID',
     *   'scroll'                 => '(time) Specify how long a consistent view of the index should be maintained for scrolled search',
     *   'scroll_id'              => '(string) The scroll ID for scrolled search',
     *   'rest_total_hits_as_int' => '(boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)',
     * ]
     * @return callable|array
     */
    public function scroll(array $params = [])
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Scroll $endpoint
        */
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setScrollId($scrollID)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['body'] = (string) The script to execute
     *
     * @return callable|array
     */
    public function scriptsPainlessExecute(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\ScriptsPainlessExecute $endpoint
        */
        $endpoint = $endpointBuilder('ScriptsPainlessExecute');
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: clear_scroll
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-scroll.html
     *
     * $params[
     *   'body'      => '(string) A comma-separated list of scroll IDs to clear if none was specified via the scroll_id parameter',
     *   'scroll_id' => '(list) A comma-separated list of scroll IDs to clear',
     * ]
     * @return callable|array
     */
    public function clearScroll(array $params = [])
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\ClearScroll $endpoint
        */
        $endpoint = $endpointBuilder('ClearScroll');
        $endpoint->setScrollId($scrollID)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: update
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update.html
     *
     * $params[
     *   'body'                   => '(string) The request definition requires either `script` or partial `doc` (Required)',
     *   'id'                     => '(string) Document ID (Required)',
     *   'index'                  => '(string) The name of the index (Required)',
     *   'type'                   => '(string) The type of the document',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the update operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   '_source'                => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes'       => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes'       => '(list) A list of fields to extract and return from the _source field',
     *   'lang'                   => '(string) The script language (default: painless)',
     *   'refresh'                => '(enum) If `true` then refresh the effected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)',
     *   'retry_on_conflict'      => '(number) Specify how many times should the operation be retried when a conflict occurs (default: 0)',
     *   'routing'                => '(string) Specific routing value',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'if_seq_no'              => '(number) only perform the update operation if the last operation that has changed the document has the specified sequence number',
     *   'if_primary_term'        => '(number) only perform the update operation if the last operation that has changed the document has the specified primary term',
     * ]
     * @return callable|array
     */
    public function update(array $params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Update $endpoint
        */
        $endpoint = $endpointBuilder('Update');
        $endpoint->setID($id)
            ->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: update_by_query
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update-by-query.html
     *
     * $params[
     *   'body'                   => '(string) The search definition using the Query DSL',
     *   'index'                  => '(list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)',
     *   'type'                   => '(list) A comma-separated list of document types to search; leave empty to perform the operation on all types',
     *   'analyzer'               => '(string) The analyzer to use for the query string',
     *   'analyze_wildcard'       => '(boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)',
     *   'default_operator'       => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'                     => '(string) The field to use as default where no field prefix is given in the query string',
     *   'from'                   => '(number) Starting offset (default: 0)',
     *   'ignore_unavailable'     => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'       => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'conflicts'              => '(enum) What to do when the update by query hits version conflicts? (Options = abort,proceed) (Default = abort)',
     *   'expand_wildcards'       => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'lenient'                => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'pipeline'               => '(string) Ingest pipeline to set on index requests made by this action. (default: none)',
     *   'preference'             => '(string) Specify the node or shard the operation should be performed on (default: random)',
     *   'q'                      => '(string) Query in the Lucene query string syntax',
     *   'routing'                => '(list) A comma-separated list of specific routing values',
     *   'scroll'                 => '(time) Specify how long a consistent view of the index should be maintained for scrolled search',
     *   'search_type'            => '(enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)',
     *   'search_timeout'         => '(time) Explicit timeout for each search request. Defaults to no timeout.',
     *   'size'                   => '(number) Number of hits to return (default: 10)',
     *   'sort'                   => '(list) A comma-separated list of <field>:<direction> pairs',
     *   '_source'                => '(list) True or false to return the _source field or not, or a list of fields to return',
     *   '_source_excludes'       => '(list) A list of fields to exclude from the returned _source field',
     *   '_source_includes'       => '(list) A list of fields to extract and return from the _source field',
     *   'terminate_after'        => '(number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.',
     *   'stats'                  => '(list) Specific 'tag' of the request for logging and statistical purposes',
     *   'version'                => '(boolean) Specify whether to return document version as part of a hit',
     *   'version_type'           => '(boolean) Should the document increment the version number (internal) on hit or not (reindex)',
     *   'request_cache'          => '(boolean) Specify if request cache should be used for this request or not, defaults to index level setting',
     *   'refresh'                => '(boolean) Should the effected indexes be refreshed?',
     *   'timeout'                => '(time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)',
     *   'wait_for_active_shards' => '(string) Sets the number of shard copies that must be active before proceeding with the update by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)',
     *   'scroll_size'            => '(number) Size on the scroll request powering the update by query',
     *   'wait_for_completion'    => '(boolean) Should the request should block until the update by query operation is complete. (Default = true)',
     *   'requests_per_second'    => '(number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)',
     *   'slices'                 => '(number) The number of slices this task should be divided into. Defaults to 1 meaning the task isn't sliced into subtasks. (Default = 1)',
     * ]
     * @return callable|array
     */
    public function updateByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');
        $type = $this->extractArgument($params, 'type');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\UpdateByQuery $endpoint
        */
        $endpoint = $endpointBuilder('UpdateByQuery');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: update_by_query_rethrottle
     *
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-update-by-query.html
     *
     * $params[
     *   'task_id'             => '(string) The task id to rethrottle (Required)',
     *   'requests_per_second' => '(number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)',
     * ]
     * @return callable|array
     */
    public function updateByQueryRethrottle(array $params = [])
    {
        $taskId = $this->extractArgument($params, 'task_id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\UpdateByQueryRethrottle $endpoint
        */
        $endpoint = $endpointBuilder('UpdateByQueryRethrottle');
        $endpoint->setTaskId($taskId);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: get_script
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     *
     * $params[
     *   'id'             => '(string) Script ID (Required)',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
     * @return callable|array
     */
    public function getScript(array $params)
    {
        $id = $this->extractArgument($params, 'id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Script\Get $endpoint
        */
        $endpoint = $endpointBuilder('Script\Get');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: delete_script
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     *
     * $params[
     *   'id'             => '(string) Script ID (Required)',
     *   'timeout'        => '(time) Explicit operation timeout',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
     * @return callable|array
     */
    public function deleteScript(array $params)
    {
        $id = $this->extractArgument($params, 'id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Script\Delete $endpoint
        */
        $endpoint = $endpointBuilder('Script\Delete');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: put_script
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
     *
     * $params[
     *   'body'           => '(string) The document (Required)',
     *   'id'             => '(string) Script ID (Required)',
     *   'context'        => '(string) Script context',
     *   'timeout'        => '(time) Explicit operation timeout',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     *   'context'        => '(string) Context name to compile script against',
     * ]
     * @return callable|array
     */
    public function putScript(array $params)
    {
        $id   = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Script\Put $endpoint
        */
        $endpoint = $endpointBuilder('Script\Put');
        $endpoint->setID($id)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The search template ID (Required)
     *
     * @return callable|array
     */
    public function getTemplate(array $params)
    {
        $id = $this->extractArgument($params, 'id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Template\Get $endpoint
        */
        $endpoint = $endpointBuilder('Template\Get');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The search template ID (Required)
     *
     * @return callable|array
     */
    public function deleteTemplate(array $params)
    {
        $id = $this->extractArgument($params, 'id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\Template\Delete $endpoint
        */
        $endpoint = $endpointBuilder('Template\Delete');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: field_caps
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-field-caps.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'fields'             => '(list) A comma-separated list of field names',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'include_unmapped'   => '(boolean) Indicates whether unmapped fields should be included in the response. (Default = false)',
     * ]
     * @return callable|array
     */
    public function fieldCaps(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\FieldCaps $endpoint
        */
        $endpoint = $endpointBuilder('FieldCaps');
        $endpoint->setIndex($index)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: render_search_template
     *
     * @see http://www.elasticsearch.org/guide/en/elasticsearch/reference/master/search-template.html
     *
     * $params[
     *   'body' => '(string) The search definition template and its params',
     *   'id'   => '(string) The id of the stored search template',
     * ]
     * @return callable|array
     */
    public function renderSearchTemplate(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');
        $id   = $this->extractArgument($params, 'id');

        /**
        * @var callable $endpointBuilder
        */
        $endpointBuilder = $this->endpoints;

        /**
        * @var \Elasticsearch\Endpoints\RenderSearchTemplate $endpoint
        */
        $endpoint = $endpointBuilder('RenderSearchTemplate');
        $endpoint->setBody($body)
            ->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Operate on the Indices Namespace of commands
     */
    public function indices(): IndicesNamespace
    {
        return $this->indices;
    }

    /**
     * Operate on the Cluster namespace of commands
     */
    public function cluster(): ClusterNamespace
    {
        return $this->cluster;
    }

    /**
     * Operate on the Nodes namespace of commands
     */
    public function nodes(): NodesNamespace
    {
        return $this->nodes;
    }

    /**
     * Operate on the Snapshot namespace of commands
     */
    public function snapshot(): SnapshotNamespace
    {
        return $this->snapshot;
    }

    /**
     * Operate on the Cat namespace of commands
     */
    public function cat(): CatNamespace
    {
        return $this->cat;
    }

    /**
     * Operate on the Ingest namespace of commands
     */
    public function ingest(): IngestNamespace
    {
        return $this->ingest;
    }

    /**
     * Operate on the Tasks namespace of commands
     */
    public function tasks(): TasksNamespace
    {
        return $this->tasks;
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
            $value = is_object($value) ? (array) $value : $value;
            unset($params[$arg]);
            return $value;
        } else {
            return null;
        }
    }

    private function verifyNotNullOrEmpty(string $name, $var)
    {
        if ($var === null) {
            throw new InvalidArgumentException("$name cannot be null.");
        }

        if (is_string($var)) {
            if (strlen($var) === 0) {
                throw new InvalidArgumentException("$name cannot be an empty string");
            }
        }

        if (is_array($var)) {
            if (strlen(implode("", $var)) === 0) {
                throw new InvalidArgumentException("$name cannot be an array of empty strings");
            }
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
