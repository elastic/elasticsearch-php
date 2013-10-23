<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 11:41 AM
 */

namespace Elasticsearch;

use Elasticsearch\Common\DICBuilder;
use Elasticsearch\Common\Exceptions;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\UnexpectedValueException;
use Elasticsearch\Endpoints;
use Elasticsearch\Namespaces\ClusterNamespace;
use Elasticsearch\Namespaces\IndicesNamespace;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;

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
    protected $transport;

    /**
     * @var \Pimple
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

    /** @var  callback */
    protected $dicEndpoints;


    /**
     * Client constructor
     *
     * @param array $params Array of injectable parameters
     */
    public function __construct($params = array())
    {
        $this->setParams($params);
        $this->setLogging();
        $this->transport    = $this->params['transport'];
        $this->indices      = $this->params['indicesNamespace'];
        $this->cluster      = $this->params['clusterNamespace'];
        $this->dicEndpoints = $this->params['endpoint'];
    }


    /**
     *
     *
     * @return array
     */
    public function info()
    {

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Info $endpoint */
        $endpoint = $endpointBuilder('Info');
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    public function ping()
    {

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Ping $endpoint */
        $endpoint = $endpointBuilder('Ping');

        try {
            $response = $endpoint->performRequest();
        } catch (Missing404Exception $exception) {
            return false;
        }


        if ($response['status'] === 200) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * $params['id']             = (string) The document ID (Required)
     *        ['index']          = (string) The name of the index (Required)
     *        ['type']           = (string) The type of the document (use `_all` to fetch the first document matching the ID across all types) (Required)
     *        ['ignore_missing'] = ??
     *        ['fields']         = (list) A comma-separated list of fields to return in the response
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
    public function get($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Get $endpoint */
        $endpoint = $endpointBuilder('Get');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Get $endpoint */
        $endpoint = $endpointBuilder('Get');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->returnOnlySource();
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Delete $endpoint */
        $endpoint = $endpointBuilder('Delete');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * @param array $params
     *
     * @return array
     */
    public function deleteByQuery($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\DeleteByQuery $endpoint */
        $endpoint = $endpointBuilder('DeleteByQuery');
        $endpoint->setIndex($index)
                ->setType($type)
                ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']          = (list) A comma-separated list of indices to restrict the results
     *        ['type']           = (list) A comma-separated list of types to restrict the results
     *        ['ignore_indices'] = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['min_score']      = (number) Include only documents with a specific `_score` value in the result
     *        ['preference']     = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']        = (string) Specific routing value
     *        ['source']         = (string) The URL-encoded query definition (instead of using the request body)
     *        ['body']           = (string) The URL-encoded query definition (instead of using the request body)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function count($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Count $endpoint */
        $endpoint = $endpointBuilder('Count');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']        = (string) The name of the index with a registered percolator query (Required)
     *        ['type']         = (string) The document type (Required)
     *        ['prefer_local'] = (boolean) With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)
     *        ['body']         = (boolean) With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function percolate($params)
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Percolate $endpoint */
        $endpoint = $endpointBuilder('Percolate');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
     * @return array
     */
    public function exists($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Exists $endpoint */
        $endpoint = $endpointBuilder('Exists');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        try {
            $response = $endpoint->performRequest();
        } catch (Missing404Exception $exception) {
            return false;
        } catch (RoutingMissingException $exception) {
            return false;
        }


        if ($response['status'] === 200) {
            return true;
        } else {
            return false;
        }
    }


    /**
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
     *        ['search_indices']         = (list) A comma-separated list of indices to perform the query against (default: the index containing the document)
     *        ['search_query_hint']      = (string) The search query hint
     *        ['search_scroll']          = (string) A scroll search request definition
     *        ['search_size']            = (number) The number of documents to return (default: 10)
     *        ['search_source']          = (string) A specific search request definition (instead of using the request body)
     *        ['search_type']            = (string) Specific search type (eg. `dfs_then_fetch`, `count`, etc)
     *        ['search_types']           = (list) A comma-separated list of types to perform the query against (default: the same type as the document)
     *        ['stop_words']             = (list) A list of stop words to be ignored
     *        ['body']                   = (list) A list of stop words to be ignored
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mlt($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Mlt $endpoint */
        $endpoint = $endpointBuilder('Mlt');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']      = (string) The name of the index
     *        ['type']       = (string) The type of the document
     *        ['fields']     = (list) A comma-separated list of fields to return in the response
     *        ['parent']     = (string) The ID of the parent document
     *        ['preference'] = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['realtime']   = (boolean) Specify whether to perform the operation in realtime or search mode
     *        ['refresh']    = (boolean) Refresh the shard containing the document before performing the operation
     *        ['routing']    = (string) Specific routing value
     *        ['body']       = (string) Specific routing value
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function mget($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Mget $endpoint */
        $endpoint = $endpointBuilder('Mget');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']       = (list) A comma-separated list of index names to use as default
     *        ['type']        = (list) A comma-separated list of document types to use as default
     *        ['search_type'] = (enum) Search operation type
     *        ['body']        = (enum) Search operation type
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function msearch($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Msearch $endpoint */
        $endpoint = $endpointBuilder('Msearch');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['id']           = (string) Specific document ID (when the POST method is used)
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation
     *        ['parent']       = (string) ID of the parent document
     *        ['percolate']    = (string) Percolator queries to execute while indexing the document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['replication']  = (enum) Specific replication type
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type
     *        ['body']         = (enum) Specific version type
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function create($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Index $endpoint */
        $endpoint = $endpointBuilder('Index');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body)
                 ->createIfAbsent();
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']       = (string) Default index for items which don't provide one
     *        ['type']        = (string) Default document type for items which don't provide one
     *        ['consistency'] = (enum) Explicit write consistency setting for the operation
     *        ['refresh']     = (boolean) Refresh the index after performing the operation
     *        ['replication'] = (enum) Explicitly set the replication type
     *        ['body']        = (string) Default document type for items which don't provide one
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function bulk($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Bulk $endpoint */
        $endpoint = $endpointBuilder('Bulk');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']        = (string) The name of the index (Required)
     *        ['type']         = (string) The type of the document (Required)
     *        ['id']           = (string) Specific document ID (when the POST method is used)
     *        ['consistency']  = (enum) Explicit write consistency setting for the operation
     *        ['op_type']      = (enum) Explicit operation type
     *        ['parent']       = (string) ID of the parent document
     *        ['percolate']    = (string) Percolator queries to execute while indexing the document
     *        ['refresh']      = (boolean) Refresh the index after performing the operation
     *        ['replication']  = (enum) Specific replication type
     *        ['routing']      = (string) Specific routing value
     *        ['timeout']      = (time) Explicit operation timeout
     *        ['timestamp']    = (time) Explicit timestamp for the document
     *        ['ttl']          = (duration) Expiration time for the document
     *        ['version']      = (number) Explicit version number for concurrency control
     *        ['version_type'] = (enum) Specific version type
     *        ['body']         = (enum) Specific version type
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function index($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Index $endpoint */
        $endpoint = $endpointBuilder('Index');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['index']          = (list) A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
     *        ['ignore_indices'] = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['preference']     = (string) Specify the node or shard the operation should be performed on (default: random)
     *        ['routing']        = (string) Specific routing value
     *        ['source']         = (string) The URL-encoded request definition (instead of using request body)
     *        ['body']           = (string) The URL-encoded request definition (instead of using request body)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function suggest($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Suggest $endpoint */
        $endpoint = $endpointBuilder('Suggest');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
     *        ['body']                     = (string) The URL-encoded query definition (instead of using the request body)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function explain($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Explain $endpoint */
        $endpoint = $endpointBuilder('Explain');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
     *        ['routing']                  = (list) A comma-separated list of specific routing values
     *        ['scroll']                   = (duration) Specify how long a consistent view of the index should be maintained for scrolled search
     *        ['search_type']              = (enum) Search operation type
     *        ['size']                     = (number) Number of hits to return (default: 10)
     *        ['sort']                     = (list) A comma-separated list of <field>:<direction> pairs
     *        ['source']                   = (string) The URL-encoded request definition using the Query DSL (instead of using request body)
     *        ['stats']                    = (list) Specific 'tag' of the request for logging and statistical purposes
     *        ['suggest_field']            = (string) Specify which field to use for suggestions
     *        ['suggest_mode']             = (enum) Specify suggest mode
     *        ['suggest_size']             = (number) How many suggestions to return in response
     *        ['suggest_text']             = (text) The source text for which the suggestions should be returned
     *        ['timeout']                  = (time) Explicit operation timeout
     *        ['version']                  = (boolean) Specify whether to return document version as part of a hit
     *        ['body']                     = (boolean) Specify whether to return document version as part of a hit
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function search($params = array())
    {
        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Search $endpoint */
        $endpoint = $endpointBuilder('Search');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
        unset($params['scroll_id']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Scroll $endpoint */
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setScrollID($scrollID)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['id']                = (string) Document ID (Required)
     *        ['index']             = (string) The name of the index (Required)
     *        ['type']              = (string) The type of the document (Required)
     *        ['consistency']       = (enum) Explicit write consistency setting for the operation
     *        ['fields']            = (list) A comma-separated list of fields to return in the response
     *        ['lang']              = (string) The script language (default: mvel)
     *        ['parent']            = (string) ID of the parent document
     *        ['percolate']         = (string) Perform percolation during the operation; use specific registered query name, attribute, or wildcard
     *        ['refresh']           = (boolean) Refresh the index after performing the operation
     *        ['replication']       = (enum) Specific replication type
     *        ['retry_on_conflict'] = (number) Specify how many times should the operation be retried when a conflict occurs (default: 0)
     *        ['routing']           = (string) Specific routing value
     *        ['script']            = () The URL-encoded script definition (instead of using request body)
     *        ['timeout']           = (time) Explicit operation timeout
     *        ['timestamp']         = (time) Explicit timestamp for the document
     *        ['ttl']               = (duration) Expiration time for the document
     *        ['version_type']      = (number) Explicit version number for concurrency control
     *        ['body']              = (number) Explicit version number for concurrency control
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function update($params)
    {
        $id = $this->extractArgument($params, 'id');
        unset($params['id']);

        $index = $this->extractArgument($params, 'index');
        unset($params['index']);

        $type = $this->extractArgument($params, 'type');
        unset($params['type']);

        $body = $this->extractArgument($params, 'body');
        unset($params['body']);


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Update $endpoint */
        $endpoint = $endpointBuilder('Update');
        $endpoint->setID($id)
                 ->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
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
     * Sets up the DIC parameter object
     *
     * Merges user-specified parameters into the default list, then
     * builds a DIC to house all the information
     *
     * @param array $params Array of user settings
     *
     * @internal param array $hosts Array of hosts
     * @return void
     */
    private function setParams($params)
    {

        if (isset($params['hosts']) === true) {
            $hosts = $this->buildHostsFromSeed($params['hosts']);
            unset($params['hosts']);
        } else {
            $hosts = $this->getDefaultHost();
        }

        $dicBuilder   = new DICBuilder($hosts, $params);
        $this->params = $dicBuilder->getDIC();

    }


    /**
     * Sets up the logging object
     * If a user-defined logger is not available, builds a default file logger
     *
     * @return void
     */
    private function setLogging()
    {
        if ($this->params['logObject'] === null) {
           $this->setDefaultLogger();
        }

        if ($this->params['traceObject'] === null) {
            $this->setDefaultTracer();
        }

    }

    private function setDefaultLogger()
    {
        $log       = new Logger('log');
        $handler   = new StreamHandler(
            $this->params['logPath'],
            $this->params['logLevel']
        );
        $processor = new IntrospectionProcessor();

        $log->pushHandler($handler);
        $log->pushProcessor($processor);

        $this->params['logObject'] = $log;
    }

    private function setDefaultTracer()
    {
        $trace        = new Logger('trace');
        $traceHandler = new StreamHandler(
            $this->params['tracePath'],
            $this->params['traceLevel']
        );

        $trace->pushHandler($traceHandler);

        $this->params['traceObject'] = $trace;
    }


    /**
     * @return array
     */
    private function getDefaultHost()
    {
        return array(array('host' => 'localhost', 'port' => 9200));
    }


    /**
     * @param array $hosts
     *
     * @return array
     * @throws Common\Exceptions\InvalidArgumentException
     */
    private function buildHostsFromSeed($hosts)
    {
        if (is_array($hosts) === false) {
            throw new Exceptions\InvalidArgumentException('Hosts parameter must be an array of strings');
        }

        $finalHosts = array();
        foreach ($hosts as $host) {
            if (strpos($host, ':') !== false) {
                $finalHosts[] = $this->extractHostPortFromSeed($host);
            } else {
                $finalHosts[] = array('host' => $host);
            }
        }

        return $finalHosts;
    }


    /**
     * @param array $host
     *
     * @return array
     * @throws Common\Exceptions\InvalidArgumentException
     */
    private function extractHostPortFromSeed($host)
    {
        $host = explode(':', $host);
        if ($host[1] === '' || is_numeric($host[1]) === false) {
            throw new Exceptions\InvalidArgumentException('Port must be a valid integer');
        }

         return array(
            'host' => $host[0],
            'port' => (int)$host[1],
        );
    }

    /**
     * @param array $params
     * @param string $arg
     *
     * @return null|mixed
     */
    private function extractArgument($params, $arg)
    {
        if (isset($params[$arg]) === true) {
            return $params[$arg];
        } else {
            return null;
        }
    }


}
