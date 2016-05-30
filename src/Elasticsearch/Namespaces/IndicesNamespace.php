<?php

namespace Elasticsearch\Namespaces;

/**
 * Class IndicesNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\IndicesNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class IndicesNamespace extends AbstractNamespace
{
    /**
     * $params['index']              = (list) A comma-separated list of indices to check (Required)
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function exists($params)
    {
        $index = $this->extractArgument($params, 'index');

        //manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Exists $endpoint */
        $endpoint = $endpointBuilder('Indices\Exists');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names (Required)
     *        ['feature']            = (list) A comma-separated list of features
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['ignore_unavailable'] = (boolean) Ignore unavailable indexes (default: false)
     *        ['allow_no_indices']   = (boolean) Ignore if a wildcard expression resolves to no concrete indices
     * (default: false)
     *        ['expand_wildcards']   = (enum) Whether wildcard expressions should get expanded to open or closed
     * indices (default: open) (open,closed,none,all) (default: open)
     *        ['flat_settings']      = (boolean) Return settings in flat format (default: false)
     *        ['human']              = (boolean) Whether to return version and creation date values in human-readable
     * format. (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return bool
     */
    public function get($params)
    {
        $index = $this->extractArgument($params, 'index');
        $feature = $this->extractArgument($params, 'feature');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Get');
        $endpoint->setIndex($index)
                 ->setFeature($feature)
                 ->setParams($params);

        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['ignore_unavailable']  = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']    = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']    = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['human']               = (boolean) Whether to return time and byte values in human-readable format.
     * (default: false)
     *        ['operation_threading'] = TODO: ?
     *        ['verbose']             = (boolean) Includes detailed memory usage by Lucene. (default: false)
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

        /** @var \Elasticsearch\Endpoints\Indices\Segments $endpoint */
        $endpoint = $endpointBuilder('Indices\Segments');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']           = (string) The name of the template (Required)
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteTemplate($params)
    {
        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Template\Delete $endpoint */
        $endpoint = $endpointBuilder('Indices\Template\Delete');
        $endpoint->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names to delete warmers from (supports
     * wildcards); use `_all` to perform the operation on all indices. (Required)
     *        ['name']           = (list) A comma-separated list of warmer names to delete (supports wildcards); use
     * `_all` to delete all warmers in the specified indices. You must specify a name either in the uri or in the
     * parameters.
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteWarmer($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Warmer\Delete $endpoint */
        $endpoint = $endpointBuilder('Indices\Warmer\Delete');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of indices to delete; use `_all` or `*` string to
     * delete all indices (Required)
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Delete $endpoint */
        $endpoint = $endpointBuilder('Indices\Delete');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']             = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['metric']            = (list) Limit the information returned the specific metrics.
     *        ['completion_fields'] = (list) A comma-separated list of fields for `fielddata` and `suggest` index
     * metric (supports wildcards)
     *        ['fielddata_fields']  = (list) A comma-separated list of fields for `fielddata` index metric (supports
     * wildcards)
     *        ['fields']            = (list) A comma-separated list of fields for `fielddata` and `completion` index
     * metric (supports wildcards)
     *        ['groups']            = (list) A comma-separated list of search groups for `search` index metric
     *        ['human']             = (boolean) Whether to return time and byte values in human-readable format.
     * (default: false)
     *        ['level']             = (enum) Return stats aggregated at cluster, index or shard level
     * (cluster,indices,shards) (default: indices)
     *        ['types']             = (list) A comma-separated list of document types for the `indexing` index metric
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function stats($params = [])
    {
        $metric = $this->extractArgument($params, 'metric');

        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Stats $endpoint */
        $endpoint = $endpointBuilder('Indices\Stats');
        $endpoint->setIndex($index)
                 ->setMetric($metric);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * @deprecated 
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all
     * indices
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both.
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function snapshotIndex($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Gateway\Snapshot $endpoint */
        $endpoint = $endpointBuilder('Indices\Gateway\Snapshot');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['master_timeout']     = (time) Specify timeout for connection to master
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['flat_settings']      = (boolean) Return settings in flat format (default: false)
     *        ['body']               = The index settings to be updated
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putSettings($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Settings\Put $endpoint */
        $endpoint = $endpointBuilder('Indices\Settings\Put');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names
     *        ['type']               = (list) A comma-separated list of document types
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getMapping($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Mapping\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Mapping\Get');
        $endpoint->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names
     *        ['type']               = (list) A comma-separated list of document types
     *        ['fields']             = (list) A comma-separated list of fields (Required)
     *        ['include_defaults']   = (boolean) Whether the default mapping values should be returned as well
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getFieldMapping($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $fields = $this->extractArgument($params, 'fields');

        if (!isset($fields)) {
            $fields = $this->extractArgument($params, 'field');
        }


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Mapping\GetField $endpoint */
        $endpoint = $endpointBuilder('Indices\Mapping\GetField');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setFields($fields);

        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all
     * indices
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
    public function flushSynced($params = [])
    {
        $params['sync'] = true;

        return $this->flush($params);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all
     * indices
     *        ['force']              = (boolean) Whether a flush should be forced even if it is not necessarily needed
     * ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented
     * even if no uncommitted changes are present. (This setting can be considered as internal)
     *        ['full']               = (boolean) TODO: ?
     *        ['wait_if_ongoing']    = (boolean) If set to true the flush operation will block until the flush can be
     * executed if another flush operation is already executing. The default is false and will cause an exception to be
     * thrown on the shard level if another flush operation is already running.
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
    public function flush($params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $isSynced = (bool)$this->extractArgument($params, 'sync');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Flush $endpoint */
        $endpoint = $endpointBuilder('Indices\Flush');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $endpoint->setSynced($isSynced);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['ignore_unavailable']  = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']    = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']    = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['force']               = (boolean) Force a refresh even if not required (default: false)
     *        ['operation_threading'] = TODO: ?
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function refresh($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Refresh $endpoint */
        $endpoint = $endpointBuilder('Indices\Refresh');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']       = (list) A comma-separated list of index names; use `_all` or empty string to perform the
     * operation on all indices
     *        ['detailed']    = (boolean) Whether to display detailed information about shard recovery (default: false)
     *        ['active_only'] = (boolean) Display only those recoveries that are currently on-going (default: false)
     *        ['human']       = (boolean) Whether to return time and byte values in human-readable format. (default:
     * false)
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

        /** @var \Elasticsearch\Endpoints\Indices\Flush $endpoint */
        $endpoint = $endpointBuilder('Indices\Recovery');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` to check the types
     * across all indices (Required)
     *        ['type']               = (list) A comma-separated list of document types to check (Required)
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function existsType($params)
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        //manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Type\Exists $endpoint */
        $endpoint = $endpointBuilder('Indices\Type\Exists');
        $endpoint->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names the alias should point to (supports
     * wildcards); use `_all` to perform the operation on all indices. (Required)
     *        ['name']           = (string) The name of the alias to be created or updated (Required)
     *        ['timeout']        = (time) Explicit timestamp for the document
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *        ['body']           = The settings for the alias, such as `routing` or `filter`
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putAlias($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Alias\Put $endpoint */
        $endpoint = $endpointBuilder('Indices\Alias\Put');
        $endpoint->setIndex($index)
                 ->setName($name)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to restrict the operation; use
     * `_all` to perform the operation on all indices
     *        ['name']               = (list) The name of the warmer (supports wildcards); leave empty to get all
     * warmers
     *        ['type']               = (list) A comma-separated list of document types to restrict the operation; leave
     * empty to perform the operation on all types
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getWarmer($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Warmer\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Warmer\Get');
        $endpoint->setIndex($index)
                 ->setName($name)
                 ->setType($type);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to register the warmer for; use
     * `_all` or omit to perform the operation on all indices
     *        ['name']               = (string) The name of the warmer (Required)
     *        ['type']               = (list) A comma-separated list of document types to register the warmer for;
     * leave empty to perform the operation on all types
     *        ['master_timeout']     = (time) Specify timeout for connection to master
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed) in the search request to warm
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices in the search request to warm. (This includes `_all` string or when no indices have been
     * specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both, in the search request to warm. (open,closed,none,all) (default: open)
     *        ['request_cache']      = (boolean) Specify whether the request to be warmed should use the request cache,
     * defaults to index level setting
     *        ['body']               = The search request definition for the warmer (query, filters, facets, sorting,
     * etc)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putWarmer($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Warmer\Put $endpoint */
        $endpoint = $endpointBuilder('Indices\Warmer\Put');
        $endpoint->setIndex($index)
                 ->setName($name)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']           = (string) The name of the template (Required)
     *        ['order']          = (number) The order for this template when merging multiple matching ones (higher
     * numbers are merged later, overriding the lower numbers)
     *        ['create']         = (boolean) Whether the index template should only be added if new or can also replace
     * an existing one (default: false)
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *        ['flat_settings']  = (boolean) Return settings in flat format (default: false)
     *        ['body']           = The template definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putTemplate($params)
    {
        $name = $this->extractArgument($params, 'name');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Template\Put $endpoint */
        $endpoint = $endpointBuilder('Indices\Template\Put');
        $endpoint->setName($name)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                    = (list) A comma-separated list of index names to restrict the operation;
     * use `_all` or empty string to perform the operation on all indices
     *        ['type']                     = (list) A comma-separated list of document types to restrict the operation;
     * leave empty to perform the operation on all types
     *        ['explain']                  = (boolean) Return detailed information about the error
     *        ['ignore_indices']           = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['ignore_unavailable']       = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']         = (boolean) Whether to ignore if a wildcard indices expression resolves into
     * no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']         = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['operation_threading']      = TODO: ?
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
     *        ['rewrite']                  = (boolean) Provide a more detailed explanation showing the actual Lucene
     * query that will be executed.
     *        ['source']              = (string) The URL-encoded query definition (instead of using the request body)
     *        ['body']                     = The query definition specified with the Query DSL
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function validateQuery($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Validate\Query $endpoint */
        $endpoint = $endpointBuilder('Indices\Validate\Query');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to filter aliases
     *        ['name']               = (list) A comma-separated list of alias names to return
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getAlias($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Alias\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Alias\Get');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names the mapping should be added to
     * (supports wildcards); use `_all` or omit to add the mapping on all indices.
     *        ['type']               = (string) The name of the document type (Required)
     *        ['timeout']            = (time) Explicit operation timeout
     *        ['master_timeout']     = (time) Specify timeout for connection to master
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['ignore_conflicts']   = (boolean) Specify whether to ignore conflicts while updating the mapping
     * (default: false)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['update_all_types']   = (boolean) Whether to update the mapping for all fields with the same name across
     * all types or not
     *        ['body']               = The mapping definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function putMapping($params)
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Mapping\Put $endpoint */
        $endpoint = $endpointBuilder('Indices\Mapping\Put');
        $endpoint->setIndex($index)
                 ->setType($type)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * @deprecated
     * $params['index'] = (list) A comma-separated list of index names; use `_all` for all indices (Required)
     *        ['type']  = (string) The name of the document type to delete (Required)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteMapping($params)
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Mapping\Delete $endpoint */
        $endpoint = $endpointBuilder('Indices\Mapping\Delete');
        $endpoint->setIndex($index)
                 ->setType($type);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']           = (list) The comma separated names of the index templates (Required)
     *        ['flat_settings']  = (boolean) Return settings in flat format (default: false)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getTemplate($params)
    {
        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Template\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Template\Get');
        $endpoint->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['name']           = (string) The name of the template (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function existsTemplate($params)
    {
        $name = $this->extractArgument($params, 'name');

        //manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Template\Exists $endpoint */
        $endpoint = $endpointBuilder('Indices\Template\Exists');
        $endpoint->setName($name);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint);
    }

    /**
     * $params['index']            = (string) The name of the index (Required)
     *        ['timeout']          = (time) Explicit operation timeout
     *        ['master_timeout']   = (time) Specify timeout for connection to master
     *        ['update_all_types'] = (boolean) Whether to update the mapping for all fields with the same name across
     * all types or not
     *        ['body']             = The configuration for the index (`settings` and `mappings`)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function create($params)
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Create $endpoint */
        $endpoint = $endpointBuilder('Indices\Create');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['flush']                = (boolean) Specify whether the index should be flushed after performing the
     * operation (default: true)
     *        ['ignore_unavailable']   = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']     = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']     = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['max_num_segments']     = (number) The number of segments the index should be merged into (default:
     * dynamic)
     *        ['only_expunge_deletes'] = (boolean) Specify whether the operation should only expunge deleted documents
     *        ['operation_threading']  = TODO: ?
     *        ['wait_for_merge']       = (boolean) Specify whether the request should block until the merge process is
     * finished (default: true)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function optimize($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Optimize $endpoint */
        $endpoint = $endpointBuilder('Indices\Optimize');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['flush']                = (boolean) Specify whether the index should be flushed after performing the
     * operation (default: true)
     *        ['ignore_unavailable']   = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['allow_no_indices']     = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']     = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['max_num_segments']     = (number) The number of segments the index should be merged into (default:
     * dynamic)
     *        ['only_expunge_deletes'] = (boolean) Specify whether the operation should only expunge deleted documents
     *        ['operation_threading']  = TODO: ?
     *        ['wait_for_merge']       = (boolean) Specify whether the request should block until the merge process is
     * finished (default: true)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function forceMerge($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\ForceMerge $endpoint */
        $endpoint = $endpointBuilder('Indices\ForceMerge');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']          = (list) A comma-separated list of index names (supports wildcards); use `_all` for
     * all indices (Required)
     *        ['name']           = (list) A comma-separated list of aliases to delete (supports wildcards); use `_all`
     * to delete all aliases for the specified indices. (Required)
     *        ['timeout']        = (time) Explicit timestamp for the document
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteAlias($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Alias\Delete $endpoint */
        $endpoint = $endpointBuilder('Indices\Alias\Delete');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma separated list of indices to open (Required)
     *        ['timeout']            = (time) Explicit operation timeout
     *        ['master_timeout']     = (time) Specify timeout for connection to master
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: closed)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function open($params)
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Open $endpoint */
        $endpoint = $endpointBuilder('Indices\Open');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']        = (string) The name of the index to scope the operation
     *        ['analyzer']     = (string) The name of the analyzer to use
     *        ['char_filters'] = (list) Deprecated : A comma-separated list of character filters to use for the
     * analysis
     *        ['char_filter']  = (list) A comma-separated list of character filters to use for the analysis
     *        ['field']        = (string) Use the analyzer configured for this field (instead of passing the analyzer
     * name)
     *        ['filters']      = (list) Deprecated : A comma-separated list of filters to use for the analysis
     *        ['filter']       = (list) A comma-separated list of filters to use for the analysis
     *        ['prefer_local'] = (boolean) With `true`, specify that a local shard should be used if available, with
     * `false`, use a random shard (default: true)
     *        ['text']         = (list) The text on which the analysis should be performed (when request body is not
     * used)
     *        ['tokenizer']    = (string) The name of the tokenizer to use for the analysis
     *        ['explain']      = (boolean) With `true`, outputs more advanced details. (default: false)
     *        ['attributes']   = (list) A comma-separated list of token attributes to output, this parameter works only
     * with `explain=true`
     *        ['format']       = (enum) Format of the output (detailed,text) (default: detailed)
     *        ['body']         = The text on which the analysis should be performed
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function analyze($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Analyze $endpoint */
        $endpoint = $endpointBuilder('Indices\Analyze');
        $endpoint->setIndex($index)
                 ->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index name to limit the operation
     *        ['field_data']         = (boolean) Clear field data
     *        ['fielddata']          = (boolean) Clear field data
     *        ['fields']             = (list) A comma-separated list of fields to clear when using the `field_data`
     * parameter (default: all)
     *        ['query']              = (boolean) Clear query caches
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['recycler']           = (boolean) Clear the recycler cache
     *        ['request']            = (boolean) Clear request cache
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function clearCache($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Cache\Clear $endpoint */
        $endpoint = $endpointBuilder('Indices\Cache\Clear');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['timeout']        = (time) Request timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *        ['body']           = The definition of `actions` to perform
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function updateAliases($params = [])
    {
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Aliases\Update $endpoint */
        $endpoint = $endpointBuilder('Indices\Aliases\Update');
        $endpoint->setBody($body);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']   = (list) A comma-separated list of index names to filter aliases
     *        ['name']    = (list) A comma-separated list of alias names to filter
     *        ['timeout'] = (time) Explicit operation timeout
     *        ['local']   = (boolean) Return local information, do not retrieve the state from master node (default:
     * false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getAliases($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Aliases\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Aliases\Get');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names to filter aliases
     *        ['name']               = (list) A comma-separated list of alias names to return
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: [open,closed])
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function existsAlias($params)
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        //manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Alias\Exists $endpoint */
        $endpoint = $endpointBuilder('Indices\Alias\Exists');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint);
    }

    /**
     * @deprecated
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to
     *     perform the operation on all indices
     *        ['ignore_indices']      = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['ignore_unavailable']  = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']    = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']    = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: [open,closed])
     *        ['operation_threading'] = () TODO: ?
     *        ['human']               = (boolean) Whether to return version and creation date values in human-readable
     *        ['recovery']            = (boolean) Return information about shard recovery
     *        ['snapshot']            = (boolean) TODO: ?
     *
     * @param array $params
     *
     * @return array
     */
    public function status($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Status $endpoint */
        $endpoint = $endpointBuilder('Indices\Status');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['name']               = (list) The name of the settings that should be included
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: [open,closed])
     *        ['flat_settings']      = (boolean) Return settings in flat format (default: false)
     *        ['local']              = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *        ['human']              = (boolean) Whether to return version and creation date values in human-readable
     * format. (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getSettings($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Settings\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Settings\Get');
        $endpoint->setIndex($index)
                 ->setName($name);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']              = (list) A comma separated list of indices to close (Required)
     *        ['timeout']            = (time) Explicit operation timeout
     *        ['master_timeout']     = (time) Specify timeout for connection to master
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
    public function close($params)
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Close $endpoint */
        $endpoint = $endpointBuilder('Indices\Close');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * @deprecated
     * $params['index']   = (string) The name of the index
     *
     * @param $params
     *
     * @return array
     */
    public function seal($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Seal $endpoint */
        $endpoint = $endpointBuilder('Indices\Seal');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                 = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['allow_no_indices']      = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']      = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['ignore_unavailable']    = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['wait_for_completion']   = (boolean) Specify whether the request should block until the all segments are
     * upgraded (default: false)
     *        ['only_ancient_segments'] = (boolean) If true, only ancient (an older Lucene major release) segments will
     * be upgraded
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function upgrade($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Upgrade\Post $endpoint */
        $endpoint = $endpointBuilder('Indices\Upgrade\Post');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']                 = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['ignore_unavailable']    = (boolean) Whether specified concrete indices should be ignored when
     * unavailable (missing or closed)
     *        ['wait_for_completion']   = (boolean) Specify whether the request should block until the all segments are
     * upgraded (default: false)
     *        ['only_ancient_segments'] = (boolean) If true, only ancient (an older Lucene major release) segments will
     * be upgraded
     *        ['allow_no_indices']      = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']      = (enum) Whether to expand wildcard expression to concrete indices that are
     * open, closed or both. (open,closed,none,all) (default: open)
     *        ['human']                 = (boolean) Whether to return time and byte values in human-readable format.
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getUpgrade($params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\Upgrade\Get $endpoint */
        $endpoint = $endpointBuilder('Indices\Upgrade\Get');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to
     * perform the operation on all indices
     *        ['status']              = (list) A comma-separated list of statuses used to filter on shards to get store
     * information for (green,yellow,red,all)
     *        ['ignore_unavailable']  = (boolean) Whether specified concrete indices should be ignored when unavailable
     * (missing or closed)
     *        ['allow_no_indices']    = (boolean) Whether to ignore if a wildcard indices expression resolves into no
     * concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']    = (enum) Whether to expand wildcard expression to concrete indices that are open,
     * closed or both. (open,closed,none,all) (default: open)
     *        ['operation_threading'] = TODO: ?
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function shardStores($params)
    {
        $index = $this->extractArgument($params, 'index');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Indices\ShardStores $endpoint */
        $endpoint = $endpointBuilder('Indices\ShardStores');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }
}
