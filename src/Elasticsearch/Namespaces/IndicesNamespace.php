<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

/**
 * Class IndicesNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\IndicesNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class IndicesNamespace extends AbstractNamespace
{
    /**
     * $params['index'] = (list) A comma-separated list of indices to check (Required)
     *        ['local'] = (bool) Return local information, do not retrieve the state
     *        from master node (default: false)
     *        ['ignore_unavailable'] = (bool) Ignore unavailable indexes (default: false)
     *        ['allow_no_indices'] = (bool) Ignore if a wildcard expression resolves to no
     *        concrete indices (default: false)
     *        ['expand_wildcards'] = (enum) Whether wildcard expressions should get
     *        expanded to open or closed indices (default: open)
     *        ['flat_settings'] = (bool) Return settings in flat format (default: false)
     *        ['include_defaults'] = (bool) Whether to return all default setting for each
     *        of the indices
     */
    public function exists(array $params): bool
    {
        $index = $this->extractArgument($params, 'index');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Exists $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Exists');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * $params['index'] = (list) A comma-separated list of indices to check (Required)
     *        ['include_type_name'] = (bool) Whether to add the type name to the response (default: false)
     *        ['local'] = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *        ['flat_settings'] = (bool) Return settings in flat format (default: false)
     *        ['include_defaults'] = (bool) Whether to return all default setting for each of the indices
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @return callable|array
     */
    public function get(array $params)
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Get');
        $endpoint->setIndex($index)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *        ['verbose'] = (bool) Includes detailed memory usage by Lucene
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
 * @var \Elasticsearch\Endpoints\Indices\Segments $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Segments');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name']    = (string) The name of the template (Required)
     *        ['timeout'] = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @return callable|array
     */
    public function deleteTemplate(array $params)
    {
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Template\Delete $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Template\Delete');
        $endpoint->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (list) A comma-separated list of indices to delete; use `_all` or empty string to delete all indices
     *        ['timeout'] = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *        ['ignore_unavailable'] = (bool) Ignore unavailable indexes (default: false)
     *        ['allow_no_indices'] = (bool) Ignore if a wildcard expression resolves to no concrete indices (default: false)
     *        ['expand_wildcards'] = (enum) Whether wildcard expressions should get expanded to open or closed indices (default: open)
     *
     * @return callable|array
     */
    public function delete(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Delete $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Delete');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['fields']         = (boolean) A comma-separated list of fields for `fielddata` metric (supports wildcards)
     *        ['index']          = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['indexing_types'] = (list) A comma-separated list of document types to include in the `indexing` statistics
     *        ['metric_family']  = (enum) Limit the information returned to a specific metric
     *        ['search_groups']  = (list) A comma-separated list of search groups to include in the `search` statistics
     *        ['all']            = (boolean) Return all available information
     *        ['clear']          = (boolean) Reset the default level of detail
     *        ['docs']           = (boolean) Return information about indexed and deleted documents
     *        ['fielddata']      = (boolean) Return information about field data
     *        ['filter_cache']   = (boolean) Return information about filter cache
     *        ['flush']          = (boolean) Return information about flush operations
     *        ['get']            = (boolean) Return information about get operations
     *        ['groups']         = (boolean) A comma-separated list of search groups for `search` statistics
     *        ['id_cache']       = (boolean) Return information about ID cache
     *        ['ignore_indices'] = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['indexing']       = (boolean) Return information about indexing operations
     *        ['merge']          = (boolean) Return information about merge operations
     *        ['refresh']        = (boolean) Return information about refresh operations
     *        ['search']         = (boolean) Return information about search operations; use the `groups` parameter to include information for specific search groups
     *        ['store']          = (boolean) Return information about the size of the index
     *
     * @return callable|array
     */
    public function stats(array $params = [])
    {
        $metric = $this->extractArgument($params, 'metric');

        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Stats $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Stats');
        $endpoint->setIndex($index)
            ->setMetric($metric);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index'] = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['body']  = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *
     * @return callable|array
     */
    public function putSettings(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Settings\Put $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Settings\Put');
        $endpoint->setIndex($index)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']          = (string) The name of the source index to shrink
     *        ['target']         = (string) The name of the target index to shrink into
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @return callable|array
     */
    public function shrink(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $target = $this->extractArgument($params, 'target');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Shrink $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Shrink');
        $endpoint->setIndex($index)
            ->setTarget($target)
            ->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index'] = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['type']  = (list) A comma-separated list of document types
     *
     * @return callable|array
     */
    public function getMapping(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $type = $this->extractArgument($params, 'type');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Mapping\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Mapping\Get');
        $endpoint->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']            = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['type']             = (list) A comma-separated list of document types
     *        ['field']            = (list) A comma-separated list of document fields
     *        ['include_defaults'] = (bool) specifies default mapping values should be returned
     *
     * @return callable|array
     */
    public function getFieldMapping(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $fields = $this->extractArgument($params, 'fields');

        if (!isset($fields)) {
            $fields = $this->extractArgument($params, 'field');
        }


        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Mapping\GetField $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Mapping\GetField');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setFields($fields);

        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['force']              = (boolean) Whether a flush should be forced even if it is not necessarily needed ie.
     *        if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if
     *        no uncommitted changes are present. (This setting can be considered as internal)
     *        ['wait_if_ongoing']    = (boolean) If set to true the flush operation will block until the flush can be executed
     *        if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function flush(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Flush $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Flush');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function flushSynced(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Flush $endpoint
*/
        $endpoint = $endpointBuilder('Indices\FlushSynced');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }


    /**
     * $params['index']               = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['operation_threading'] = () TODO: ?
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function refresh(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Refresh $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Refresh');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']       = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['detailed']    = (bool) Whether to display detailed information about shard recovery
     *        ['active_only'] = (bool) Display only those recoveries that are currently on-going
     *        ['human']       = (bool) Whether to return time and byte values in human-readable format.
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
 * @var \Elasticsearch\Endpoints\Indices\Flush $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Recovery');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` to check the types across all indices (Required)
     *        ['type']               = (list) A comma-separated list of document types to check (Required)
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     */
    public function existsType(array $params): bool
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Type\Exists $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Type\Exists');
        $endpoint->setIndex($index)
            ->setType($type);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * $params['index']   = (string) The name of the index with an alias
     *        ['name']    = (string) The name of the alias to be created or updated
     *        ['timeout'] = (time) Explicit timestamp for the document
     *        ['body']    = (time) Explicit timestamp for the document
     *
     * @return callable|array
     */
    public function putAlias(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Alias\Put $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Alias\Put');
        $endpoint->setIndex($index)
            ->setName($name)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name']    = (string) The name of the template (Required)
     *        ['order']   = (number) The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)
     *        ['timeout'] = (time) Explicit operation timeout
     *        ['body']    = (time) Explicit operation timeout
     *        ['create']  = (bool) Whether the index template should only be added if new or can also replace an existing one
     *
     * @return callable|array
     */
    public function putTemplate(array $params)
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Template\Put $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Template\Put');
        $endpoint->setName($name)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']               = (list) A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
     *        ['type']                = (list) A comma-separated list of document types to restrict the operation; leave empty to perform the operation on all types
     *        ['explain']             = (boolean) Return detailed information about the error
     *        ['ignore_indices']      = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['operation_threading'] = () TODO: ?
     *        ['source']              = (string) The URL-encoded query definition (instead of using the request body)
     *        ['body']                = (string) The URL-encoded query definition (instead of using the request body)
     *
     * @return callable|array
     */
    public function validateQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Validate\Query $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Validate\Query');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name']           = (list) A comma-separated list of alias names to return (Required)
     *        ['index']          = (list) A comma-separated list of index names to filter aliases
     *        ['ignore_indices'] = (enum) When performed on multiple indices, allows to ignore `missing` ones
     *        ['name']           = (list) A comma-separated list of alias names to return
     *
     * @return callable|array
     */
    public function getAlias(array $params)
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Alias\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Alias\Get');
        $endpoint->setIndex($index)
            ->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']            = (list) A comma-separated list of index names; use `_all` to perform the operation on all indices (Required)
     *        ['type']             = (string) The name of the document type
     *        ['ignore_conflicts'] = (boolean) Specify whether to ignore conflicts while updating the mapping (default: false)
     *        ['timeout']          = (time) Explicit operation timeout
     *        ['body']             = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function putMapping(array $params)
    {
        $index = $this->extractArgument($params, 'index');
        $type = $this->extractArgument($params, 'type');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Mapping\Put $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Mapping\Put');
        $endpoint->setIndex($index)
            ->setType($type)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name'] = (string) The name of the template (Required)
     *
     * @return callable|array
     */
    public function getTemplate(array $params)
    {
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Template\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Template\Get');
        $endpoint->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name'] = (string) The name of the template (Required)
     */
    public function existsTemplate(array $params): bool
    {
        $name = $this->extractArgument($params, 'name');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Template\Exists $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Template\Exists');
        $endpoint->setName($name);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * $params['index']   = (string) The name of the index (Required)
     *        ['timeout'] = (time) Explicit operation timeout
     *        ['body']    = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function create(array $params)
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Create $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Create');
        $endpoint->setIndex($index)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']                = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['flush']                = (boolean) Specify whether the index should be flushed after performing the operation (default: true)
     *        ['max_num_segments']     = (number) The number of segments the index should be merged into (default: dynamic)
     *        ['only_expunge_deletes'] = (boolean) Specify whether the operation should only expunge deleted documents
     *        ['operation_threading']  = () TODO: ?
     *        ['refresh']              = (boolean) Specify whether the index should be refreshed after performing the operation (default: true)
     *        ['wait_for_merge']       = (boolean) Specify whether the request should block until the merge process is finished (default: true)
     *        ['ignore_unavailable']   = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']     = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']     = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function forceMerge(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\ForceMerge $endpoint
*/
        $endpoint = $endpointBuilder('Indices\ForceMerge');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (string) The name of the index with an alias (Required)
     *        ['name']    = (string) The name of the alias to be deleted (Required)
     *        ['timeout'] = (time) Explicit timestamp for the document
     *
     * @return callable|array
     */
    public function deleteAlias(array $params)
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Alias\Delete $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Alias\Delete');
        $endpoint->setIndex($index)
            ->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (string) The name of the index (Required)
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function open(array $params)
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Open $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Open');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']        = (string) The name of the index to scope the operation
     *        ['analyzer']     = (string) The name of the analyzer to use
     *        ['field']        = (string) Use the analyzer configured for this field (instead of passing the analyzer name)
     *        ['filter']       = (list) A comma-separated list of filters to use for the analysis
     *        ['prefer_local'] = (boolean) With `true`, specify that a local shard should be used if available, with `false`, use a random shard (default: true)
     *        ['text']         = (string) The text on which the analysis should be performed (when request body is not used)
     *        ['tokenizer']    = (string) The name of the tokenizer to use for the analysis
     *        ['format']       = (enum) Format of the output
     *        ['body']         = (enum) Format of the output
     *        ['char_filter']  = (list) A comma-separated list of character filters to use for the analysis
     *        ['explain']      = (bool) With `true`, outputs more advanced details. (default: false)
     *        ['attributes']   = (list) A comma-separated list of token attributes to output, this parameter works only with `explain=true`
     *        ['format']       = (enum) Format of the output (["detailed", "text"])
     *
     * @return callable|array
     */
    public function analyze(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Analyze $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Analyze');
        $endpoint->setIndex($index)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index name to limit the operation
     *        ['field_data']         = (boolean) Clear field data
     *        ['fielddata']          = (boolean) Clear field data
     *        ['fields']             = (list) A comma-separated list of fields to clear when using the `field_data` parameter (default: all)
     *        ['filter']             = (boolean) Clear filter caches
     *        ['filter_cache']       = (boolean) Clear filter caches
     *        ['filter_keys']        = (boolean) A comma-separated list of keys to clear when using the `filter_cache` parameter (default: all)
     *        ['id']                 = (boolean) Clear ID caches for parent/child
     *        ['id_cache']           = (boolean) Clear ID caches for parent/child
     *        ['recycler']           = (boolean) Clear the recycler cache
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function clearCache(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Cache\Clear $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Cache\Clear');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (list) A comma-separated list of index names to filter aliases
     *        ['timeout'] = (time) Explicit timestamp for the document
     *        ['body']    = (time) Explicit timestamp for the document
     *
     * @return callable|array
     */
    public function updateAliases(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Aliases\Update $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Aliases\Update');
        $endpoint->setIndex($index)
            ->setBody($body);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['local']   = (bool) Return local information, do not retrieve the state from master node (default: false)
     *        ['timeout'] = (time) Explicit timestamp for the document
     *
     * @return callable|array
     */
    public function getAliases(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Alias\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Alias\Get');
        $endpoint->setIndex($index)
            ->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['name']               = (list) A comma-separated list of alias names to return (Required)
     *        ['index']              = (list) A comma-separated list of index names to filter aliases
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     */
    public function existsAlias(array $params): bool
    {
        $index = $this->extractArgument($params, 'index');
        $name = $this->extractArgument($params, 'name');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Alias\Exists $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Alias\Exists');
        $endpoint->setIndex($index)
            ->setName($name);
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }

    /**
     * $params['index'] = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *
     * @return callable|array
     */
    public function getSettings(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $name = $this->extractArgument($params, 'name');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Settings\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Settings\Get');
        $endpoint->setIndex($index)
            ->setName($name);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (string) The name of the index (Required)
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function close(array $params)
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Close $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Close');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['wait_for_completion']= (boolean) Specify whether the request should block until the all segments are upgraded (default: false)
     *        ['only_ancient_segments'] = (boolean) If true, only ancient (an older Lucene major release) segments will be upgraded
     *        ['refresh']            = (boolean) Refresh the index after performing the operation
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function upgrade(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Upgrade\Post $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Upgrade\Post');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string for all indices
     *        ['wait_for_completion']= (boolean) Specify whether the request should block until the all segments are upgraded (default: false)
     *        ['only_ancient_segments'] = (boolean) If true, only ancient (an older Lucene major release) segments will be upgraded
     *        ['refresh']            = (boolean) Refresh the index after performing the operation
     *        ['ignore_unavailable'] = (bool) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices']   = (bool) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *
     * @return callable|array
     */
    public function getUpgrade(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Upgrade\Get $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Upgrade\Get');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index']   = (string) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     *        ['status']   = (list) A comma-separated list of statuses used to filter on shards to get store information for
     *        ['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     *        ['allow_no_indices'] = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     *        ['expand_wildcards'] = (boolean) Whether to expand wildcard expression to concrete indices that are open, closed or both.
     *        ['operation_threading']
     *
     * @return callable|array
     */
    public function shardStores(array $params)
    {
        $index = $this->extractArgument($params, 'index');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\ShardStores $endpoint
*/
        $endpoint = $endpointBuilder('Indices\ShardStores');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['newIndex']       = (string) The name of the rollover index
     *        ['alias']          = (string) The name of the alias to rollover
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @return callable|array
     */
    public function rollover(array $params)
    {
        $newIndex = $this->extractArgument($params, 'newIndex');
        $alias = $this->extractArgument($params, 'alias');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Rollover $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Rollover');
        $endpoint->setNewIndex($newIndex)
            ->setAlias($alias)
            ->setParams($params)
            ->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['index'] = (string) The name of the source index to split
     *        ['target']  = (string) The name of the target index to split into
     *        ['copy_settings']  = (boolean) whether or not to copy settings from the source index (defaults to false)
     *        ['timeout']  = (time) Explicit operation timeout
     *        ['master_timeout']  = (time) Specify timeout for connection to master
     *        ['wait_for_active_shards']  = (string) Set the number of active shards to wait for on the shrunken index before the operation returns.
     *
     * @return callable|array
     */
    public function split(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');
        $target = $this->extractArgument($params, 'target');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Indices\Split $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Split');
        $endpoint->setIndex($index)
            ->setBody($body)
            ->setTarget($target);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
