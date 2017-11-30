<?php

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
use Elasticsearch\Namespaces\RemoteNamespace;
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
     * @var RemoteNamespace
     */
    protected $remote;

    /** @var  callback */
    protected $endpoints;

    /** @var  NamespaceBuilderInterface[] */
    protected $registeredNamespaces = [];

    /**
     * Client constructor
     *
     * @param Transport $transport
     * @param callable $endpoint
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
        $this->remote    = new RemoteNamespace($transport, $endpoint);
        $this->registeredNamespaces = $registeredNamespaces;
    }

    /**
     * @param $params
     * @return array
     */
    public function info($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Info $endpoint */
        $endpoint = $endpointBuilder('Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function ping($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Ping $endpoint */
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
     * $params['id']              = (string) The document ID (Required)
     *        ['index']           = (string) The name of the index (Required)
     *        ['type']            = (string) The type of the document (use `_all` to fetch the first document matching the ID across all types) (Required)
     *        ['ignore_missing']  = ??
     *        ['fields']          = (list) A comma-separated list of fields to return in the response
     *        ['parent']          = (string) The ID of the parent document
     *        ['preference']      = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['realtime']        = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']         = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']         = (string) Specific routing value
     *        ['_source']         = (list) True or false to return the _source field or not, or a list of fields to return
     *        ['_source_exclude'] = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (list) A list of fields to extract and return from the _source field
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Get $endpoint */
        $endpoint = $endpointBuilder('Get');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']             = (string) The document ID (Required)
     *        ['index']          = (string) The name of the index (Required)
     *        ['type']           = (string) The type of the document (use `_all` to fetch the first document matching the ID across all types) (Required)
     *        ['ignore_missing'] = ??
     *        ['parent']         = (string) The ID of the parent document
     *        ['preference']     = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['realtime']       = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']        = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']        = (string) Specific routing value
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getSource($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Get $endpoint */
        $endpoint = $endpointBuilder('Get');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->returnOnlySource();
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']           = (string) The document ID (Required)
     *        ['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['consistency']  = (enum) Specific write consistency setting for the operation
     *        ['parent']       = (string) ID of parent document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['replication']  = (enum) Specific replication type
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['version_type'] = (enum) Specific version type
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        $this->verifyNotNullOrEmpty("id", $id);
        $this->verifyNotNullOrEmpty("type", $type);
        $this->verifyNotNullOrEmpty("index", $index);

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Delete $endpoint */
        $endpoint = $endpointBuilder('Delete');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     *
     * $params['_source'] = (list) True or false to return the _source field or not, or a list of fields to return
     *        ['_source_exclude'] = (array) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (array) A list of fields to extract and return from the _source field
     *        ['allow_no_indices'] = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['analyze_wildcard'] = (bool) Specify whether wildcard and prefix queries should be analyzed (default: false)
     *        ['analyzer'] = (string) The analyzer to use for the query string
     *        ['conflicts'] = (enum) What to do when the delete-by-query hits version conflicts?
     *        ['default_operator'] = (enum) The default operator for query string query (AND or OR)
     *        ['df'] = (string) The field to use as default where no field prefix is given in the query string
     *        ['expand_wildcards'] = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *        ['from'] = (number) Starting offset (default: 0)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['lenient'] = (bool) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     *        ['preference'] = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['q'] = (string) Query in the Lucene query string syntax
     *        ['refresh'] = (bool) Should the effected indexes be refreshed?
     *        ['request_cache'] = (bool) Specify if request cache should be used for this request or not, defaults to index level setting
     *        ['requests_per_second'] = (number) The throttle for this request in sub-requests per second. -1 means no throttle.
     *        ['routing'] = (array) A comma-separated list of specific routing values
     *        ['scroll'] = (number) Specify how long a consistent view of the index should be maintained for scrolled search
     *        ['scroll_size'] = (number) Size on the scroll request powering the update_by_query
     *        ['search_timeout'] = (number) Explicit timeout for each search request. Defaults to no timeout.
     *        ['search_type'] = (enum) Search operation type
     *        ['size'] = (number) Number of hits to return (default: 10)
     *        ['slices'] = (integer) The number of slices this task should be divided into. Defaults to 1 meaning the task isn't sliced into subtasks.
     *        ['sort'] = (array) A comma-separated list of <field>:<direction> pairs
     *        ['stats'] = (array) Specific 'tag' of the request for logging and statistical purposes
     *        ['terminate_after'] = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     *        ['timeout'] = (number) Time each individual bulk request should wait for shards that are unavailable.
     *        ['version'] = (bool) Specify whether to return document version as part of a hit
     *        ['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     *        ['wait_for_completion'] = (bool) Should the request should block until the delete-by-query is complete.
     *
     * @param array $params
     *
     * @return array
     */
    public function deleteByQuery($params = array())
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\DeleteByQuery $endpoint */
        $endpoint = $endpointBuilder('DeleteByQuery');
        $endpoint->setIndex($index)
                ->setType($type)
                ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     *        ['type']               = (list) A comma-separated list of types to restrict the results
     *        ['min_score']          = (number) Include only documents with a specific `_score` value in the result
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']            = (string) Specific routing value
     *        ['source']             = (string) The URL-encoded query definition (instead of using the request body)
     *        ['body']               = (array) A query to restrict the results (optional)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function count($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Count $endpoint */
        $endpoint = $endpointBuilder('Count');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     *        ['type']               = (list) A comma-separated list of types to restrict the results
     *        ['id']                 = (string) ID of document
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']            = (string) Specific routing value
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['body']               = (array) A query to restrict the results (optional)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['percolate_index']    = (string) The index to count percolate the document into. Defaults to index.
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *        ['version']            = (number) Explicit version number for concurrency control
     *        ['version_type']       = (enum) Specific version type
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     *
     * @deprecated
     */
    public function countPercolate($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $id    = $this->extractArgument($params, 'id');
        $body  = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\CountPercolate $endpoint */
        $endpoint = $endpointBuilder('CountPercolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']        = (string) The name of the index with a registered percolator query (Required)
     *        ['type']         = (string) The document type (Required)
     *        ['prefer_local'] = (boolean) With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)
     *        ['body']         = (array) The document (`doc`) to percolate against registered queries; optionally also a `query` to limit the percolation to specific registered queries
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     *
     * @deprecated
     */
    public function percolate($params)
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $id    = $this->extractArgument($params, 'id');
        $body  = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Percolate $endpoint */
        $endpoint = $endpointBuilder('Percolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (string) Default index for items which don't provide one
     *        ['type']               = (string) Default document type for items which don't provide one
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     *
     * @deprecated
     */
    public function mpercolate($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MPercolate $endpoint */
        $endpoint = $endpointBuilder('MPercolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']            = (string) Default index for items which don't provide one
     *        ['type']             = (string) Default document type for items which don't provide one
     *        ['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['fields']           = (list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['preference']       = (string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['routing']          = (string) Specific routing value. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['parent']           = (string) Parent id of documents. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default: true).
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function termvectors($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $id    = $this->extractArgument($params, 'id');
        $body  = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\TermVectors $endpoint */
        $endpoint = $endpointBuilder('TermVectors');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']            = (string) Default index for items which don't provide one
     *        ['type']             = (string) Default document type for items which don't provide one
     *        ['ids']              = (list) A comma-separated list of documents ids. You must define ids as parameter or set \"ids\" or \"docs\" in the request body
     *        ['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['fields']           = (list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\"."
     *        ['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['preference']       = (string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['routing']          = (string) Specific routing value. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['parent']           = (string) Parent id of documents. Applies to all returned documents unless otherwise specified in body \"params\" or \"docs\".
     *        ['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default: true).
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mtermvectors($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type  = $this->extractArgument($params, 'type');
        $body  = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MTermVectors $endpoint */
        $endpoint = $endpointBuilder('MTermVectors');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']         = (string) The document ID (Required)
     *        ['index']      = (string) The name of the index (Required)
     *        ['type']       = (string) The type of the document (use `_all` to fetch the first document matching the ID across all types) (Required)
     *        ['parent']     = (string) The ID of the parent document
     *        ['preference'] = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['realtime']   = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']    = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']    = (string) Specific routing value
     *
     * @param $params array Associative array of parameters
     *
     * @return array | boolean
     */
    public function exists($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        //manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Exists $endpoint */
        $endpoint = $endpointBuilder('Exists');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * $params['index']           = (string) The name of the index
     *        ['type']            = (string) The type of the document
     *        ['fields']          = (list) A comma-separated list of fields to return in the response
     *        ['parent']          = (string) The ID of the parent document
     *        ['preference']      = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['realtime']        = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']         = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']         = (string) Specific routing value
     *        ['body']            = (array) Document identifiers; can be either `docs` (containing full document information) or `ids` (when index and type is provided in the URL.
     *        ['_source']         = (list) True or false to return the _source field or not, or a list of fields to return
     *        ['_source_exclude'] = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (list) A list of fields to extract and return from the _source field
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mget($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Mget $endpoint */
        $endpoint = $endpointBuilder('Mget');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']       = (list) A comma-separated list of index names to use as default
     *        ['type']        = (list) A comma-separated list of document types to use as default
     *        ['search_type'] = (enum) Search operation type
     *        ['body']        = (array|string) The request definitions (metadata-search request definition pairs), separated by newlines
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function msearch($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Msearch $endpoint */
        $endpoint = $endpointBuilder('Msearch');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']       = (list) A comma-separated list of index names to use as default
     *        ['type']        = (list) A comma-separated list of document types to use as default
     *        ['search_type'] = (enum) Search operation type
     *        ['body']        = (array|string) The request definitions (metadata-search request definition pairs), separated by newlines
     *        ['max_concurrent_searches'] = (number) Controls the maximum number of concurrent searches the multi search api will execute
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function msearchTemplate($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MsearchTemplate $endpoint */
        $endpoint = $endpointBuilder('MsearchTemplate');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['id']           = (string) Specific document ID (when the POST method is used)
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation
     *        ['parent']       = (string) ID of the parent document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['replication']  = (enum) Specific replication type
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type
     *        ['body']         = (array) The document
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function create($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Create $endpoint */
        $endpoint = $endpointBuilder('Create');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']       = (string) Default index for items which don't provide one
     *        ['type']        = (string) Default document type for items which don't provide one
     *        ['consistency'] = (enum) Explicit write consistency setting for the operation
     *        ['refresh']     = (boolean) Refresh the index after performing the operation
     *        ['replication'] = (enum) Explicitly set the replication type
     *        ['fields']      = (list) Default comma-separated list of fields to return in the response for updates
     *        ['body']        = (array) The document
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function bulk($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Bulk $endpoint */
        $endpoint = $endpointBuilder('Bulk');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['id']           = (string) Specific document ID (when the POST method is used)
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation
     *        ['op_type']      = (enum) Explicit operation type
     *        ['parent']       = (string) ID of the parent document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['replication']  = (enum) Specific replication type
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type
     *        ['body']         = (array) The document
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function index($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Index $endpoint */
        $endpoint = $endpointBuilder('Index');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['refresh']             = (boolean) Should the effected indexes be refreshed?
     *        ['timeout']             = (time) Time each individual bulk request should wait for shards that are unavailable
     *        ['consistency']         = (enum) Explicit write consistency setting for the operation
     *        ['wait_for_completion'] = (boolean) Should the request should block until the reindex is complete
     *        ['requests_per_second'] = (float) The throttle for this request in sub-requests per second. 0 means set no throttle
     *        ['body']                = (array) The search definition using the Query DSL and the prototype for the index request (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function reindex($params)
    {
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;
        /** @var \Elasticsearch\Endpoints\Reindex $endpoint */
        $endpoint = $endpointBuilder('Reindex');
        $endpoint->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
     *        ['ignore_indices'] = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['preference']     = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']        = (string) Specific routing value
     *        ['source']         = (string) The URL-encoded request definition (instead of using request body)
     *        ['body']           = (array) The request definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function suggest($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Suggest $endpoint */
        $endpoint = $endpointBuilder('Suggest');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']                       = (string) The document ID (Required)
     *        ['index']                    = (string) The name of the index (Required)
     *        ['type']                     = (string) The type of the document (Required)
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)
     *        ['analyzer']                 = (string) The analyzer for the query string query
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR)
     *        ['df']                       = (string) The default field for query string query (default: _all)
     *        ['fields']                   = (list) A comma-separated list of fields to return in the response
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['parent']                   = (string) The ID of the parent document
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['routing']                  = (string) Specific routing value
     *        ['source']                   = (string) The URL-encoded query definition (instead of using the request body)
     *        ['_source']                  = (list) True or false to return the _source field or not, or a list of fields to return
     *        ['_source_exclude']          = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include']          = (list) A list of fields to extract and return from the _source field
     *        ['body']                     = (string) The URL-encoded query definition (instead of using the request body)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function explain($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Explain $endpoint */
        $endpoint = $endpointBuilder('Explain');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     *        ['type']                     = (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     *        ['analyzer']                 = (string) The analyzer to use for the query string
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR)
     *        ['df']                       = (string) The field to use as default where no field prefix is given in the query string
     *        ['explain']                  = (boolean) Specify whether to return detailed information about score computation as part of a hit
     *        ['fields']                   = (list) A comma-separated list of fields to return as part of a hit
     *        ['from']                     = (number) Starting offset (default: 0)
     *        ['ignore_indices']           = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['indices_boost']            = (list) Comma-separated list of index boosts
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['query_cache']              = (boolean) Enable query cache for this request
     *        ['request_cache']            = (boolean) Enable request cache for this request
     *        ['routing']                  = (list) A comma-separated list of specific routing values
     *        ['scroll']                   = (duration) Specify how long a consistent view of the index should be maintained for scrolled search
     *        ['search_type']              = (enum) Search operation type
     *        ['size']                     = (number) Number of hits to return (default: 10)
     *        ['sort']                     = (list) A comma-separated list of <field>:<direction> pairs
     *        ['source']                   = (string) The URL-encoded request definition using the Query DSL (instead of using request body)
     *        ['_source']                  = (list) True or false to return the _source field or not, or a list of fields to return
     *        ['_source_exclude']          = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include']          = (list) A list of fields to extract and return from the _source field
     *        ['stats']                    = (list) Specific 'tag' of the request for logging and statistical purposes
     *        ['suggest_field']            = (string) Specify which field to use for suggestions
     *        ['suggest_mode']             = (enum) Specify suggest mode
     *        ['suggest_size']             = (number) How many suggestions to return in response
     *        ['suggest_text']             = (text) The source text for which the suggestions should be returned
     *        ['timeout']                  = (time) Explicit operation timeout
     *        ['terminate_after']          = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     *        ['version']                  = (boolean) Specify whether to return document version as part of a hit
     *        ['body']                     = (array|string) The search definition using the Query DSL
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function search($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Search $endpoint */
        $endpoint = $endpointBuilder('Search');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     *        ['type']               = (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']            = (string) Specific routing value
     *        ['local']              = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function searchShards($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\SearchShards $endpoint */
        $endpoint = $endpointBuilder('SearchShards');
        $endpoint->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     *        ['type']                     = (list) A comma-separated list of document types to search; leave empty to perform the operation on all types
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function searchTemplate($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Search $endpoint */
        $endpoint = $endpointBuilder('SearchTemplate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['scroll_id'] = (string) The scroll ID for scrolled search
     *        ['scroll']    = (duration) Specify how long a consistent view of the index should be maintained for scrolled search
     *        ['body']      = (string) The scroll ID for scrolled search
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function scroll($params = array())
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');
        $scroll = $this->extractArgument($params, 'scroll');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Scroll $endpoint */
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setScrollID($scrollID)
                 ->setScroll($scroll)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['scroll_id'] = (string) The scroll ID for scrolled search
     *        ['scroll']    = (duration) Specify how long a consistent view of the index should be maintained for scrolled search
     *        ['body']      = (string) The scroll ID for scrolled search
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function clearScroll($params = array())
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\ClearScroll $endpoint */
        $endpoint = $endpointBuilder('ClearScroll');
        $endpoint->setScrollID($scrollID)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']                = (string) Document ID (Required)
     *        ['index']             = (string) The name of the index (Required)
     *        ['type']              = (string) The type of the document (Required)
     *        ['consistency']       = (enum) Explicit write consistency setting for the operation
     *        ['fields']            = (list) A comma-separated list of fields to return in the response
     *        ['lang']              = (string) The script language (default: mvel)
     *        ['parent']            = (string) ID of the parent document
     *        ['refresh']           = (boolean) Refresh the index after performing the operation
     *        ['replication']       = (enum) Specific replication type
     *        ['retry_on_conflict'] = (number) Specify how many times should the operation be retried when a conflict occurs (default: 0)
     *        ['routing']           = (string) Specific routing value
     *        ['script']            = () The URL-encoded script definition (instead of using request body)
     *        ['timeout']           = (time) Explicit operation timeout
     *        ['timestamp']         = (time) Explicit timestamp for the document
     *        ['ttl']               = (duration) Expiration time for the document
     *        ['version_type']      = (number) Explicit version number for concurrency control
     *        ['body']              = (array) The request definition using either `script` or partial `doc`
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function update($params)
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Update $endpoint */
        $endpoint = $endpointBuilder('Update');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of index names to search; use `_all` or
     * empty string to perform the operation on all indices (Required)
     *        ['type']                     = (list) A comma-separated list of document types to search; leave empty to
     * perform the operation on all types
     *        ['analyzer']                 = (string) The analyzer to use for the query string
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcard and prefix queries should be analyzed
     * (default: false)
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR) (AND,OR)
     * (default: OR)
     *        ['df']                       = (string) The field to use as default where no field prefix is given in the
     * query string
     *        ['explain']                  = (boolean) Specify whether to return detailed information about score
     * computation as part of a hit
     *        ['fields']                   = (list) A comma-separated list of fields to return as part of a hit
     *        ['fielddata_fields']         = (list) A comma-separated list of fields to return as the field data
     * representation of a field for each hit
     *        ['from']                     = (number) Starting offset (default: 0)
     *        ['ignore_unavailable']       = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']         = (boolean) Whether to ignore if a wildcard indices expression resolves into
     * no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['conflicts']                = (enum) What to do when the reindex hits version conflicts? (abort,proceed)
     * (default: abort)
     *        ['expand_wildcards']         = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing
     * text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['routing']                  = (list) A comma-separated list of specific routing values
     *        ['scroll']                   = (duration) Specify how long a consistent view of the index should be
     * maintained for scrolled search
     *        ['search_type']              = (enum) Search operation type (query_then_fetch,dfs_query_then_fetch)
     *        ['search_timeout']           = (time) Explicit timeout for each search request. Defaults to no timeout.
     *        ['size']                     = (number) Number of hits to return (default: 10)
     *        ['sort']                     = (list) A comma-separated list of <field>:<direction> pairs
     *        ['_source']                  = (list) True or false to return the _source field or not, or a list of
     * fields to return
     *        ['_source_exclude']          = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include']          = (list) A list of fields to extract and return from the _source field
     *        ['terminate_after']          = (number) The maximum number of documents to collect for each shard, upon
     * reaching which the query execution will terminate early.
     *        ['stats']                    = (list) Specific 'tag' of the request for logging and statistical purposes
     *        ['suggest_field']            = (string) Specify which field to use for suggestions
     *        ['suggest_mode']             = (enum) Specify suggest mode (missing,popular,always) (default: missing)
     *        ['suggest_size']             = (number) How many suggestions to return in response
     *        ['suggest_text']             = (text) The source text for which the suggestions should be returned
     *        ['timeout']                  = (time) Time each individual bulk request should wait for shards that are
     * unavailable. (default: 1m)
     *        ['track_scores']             = (boolean) Whether to calculate and return scores even if they are not used
     * for sorting
     *        ['version']                  = (boolean) Specify whether to return document version as part of a hit
     *        ['version_type']             = (boolean) Should the document increment the version number (internal) on
     * hit or not (reindex)
     *        ['request_cache']            = (boolean) Specify if request cache should be used for this request or not,
     * defaults to index level setting
     *        ['refresh']                  = (boolean) Should the effected indexes be refreshed?
     *        ['consistency']              = (enum) Explicit write consistency setting for the operation
     * (one,quorum,all)
     *        ['scroll_size']              = (integer) Size on the scroll request powering the update_by_query
     *        ['wait_for_completion']      = (boolean) Should the request should block until the reindex is complete.
     * (default: false)
     *        ['body']                     = The search definition using the Query DSL
     *
     * @param array $params
     *
     * @return array
     */
    public function updateByQuery($params = array())
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\UpdateByQuery $endpoint */
        $endpoint = $endpointBuilder('UpdateByQuery');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The script ID (Required)
     *        ['lang'] = (string) The script language (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getScript($params)
    {
        $id = $this->extractArgument($params, 'id');
        $lang = $this->extractArgument($params, 'lang');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Script\Get $endpoint */
        $endpoint = $endpointBuilder('Script\Get');
        $endpoint->setID($id)
                 ->setLang($lang);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The script ID (Required)
     *        ['lang'] = (string) The script language (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteScript($params)
    {
        $id = $this->extractArgument($params, 'id');
        $lang = $this->extractArgument($params, 'lang');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Script\Delete $endpoint */
        $endpoint = $endpointBuilder('Script\Delete');
        $endpoint->setID($id)
                 ->setLang($lang);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The script ID (Required)
     *        ['lang'] = (string) The script language (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putScript($params)
    {
        $id   = $this->extractArgument($params, 'id');
        $lang = $this->extractArgument($params, 'lang');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Script\Put $endpoint */
        $endpoint = $endpointBuilder('Script\Put');
        $endpoint->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The search template ID (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getTemplate($params)
    {
        $id = $this->extractArgument($params, 'id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Template\Get $endpoint */
        $endpoint = $endpointBuilder('Template\Get');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']   = (string) The search template ID (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteTemplate($params)
    {
        $id = $this->extractArgument($params, 'id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Template\Delete $endpoint */
        $endpoint = $endpointBuilder('Template\Delete');
        $endpoint->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     *        ['fields']             = (list) A comma-separated list of fields for to get field statistics for (min value, max value, and more)
     *        ['level']              = (enum) Defines if field stats should be returned on a per index level or on a cluster wide level
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function fieldStats($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\FieldStats $endpoint */
        $endpoint = $endpointBuilder('FieldStats');
        $endpoint->setIndex($index)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function fieldCaps($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\FieldCaps $endpoint */
        $endpoint = $endpointBuilder('FieldCaps');
        $endpoint->setIndex($index)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['id']                 = (string) ID of the template to render
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function renderSearchTemplate($params = array())
    {
        $body = $this->extractArgument($params, 'body');
        $id   = $this->extractArgument($params, 'id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\RenderSearchTemplate $endpoint */
        $endpoint = $endpointBuilder('RenderSearchTemplate');
        $endpoint->setBody($body)
            ->setID($id);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Operate on the Indices Namespace of commands
     *
     * @return IndicesNamespace
     */
    public function indices()
    {
        return $this->indices;
    }

    /**
     * Operate on the Cluster namespace of commands
     *
     * @return ClusterNamespace
     */
    public function cluster()
    {
        return $this->cluster;
    }

    /**
     * Operate on the Nodes namespace of commands
     *
     * @return NodesNamespace
     */
    public function nodes()
    {
        return $this->nodes;
    }

    /**
     * Operate on the Snapshot namespace of commands
     *
     * @return SnapshotNamespace
     */
    public function snapshot()
    {
        return $this->snapshot;
    }

    /**
     * Operate on the Cat namespace of commands
     *
     * @return CatNamespace
     */
    public function cat()
    {
        return $this->cat;
    }

    /**
     * Operate on the Ingest namespace of commands
     *
     * @return IngestNamespace
     */
    public function ingest()
    {
        return $this->ingest;
    }

    /**
     * Operate on the Tasks namespace of commands
     *
     * @return TasksNamespace
     */
    public function tasks()
    {
        return $this->tasks;
    }

    /**
     * Operate on the Remote namespace of commands
     *
     * @return RemoteNamespace
     */
    public function remote()
    {
        return $this->remote;
    }

    /**
     * Catchall for registered namespaces
     *
     * @param $name
     * @param $arguments
     * @return Object
     * @throws BadMethodCallException if the namespace cannot be found
     */
    public function __call($name, $arguments)
    {
        if (isset($this->registeredNamespaces[$name])) {
            return $this->registeredNamespaces[$name];
        }
        throw new BadMethodCallException("Namespace [$name] not found");
    }

    /**
     * @param array $params
     * @param string $arg
     *
     * @return null|mixed
     */
    public function extractArgument(&$params, $arg)
    {
        if (is_object($params) === true) {
            $params = (array) $params;
        }

        if (array_key_exists($arg, $params) === true) {
            $val = $params[$arg];
            unset($params[$arg]);

            return $val;
        } else {
            return null;
        }
    }

    private function verifyNotNullOrEmpty($name, $var)
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
     * @param $endpoint AbstractEndpoint
     *
     * @throws \Exception
     * @return array
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
