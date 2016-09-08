<?php

namespace Elasticsearch;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\TransportException;
use Elasticsearch\Namespaces\BooleanRequestWrapper;
use Elasticsearch\Namespaces\CatNamespace;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Elasticsearch\Namespaces\NodesNamespace;
use Elasticsearch\Namespaces\SnapshotNamespace;
use Elasticsearch\Namespaces\TasksNamespace;

/**
 * Class Client
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
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

    /** @var  callback */
    protected $endpoints;

    /**
     * Client constructor
     *
     * @param Transport $transport
     * @param callable $endpoint
     */
    public function __construct(Transport $transport, callable $endpoint)
    {
        $this->transport = $transport;
        $this->endpoints = $endpoint;
        $this->indices = new IndicesNamespace($transport, $endpoint);
        $this->cluster = new ClusterNamespace($transport, $endpoint);
        $this->nodes = new NodesNamespace($transport, $endpoint);
        $this->snapshot = new SnapshotNamespace($transport, $endpoint);
        $this->cat = new CatNamespace($transport, $endpoint);
        $this->tasks = new TasksNamespace($transport, $endpoint);
    }

    /**
     * @param $params
     *
     * @return array
     */
    public function info($params = [])
    {
        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Info $endpoint */
        $endpoint = $endpointBuilder('Info');
        $response = $endpoint->setParams($params)->performRequest();

        return $endpoint->resultOrFuture($response);
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

        try {
            $response = $endpoint->setParams($params)->performRequest();
            $endpoint->resultOrFuture($response);
        } catch (Missing404Exception $exception) {
            return false;
        } catch (TransportException $exception) {
            return false;
        }

        return true;
    }

    /**
     * $params['id']              = (string) The document ID (Required)
     *        ['index']           = (string) The name of the index (Required)
     *        ['type']            = (string) The type of the document (use `_all` to fetch the first document matching
     * the ID across all types) (Required)
     *        ['ignore_missing']  = ??
     *        ['fields']          = (list) A comma-separated list of fields to return in the response
     *        ['parent']          = (string) The ID of the parent document
     *        ['preference']      = (string) Specify the node or shard the operation should be performed on (default:
     * random)
     *        ['realtime']        = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']         = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']         = (string) Specific routing value
     *        ['_source']         = (list) True or false to return the _source field or not, or a list of fields to
     * return
     *        ['_source_exclude'] = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (list) A list of fields to extract and return from the _source field
     *        ['version']         = (number) Explicit version number for concurrency control
     *        ['version_type']    = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']              = (string) The document ID (Required)
     *        ['index']           = (string) The name of the index (Required)
     *        ['type']            = (string) The type of the document; use `_all` to fetch the first document matching
     * the ID across all types (Required)
     *        ['parent']          = (string) The ID of the parent document
     *        ['preference']      = (string) Specify the node or shard the operation should be performed on (default:
     * random)
     *        ['realtime']        = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']         = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']         = (string) Specific routing value
     *        ['ignore_missing']  = ??
     *        ['_source']         = (list) True or false to return the _source field or not, or a list of fields to
     * return
     *        ['_source_exclude'] = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (list) A list of fields to extract and return from the _source field
     *        ['version']         = (number) Explicit version number for concurrency control
     *        ['version_type']    = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) The document ID (Required)
     *        ['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['consistency']  = (enum) Specific write consistency setting for the operation (one,quorum,all)
     *        ['parent']       = (string) ID of parent document
     *        ['replication']  = (enum) Specific replication type
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * @deprecated
     * $params[''] @todo finish the rest of these params
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both.
     *
     * @param array $params
     *
     * @return array
     */
    public function deleteByQuery($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of indices to restrict the results
     *        ['type']                     = (list) A comma-separated list of types to restrict the results
     *        ['ignore_unavailable']       = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']         = (boolean) Whether to ignore if a wildcard indices expression resolves into
     * no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']         = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['min_score']                = (number) Include only documents with a specific `_score` value in the
     * result
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['routing']                  = (string) Specific routing value
     *        ['source']                   = (string) The URL-encoded query definition (instead of using the request body)
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['analyzer']                 = (string) The analyzer to use for the query string
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcard and prefix queries should be analyzed
     * (default: false)
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR) (AND,OR)
     * (default: OR)
     *        ['df']                       = (string) The field to use as default where no field prefix is given in the
     * query string
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing
     * text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['body']                     = A query to restrict the results specified with the Query DSL (optional)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function count($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (string) The index of the document being count percolated. (Required)
     *        ['type']               = (string) The type of the document being count percolated. (Required)
     *        ['id']                 = (string) Substitute the document in the request body with a document that is
     * known by the specified id. On top of the id, the index and type parameter will be used to retrieve the document
     * from within the cluster. (Required)
     *        ['routing']            = (list) A comma-separated list of specific routing values
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['percolate_index']    = (string) The index to count percolate the document into. Defaults to index.
     *        ['percolate_type']     = (string) The type to count percolate document into. Defaults to type.
     *        ['version']            = (number) Explicit version number for concurrency control
     *        ['version_type']       = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']               = The count percolator request definition using the percolate DSL
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function countPercolate($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\CountPercolate $endpoint */
        $endpoint = $endpointBuilder('CountPercolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                = (string) The index of the document being percolated. (Required)
     *        ['type']                 = (string) The type of the document being percolated. (Required)
     *        ['id']                   = (string) Substitute the document in the request body with a document that is
     * known by the specified id. On top of the id, the index and type parameter will be used to retrieve the document
     * from within the cluster. (Required)
     *        ['routing']              = (list) A comma-separated list of specific routing values
     *        ['preference']           = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['ignore_unavailable']   = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']     = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']     = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['percolate_index']      = (string) The index to percolate the document into. Defaults to index.
     *        ['percolate_type']       = (string) The type to percolate document into. Defaults to type.
     *        ['percolate_routing']    = (string) The routing value to use when percolating the existing document.
     *        ['percolate_preference'] = (string) Which shard to prefer when executing the percolate request.
     *        ['percolate_format']     = (enum) Return an array of matching query IDs instead of objects (ids)
     *        ['version']              = (number) Explicit version number for concurrency control
     *        ['version_type']         = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']                 = The percolator request definition using the percolate DSL
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function percolate($params)
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Percolate $endpoint */
        $endpoint = $endpointBuilder('Percolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (string) The index of the document being count percolated to use as default
     *        ['type']               = (string) The type of the document being percolated to use as default.
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['body']               = The percolate request definitions (header & body pair), separated by newlines
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mpercolate($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']            = (string) The index in which the document resides. (Required)
     *        ['type']             = (string) The type of the document. (Required)
     *        ['id']               = (string) The id of the document, when not specified a doc param should be
     * supplied.
     *        ['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be
     * returned. (default: false)
     *        ['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of
     * total term frequencies should be returned. (default: true)
     *        ['dfs']              = (boolean) Specifies if distributed frequencies should be returned instead shard
     * frequencies. (default: false)
     *        ['fields']           = (list) A comma-separated list of fields to return.
     *        ['offsets']          = (boolean) Specifies if term offsets should be returned. (default: true)
     *        ['positions']        = (boolean) Specifies if term positions should be returned. (default: true)
     *        ['payloads']         = (boolean) Specifies if term payloads should be returned. (default: true)
     *        ['preference']       = (string) Specify the node or shard the operation should be performed on (default:
     * random).
     *        ['routing']          = (string) Specific routing value.
     *        ['parent']           = (string) Parent id of documents.
     *        ['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default:
     * true).
     *        ['version']          = (number) Explicit version number for concurrency control
     *        ['version_type']     = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']             = Define parameters and or supply a document to get termvectors for. See
     * documentation.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function termvectors($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');
        $useDeprecated = $this->extractArgument($params, 'shouldUseDeprecated');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\TermVectors $endpoint */
        $endpoint = $endpointBuilder('TermVectors');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);
        if ($useDeprecated) {
           $endpoint->useDeprecated();
        }
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']            = (string) Default index for items which don't provide one
     *        ['type']             = (string) Default document type for items which don't provide one
     *        ['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs"."
     *        ['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs"."
     *        ['fields']           = (list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs"."
     *        ['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs"."
     *        ['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs"."
     *        ['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     *        ['preference']       = (string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
     *        ['routing']          = (string) Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     *        ['parent']           = (string) Parent id of documents. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     *        ['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default: true).
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function termvector($params = [])
    {
        $params['shouldUseDeprecated'] = true;
        return $this->termvectors($params);
    }

    /**
     * $params['index']            = (string) The index in which the document resides.
     *        ['type']             = (string) The type of the document.
     *        ['ids']              = (list) A comma-separated list of documents ids. You must define ids as parameter
     * or set "ids" or "docs" in the request body
     *        ['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be
     * returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (default:
     * false)
     *        ['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of
     * total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body
     * "params" or "docs". (default: true)
     *        ['fields']           = (list) A comma-separated list of fields to return. Applies to all returned
     * documents unless otherwise specified in body "params" or "docs".
     *        ['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned
     * documents unless otherwise specified in body "params" or "docs". (default: true)
     *        ['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned
     * documents unless otherwise specified in body "params" or "docs". (default: true)
     *        ['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned
     * documents unless otherwise specified in body "params" or "docs". (default: true)
     *        ['preference']       = (string) Specify the node or shard the operation should be performed on (default:
     * random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
     *        ['routing']          = (string) Specific routing value. Applies to all returned documents unless
     * otherwise specified in body "params" or "docs".
     *        ['parent']           = (string) Parent id of documents. Applies to all returned documents unless
     * otherwise specified in body "params" or "docs".
     *        ['realtime']         = (boolean) Specifies if requests are real-time as opposed to near-real-time
     * (default: true).
     *        ['version']          = (number) Explicit version number for concurrency control
     *        ['version_type']     = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']             = Define ids, documents, parameters or a list of parameters per document here. You
     * must at least provide a list of document ids. See documentation.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mtermvectors($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MTermVectors $endpoint */
        $endpoint = $endpointBuilder('MTermVectors');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']         = (string) The document ID (Required)
     *        ['index']      = (string) The name of the index (Required)
     *        ['type']       = (string) The type of the document (use `_all` to fetch the first document matching the
     * ID across all types) (Required)
     *        ['parent']     = (string) The ID of the parent document
     *        ['preference'] = (string) Specify the node or shard the operation should be performed on (default:
     * random)
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

        return BooleanRequestWrapper::performRequest($endpoint);
    }

    /**
     * @deprecated
     * $params['id']                     = (string) The document ID (Required)
     *        ['index']                  = (string) The name of the index (Required)
     *        ['type']                   = (string) The type of the document (use `_all` to fetch the first document matching the ID across all types) (Required)
     *        ['boost_terms']            = (number) The boost factor
     *        ['max_doc_freq']           = (number) The word occurrence frequency as count: words with higher occurrence in the corpus will be ignored
     *        ['max_query_terms']        = (number) The maximum query terms to be included in the generated query
     *        ['max_word_len']           = (number) The minimum length of the word: longer words will be ignored
     *        ['min_doc_freq']           = (number) The word occurrence frequency as count: words with lower occurrence in the corpus will be ignored
     *        ['min_term_freq']          = (number) The term frequency as percent: terms with lower occurrence in the source document will be ignored
     *        ['min_word_len']           = (number) The minimum length of the word: shorter words will be ignored
     *        ['mlt_fields']             = (list) Specific fields to perform the query against
     *        ['percent_terms_to_match'] = (number) How many terms have to match in order to consider the document a match (default: 0.3)
     *        ['routing']                = (string) Specific routing value
     *        ['search_from']            = (number) The offset from which to return results
     *        ['search_indices']         = (list) A commaseparated list of indices to perform the query against (default: the index containing the document)
     *        ['search_query_hint']      = (string) The search query hint
     *        ['search_scroll']          = (string) A scroll search request definition
     *        ['search_size']            = (number) The number of documents to return (default: 10)
     *        ['search_source']          = (string) A specific search request definition (instead of using the request body)
     *        ['search_type']            = (string) Specific search type (eg. `dfs_then_fetch`, `count`, etc)
     *        ['search_types']           = (list) A commaseparated list of types to perform the query against (default: the same type as the document)
     *        ['stop_words']             = (list) A list of stop words to be ignored
     *        ['body']                   = (array) A specific search request definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mlt($params)
    {
        $id = $this->extractArgument($params, 'id');

        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Mlt $endpoint */
        $endpoint = $endpointBuilder('Mlt');
        $endpoint->setID($id)
                ->setIndex($index)
                ->setType($type)
                ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']           = (string) The name of the index
     *        ['type']            = (string) The type of the document
     *        ['fields']          = (list) A comma-separated list of fields to return in the response
     *        ['preference']      = (string) Specify the node or shard the operation should be performed on (default:
     * random)
     *        ['parent']          = (string) The ID of the parent document
     *        ['realtime']        = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']         = (boolean) Refresh the shard containing the document before performing the operation
     *        ['_source']         = (list) True or false to return the _source field or not, or a list of fields to
     * return
     *        ['_source_exclude'] = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include'] = (list) A list of fields to extract and return from the _source field
     *        ['body']            = Document identifiers; can be either `docs` (containing full document information)
     * or `ids` (when index and type is provided in the URL.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mget($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MGet $endpoint */
        $endpoint = $endpointBuilder('MGet');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']       = (list) A comma-separated list of index names to use as default
     *        ['type']        = (list) A comma-separated list of document types to use as default
     *        ['search_type'] = (enum) Search operation type
     * (query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch,count,scan)
     *        ['body']        = The request definitions (metadata-search request definition pairs), separated by
     * newlines
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function msearch($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\MSearch $endpoint */
        $endpoint = $endpointBuilder('MSearch');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Document ID
     *        ['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation (one,quorum,all)
     *        ['op_type']      = (enum) Explicit operation type (index,create) (default: index)
     *        ['parent']       = (string) ID of the parent document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']         = The document
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

        /** @var \Elasticsearch\Endpoints\Index $endpoint */
        $endpoint = $endpointBuilder('Index');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body)
                 ->createIfAbsent();
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']       = (string) Default index for items which don't provide one
     *        ['type']        = (string) Default document type for items which don't provide one
     *        ['consistency'] = (enum) Explicit write consistency setting for the operation (one,quorum,all)
     *        ['refresh']     = (boolean) Refresh the index after performing the operation
     *        ['routing']     = (string) Specific routing value
     *        ['timeout']     = (time) Explicit operation timeout
     *        ['fields']      = (list) Default comma-separated list of fields to return in the response for updates
     *        ['body']        = The operation definition and data (action-data pairs), separated by newlines
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function bulk($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Document ID
     *        ['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['percolate']    = (string) Percolator queries to execute while indexing the document
     *        ['replication']  = (enum) Specific replication type
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation (one,quorum,all)
     *        ['op_type']      = (enum) Explicit operation type (index,create) (default: index)
     *        ['parent']       = (string) ID of the parent document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']         = The document
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to restrict the operation; use
     * `_all` or empty string to perform the operation on all indices
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['ignore_indices']     = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['routing']            = (string) Specific routing value
     *        ['source']             = (string) The URL-encoded request definition (instead of using request body)
     *        ['body']               = The request definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function suggest($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']                       = (string) The document ID (Required)
     *        ['index']                    = (string) The name of the index (Required)
     *        ['type']                     = (string) The type of the document (Required)
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcards and prefix queries in the query string
     * query should be analyzed (default: false)
     *        ['analyzer']                 = (string) The analyzer for the query string query
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR) (AND,OR)
     * (default: OR)
     *        ['df']                       = (string) The default field for query string query (default: _all)
     *        ['fields']                   = (list) A comma-separated list of fields to return in the response
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing
     * text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['parent']                   = (string) The ID of the parent document
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['routing']                  = (string) Specific routing value
     *        ['source']                   = (string) The URL-encoded query definition (instead of using the request
     * body)
     *        ['_source']                  = (list) True or false to return the _source field or not, or a list of
     * fields to return
     *        ['_source_exclude']          = (list) A list of fields to exclude from the returned _source field
     *        ['_source_include']          = (list) A list of fields to extract and return from the _source field
     *        ['body']                     = The query definition using the Query DSL
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of index names to search; use `_all` or
     * empty string to perform the operation on all indices
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
     *        ['ignore_indices']           = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['indices_boost']            = (list) Comma-separated list of index boosts
     *        ['query_cache']              = (boolean) Enable query cache for this request
     *        ['ignore_unavailable']       = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']         = (boolean) Whether to ignore if a wildcard indices expression resolves into
     * no concrete indices. (This includes `_all` string or when no indices have been specified)
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
     *        ['search_type']              = (enum) Search operation type
     * (query_then_fetch,dfs_query_then_fetch,count,scan)
     *        ['size']                     = (number) Number of hits to return (default: 10)
     *        ['sort']                     = (list) A comma-separated list of <field>:<direction> pairs
     *        ['source']                   = (string) The URL-encoded request definition using the Query DSL (instead of
     * using request body)
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
     *        ['timeout']                  = (time) Explicit operation timeout
     *        ['track_scores']             = (boolean) Whether to calculate and return scores even if they are not used
     * for sorting
     *        ['version']                  = (boolean) Specify whether to return document version as part of a hit
     *        ['request_cache']            = (boolean) Specify if request cache should be used for this request or not,
     * defaults to index level setting
     *        ['body']                     = The search definition using the Query DSL
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function search($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of indices to restrict the results
     *        ['type']                     = (list) A comma-separated list of types to restrict the results
     *        ['ignore_unavailable']       = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']         = (boolean) Whether to ignore if a wildcard indices expression resolves into
     * no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']         = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['min_score']                = (number) Include only documents with a specific `_score` value in the
     * result
     *        ['preference']               = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['routing']                  = (string) Specific routing value
     *        ['q']                        = (string) Query in the Lucene query string syntax
     *        ['analyzer']                 = (string) The analyzer to use for the query string
     *        ['analyze_wildcard']         = (boolean) Specify whether wildcard and prefix queries should be analyzed
     * (default: false)
     *        ['default_operator']         = (enum) The default operator for query string query (AND or OR) (AND,OR)
     * (default: OR)
     *        ['df']                       = (string) The field to use as default where no field prefix is given in the
     * query string
     *        ['lenient']                  = (boolean) Specify whether format-based query failures (such as providing
     * text to a numeric field) should be ignored
     *        ['lowercase_expanded_terms'] = (boolean) Specify whether query terms should be lowercased
     *        ['explain']                  = (boolean) Specify whether to return detailed information about score computation as part of a hit
     *        ['fields']                   = (list) A comma-separated list of fields to return as part of a hit
     *        ['from']                     = (number) Starting offset (default: 0)
     *        ['ignore_indices']           = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['indices_boost']            = (list) Comma-separated list of index boosts
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
     *        ['version']                  = (boolean) Specify whether to return document version as part of a hit
     *        ['body']                     = A query to restrict the results specified with the Query DSL (optional)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function searchExists($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\SearchExists $endpoint */
        $endpoint = $endpointBuilder('SearchExists');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty
     * string to perform the operation on all indices
     *        ['type']               = (list) A comma-separated list of document types to search; leave empty to
     * perform the operation on all types
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['routing']            = (string) Specific routing value
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
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
    public function searchShards($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty
     * string to perform the operation on all indices
     *        ['type']               = (list) A comma-separated list of document types to search; leave empty to
     * perform the operation on all types
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['preference']         = (string) Specify the node or shard the operation should be performed on
     * (default: random)
     *        ['routing']            = (list) A comma-separated list of specific routing values
     *        ['scroll']             = (duration) Specify how long a consistent view of the index should be maintained
     * for scrolled search
     *        ['search_type']        = (enum) Search operation type
     * (query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch,count,scan)
     *        ['body']               = The search definition template and its params
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function searchTemplate($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\SearchTemplate $endpoint */
        $endpoint = $endpointBuilder('SearchTemplate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['scroll_id'] = (string) The scroll ID for scrolled search
     *        ['scroll']    = (duration) Specify how long a consistent view of the index should be maintained for
     * scrolled search
     *        ['body']      = The scroll ID if not passed by URL or query parameter.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function scroll($params = [])
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Scroll $endpoint */
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setScrollId($scrollID)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['scroll_id'] = (list) A comma-separated list of scroll IDs to clear
     *        ['scroll']    = (duration) Specify how long a consistent view of the index should be maintained for
     * scrolled search
     *        ['body']      = A comma-separated list of scroll IDs to clear if none was specified via the scroll_id
     * parameter
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function clearScroll($params = [])
    {
        $scrollID = $this->extractArgument($params, 'scroll_id');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Scroll $endpoint */
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setScrollId($scrollID)
                 ->setBody($body)
                 ->setClearScroll(true);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']                = (string) Document ID (Required)
     *        ['index']             = (string) The name of the index (Required)
     *        ['type']              = (string) The type of the document (Required)
     *        ['consistency']       = (enum) Explicit write consistency setting for the operation (one,quorum,all)
     *        ['fields']            = (list) A comma-separated list of fields to return in the response
     *        ['lang']              = (string) The script language (default: groovy)
     *        ['parent']            = (string) ID of the parent document. Is is only used for routing and when for the
     * upsert request
     *        ['percolate']         = (string) Perform percolation during the operation; use specific registered query
     * name, attribute, or wildcard
     *        ['refresh']           = (boolean) Refresh the index after performing the operation
     *        ['replication']       = (enum) Specific replication type
     *        ['retry_on_conflict'] = (number) Specify how many times should the operation be retried when a conflict
     * occurs (default: 0)
     *        ['routing']           = (string) Specific routing value
     *        ['script']            = The URL-encoded script definition (instead of using request body)
     *        ['script_id']         = The id of a stored script
     *        ['scripted_upsert']   = (boolean) True if the script referenced in script or script_id should be called
     * to perform inserts - defaults to false
     *        ['timeout']           = (time) Explicit operation timeout
     *        ['timestamp']         = (time) Explicit timestamp for the document
     *        ['ttl']               = (duration) Expiration time for the document
     *        ['version']           = (number) Explicit version number for concurrency control
     *        ['version_type']      = (enum) Specific version type (internal,force)
     *        ['body']              = The request definition using either `script` or partial `doc`
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Script ID (Required)
     *        ['lang']         = (string) Script language (Required)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Script ID (Required)
     *        ['lang']         = (string) Script language (Required)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Script ID (Required)
     *        ['lang']         = (string) Script language (Required)
     *        ['op_type']      = (enum) Explicit operation type (index,create) (default: index)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']         = The document
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putScript($params)
    {
        $id = $this->extractArgument($params, 'id');
        $lang = $this->extractArgument($params, 'lang');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Script\Put $endpoint */
        $endpoint = $endpointBuilder('Script\Put');
        $endpoint->setID($id)
                 ->setLang($lang)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Template ID (Required)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Template ID (Required)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']           = (string) Template ID (Required)
     *        ['op_type']      = (enum) Explicit operation type (index,create) (default: index)
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type (internal,external,external_gte,force)
     *        ['body']         = The document
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putTemplate($params)
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Template\Put $endpoint */
        $endpoint = $endpointBuilder('Template\Put');
        $endpoint->setID($id)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['fields']             = (list) A comma-separated list of fields for to get field statistics for (min
     * value, max value, and more)
     *        ['level']              = (enum) Defines if field stats should be returned on a per index level or on a
     * cluster wide level (indices,cluster) (default: cluster)
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['body']               = Field json objects containing the name and optionally a range to filter out
     * indices result, that have results outside the defined bounds
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function fieldStats($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\FieldStats $endpoint */
        $endpoint = $endpointBuilder('FieldStats');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['refresh']             = (boolean) Should the effected indexes be refreshed?
     *        ['timeout']             = (time) Time each individual bulk request should wait for shards that are
     * unavailable. (default: 1m)
     *        ['consistency']         = (enum) Explicit write consistency setting for the operation (one,quorum,all)
     *        ['wait_for_completion'] = (boolean) Should the request should block until the reindex is complete.
     * (default: false)
     *        ['body']                = The search definition using the Query DSL and the prototype for the index
     * request.
     *
     * @param array $params
     *
     * @return array
     */
    public function reindex($params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Reindex $endpoint */
        $endpoint = $endpointBuilder('Reindex');
        $response = $endpoint->setParams($params)
            ->setBody($body)
            ->performRequest();

        return $endpoint->resultOrFuture($response);
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
    public function updateByQuery($params = [])
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
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['id']   = (string) The id of the stored search template
     *        ['body'] = The search definition template and its params
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function renderSearchTemplate($params = [])
    {
        $body = $this->extractArgument($params, 'body');
        $id = $this->extractArgument($params, 'id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\RenderSearchTemplate $endpoint */
        $endpoint = $endpointBuilder('RenderSearchTemplate');
        $endpoint->setBody($body)
                 ->setID($id);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
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
     * Operate on the Task namespace of commands
     *
     * @return TasksNamespace
     */
    public function tasks()
    {
        return $this->tasks;
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
            $params = (array)$params;
        }

        if (isset($params[$arg]) === true) {
            $val = $params[$arg];
            unset($params[$arg]);

            return $val;
        } else {
            return null;
        }
    }

    /**
     * @param string $name
     * @param mixed $var
     */
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
}
