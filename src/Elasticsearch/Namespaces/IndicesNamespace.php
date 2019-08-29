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
     * Endpoint: indices.exists
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names (Required)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'ignore_unavailable' => '(boolean) Ignore unavailable indexes (default: false)',
     *   'allow_no_indices'   => '(boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)',
     *   'expand_wildcards'   => '(enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)',
     *   'flat_settings'      => '(boolean) Return settings in flat format (default: false)',
     *   'include_defaults'   => '(boolean) Whether to return all default setting for each of the indices. (Default = false)',
     * ]
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
     * Endpoint: indices.get
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-index.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names (Required)',
     *   'include_type_name'  => '(boolean) Whether to add the type name to the response (default: false)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'ignore_unavailable' => '(boolean) Ignore unavailable indexes (default: false)',
     *   'allow_no_indices'   => '(boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)',
     *   'expand_wildcards'   => '(enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)',
     *   'flat_settings'      => '(boolean) Return settings in flat format (default: false)',
     *   'include_defaults'   => '(boolean) Whether to return all default setting for each of the indices. (Default = false)',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.segments
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-segments.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'verbose'            => '(boolean) Includes detailed memory usage by Lucene. (Default = false)',
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
 * @var \Elasticsearch\Endpoints\Indices\Segments $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Segments');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: indices.delete_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     *
     * $params[
     *   'name'           => '(string) The name of the template (Required)',
     *   'timeout'        => '(time) Explicit operation timeout',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.delete
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices (Required)',
     *   'timeout'            => '(time) Explicit operation timeout',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     *   'ignore_unavailable' => '(boolean) Ignore unavailable indexes (default: false)',
     *   'allow_no_indices'   => '(boolean) Ignore if a wildcard expression resolves to no concrete indices (default: false)',
     *   'expand_wildcards'   => '(enum) Whether wildcard expressions should get expanded to open or closed indices (default: open) (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.stats
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-stats.html
     *
     * $params[
     *   'index'                      => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'metric'                     => '(list) Limit the information returned the specific metrics.',
     *   'completion_fields'          => '(list) A comma-separated list of fields for `fielddata` and `suggest` index metric (supports wildcards)',
     *   'fielddata_fields'           => '(list) A comma-separated list of fields for `fielddata` index metric (supports wildcards)',
     *   'fields'                     => '(list) A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)',
     *   'groups'                     => '(list) A comma-separated list of search groups for `search` index metric',
     *   'level'                      => '(enum) Return stats aggregated at cluster, index or shard level (Options = cluster,indices,shards) (Default = indices)',
     *   'types'                      => '(list) A comma-separated list of document types for the `indexing` index metric',
     *   'include_segment_file_sizes' => '(boolean) Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested) (Default = false)',
     *   'include_unloaded_segments'  => '(boolean) If set to true segment stats will include stats for segments that are not currently loaded into memory (Default = false)',
     *   'expand_wildcards'           => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'forbid_closed_indices'      => '(boolean) If set to false stats will also collected from closed indices if explicitly specified or if expand_wildcards expands to closed indices (Default = true)',
     * ]
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
     * Endpoint: indices.put_settings
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
     *
     * $params[
     *   'body'               => '(string) The index settings to be updated (Required)',
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     *   'timeout'            => '(time) Explicit operation timeout',
     *   'preserve_existing'  => '(boolean) Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'flat_settings'      => '(boolean) Return settings in flat format (default: false)',
     * ]
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
     * Endpoint: indices.shrink
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shrink-index.html
     *
     * $params[
     *   'body'                   => '(string) The configuration for the target index (`settings` and `aliases`)',
     *   'index'                  => '(string) The name of the source index to shrink (Required)',
     *   'target'                 => '(string) The name of the target index to shrink into (Required)',
     *   'copy_settings'          => '(boolean) whether or not to copy settings from the source index (defaults to false)',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     *   'wait_for_active_shards' => '(string) Set the number of active shards to wait for on the shrunken index before the operation returns.',
     * ]
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
     * Endpoint: indices.get_mapping
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names',
     *   'type'               => '(list) A comma-separated list of document types',
     *   'include_type_name'  => '(boolean) Whether to add the type name to the response (default: false)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.get_field_mapping
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-field-mapping.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names',
     *   'type'               => '(list) A comma-separated list of document types',
     *   'fields'             => '(list) A comma-separated list of fields (Required)',
     *   'include_type_name'  => '(boolean) Whether a type should be returned in the body of the mappings.',
     *   'include_defaults'   => '(boolean) Whether the default mapping values should be returned as well',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.flush
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-flush.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string for all indices',
     *   'force'              => '(boolean) Whether a flush should be forced even if it is not necessarily needed ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if no uncommitted changes are present. (This setting can be considered as internal)',
     *   'wait_if_ongoing'    => '(boolean) If set to true the flush operation will block until the flush can be executed if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running.',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.flush_synced
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-synced-flush.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string for all indices',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.refresh
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-refresh.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.recovery
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-recovery.html
     *
     * $params[
     *   'index'       => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'detailed'    => '(boolean) Whether to display detailed information about shard recovery (Default = false)',
     *   'active_only' => '(boolean) Display only those recoveries that are currently on-going (Default = false)',
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
 * @var \Elasticsearch\Endpoints\Indices\Flush $endpoint
*/
        $endpoint = $endpointBuilder('Indices\Recovery');
        $endpoint->setIndex($index);
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: indices.exists_type
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-types-exists.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` to check the types across all indices (Required)',
     *   'type'               => '(list) A comma-separated list of document types to check (Required)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.put_alias
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     *
     * $params[
     *   'body'           => '(string) The settings for the alias, such as `routing` or `filter`',
     *   'index'          => '(list) A comma-separated list of index names the alias should point to (supports wildcards); use `_all` to perform the operation on all indices. (Required)',
     *   'name'           => '(string) The name of the alias to be created or updated (Required)',
     *   'timeout'        => '(time) Explicit timestamp for the document',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.put_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     *
     * $params[
     *   'body'              => '(string) The template definition (Required)',
     *   'name'              => '(string) The name of the template (Required)',
     *   'include_type_name' => '(boolean) Whether a type should be returned in the body of the mappings.',
     *   'order'             => '(number) The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)',
     *   'create'            => '(boolean) Whether the index template should only be added if new or can also replace an existing one (Default = false)',
     *   'timeout'           => '(time) Explicit operation timeout',
     *   'master_timeout'    => '(time) Specify timeout for connection to master',
     *   'flat_settings'     => '(boolean) Return settings in flat format (default: false)',
     * ]
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
     * Endpoint: indices.validate_query
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
     *
     * $params[
     *   'body'               => '(string) The query definition specified with the Query DSL',
     *   'index'              => '(list) A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices',
     *   'type'               => '(list) A comma-separated list of document types to restrict the operation; leave empty to perform the operation on all types',
     *   'explain'            => '(boolean) Return detailed information about the error',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'q'                  => '(string) Query in the Lucene query string syntax',
     *   'analyzer'           => '(string) The analyzer to use for the query string',
     *   'analyze_wildcard'   => '(boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)',
     *   'default_operator'   => '(enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)',
     *   'df'                 => '(string) The field to use as default where no field prefix is given in the query string',
     *   'lenient'            => '(boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored',
     *   'rewrite'            => '(boolean) Provide a more detailed explanation showing the actual Lucene query that will be executed.',
     *   'all_shards'         => '(boolean) Execute validation on all shards instead of one random shard per index',
     * ]
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
     * Alias function to getAlias()
     *
     * @deprecated added to prevent BC break introduced in 7.2.0 and 7.2.1
     * @see https://github.com/elastic/elasticsearch-php/issues/940
     */
    public function getAliases(array $params = [])
    {
        return $this->getAlias($params);
    }

    /**
     * Endpoint: indices.get_alias
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names to filter aliases',
     *   'name'               => '(list) A comma-separated list of alias names to return',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = all)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.put_mapping
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
     *
     * $params[
     *   'body'               => '(string) The mapping definition (Required)',
     *   'index'              => '(list) A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.',
     *   'type'               => '(string) The name of the document type',
     *   'include_type_name'  => '(boolean) Whether a type should be expected in the body of the mappings.',
     *   'timeout'            => '(time) Explicit operation timeout',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.get_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     *
     * $params[
     *   'name'              => '(list) The comma separated names of the index templates',
     *   'include_type_name' => '(boolean) Whether a type should be returned in the body of the mappings.',
     *   'flat_settings'     => '(boolean) Return settings in flat format (default: false)',
     *   'master_timeout'    => '(time) Explicit operation timeout for connection to master node',
     *   'local'             => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.exists_template
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
     *
     * $params[
     *   'name'           => '(list) The comma separated names of the index templates (Required)',
     *   'flat_settings'  => '(boolean) Return settings in flat format (default: false)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.create
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-create-index.html
     *
     * $params[
     *   'body'                   => '(string) The configuration for the index (`settings` and `mappings`)',
     *   'index'                  => '(string) The name of the index (Required)',
     *   'include_type_name'      => '(boolean) Whether a type should be expected in the body of the mappings.',
     *   'wait_for_active_shards' => '(string) Set the number of active shards to wait for before the operation returns.',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.forcemerge
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-forcemerge.html
     *
     * $params[
     *   'index'                => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'flush'                => '(boolean) Specify whether the index should be flushed after performing the operation (default: true)',
     *   'ignore_unavailable'   => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'     => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'     => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'max_num_segments'     => '(number) The number of segments the index should be merged into (default: dynamic)',
     *   'only_expunge_deletes' => '(boolean) Specify whether the operation should only expunge deleted documents',
     * ]
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
     * Endpoint: indices.delete_alias
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     *
     * $params[
     *   'index'          => '(list) A comma-separated list of index names (supports wildcards); use `_all` for all indices (Required)',
     *   'name'           => '(list) A comma-separated list of aliases to delete (supports wildcards); use `_all` to delete all aliases for the specified indices. (Required)',
     *   'timeout'        => '(time) Explicit timestamp for the document',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.open
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
     *
     * $params[
     *   'index'                  => '(list) A comma separated list of indices to open (Required)',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     *   'ignore_unavailable'     => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'       => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'       => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = closed)',
     *   'wait_for_active_shards' => '(string) Sets the number of active shards to wait for before the operation returns.',
     * ]
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
     * Endpoint: indices.analyze
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-analyze.html
     *
     * $params[
     *   'body'  => '(string) Define analyzer/tokenizer parameters and the text on which the analysis should be performed',
     *   'index' => '(string) The name of the index to scope the operation',
     *   'index' => '(string) The name of the index to scope the operation',
     * ]
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
     * Endpoint: indices.clear_cache
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clearcache.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index name to limit the operation',
     *   'fielddata'          => '(boolean) Clear field data',
     *   'fields'             => '(list) A comma-separated list of fields to clear when using the `fielddata` parameter (default: all)',
     *   'query'              => '(boolean) Clear query caches',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'index'              => '(list) A comma-separated list of index name to limit the operation',
     *   'request'            => '(boolean) Clear request cache',
     * ]
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
     * Endpoint: indices.update_aliases
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     *
     * $params[
     *   'body'           => '(string) The definition of `actions` to perform (Required)',
     *   'timeout'        => '(time) Request timeout',
     *   'master_timeout' => '(time) Specify timeout for connection to master',
     * ]
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
     * Endpoint: indices.exists_alias
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names to filter aliases',
     *   'name'               => '(list) A comma-separated list of alias names to return (Required)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = all)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: indices.get_settings
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'name'               => '(list) The name of the settings that should be included',
     *   'master_timeout'     => '(time) Specify timeout for connection to master',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = Array)',
     *   'flat_settings'      => '(boolean) Return settings in flat format (default: false)',
     *   'local'              => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     *   'include_defaults'   => '(boolean) Whether to return all default setting for each of the indices. (Default = false)',
     * ]
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
     * Endpoint: indices.close
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
     *
     * $params[
     *   'index'                  => '(list) A comma separated list of indices to close (Required)',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     *   'ignore_unavailable'     => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'       => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'       => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'wait_for_active_shards' => '(string) Sets the number of active shards to wait for before the operation returns.',
     * ]
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
     * Endpoint: indices.upgrade
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-upgrade.html
     *
     * $params[
     *   'index'                 => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'allow_no_indices'      => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'      => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     *   'ignore_unavailable'    => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'wait_for_completion'   => '(boolean) Specify whether the request should block until the all segments are upgraded (default: false)',
     *   'only_ancient_segments' => '(boolean) If true, only ancient (an older Lucene major release) segments will be upgraded',
     * ]
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
     * Endpoint: indices.get_upgrade
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-upgrade.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.shard_stores
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shards-stores.html
     *
     * $params[
     *   'index'              => '(list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices',
     *   'status'             => '(list) A comma-separated list of statuses used to filter on shards to get store information for (Options = green,yellow,red,all)',
     *   'ignore_unavailable' => '(boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)',
     *   'allow_no_indices'   => '(boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)',
     *   'expand_wildcards'   => '(enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,none,all) (Default = open)',
     * ]
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
     * Endpoint: indices.rollover
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-rollover-index.html
     *
     * $params[
     *   'body'                   => '(string) The conditions that needs to be met for executing rollover',
     *   'alias'                  => '(string) The name of the alias to rollover (Required)',
     *   'new_index'              => '(string) The name of the rollover index',
     *   'include_type_name'      => '(boolean) Whether a type should be included in the body of the mappings.',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'dry_run'                => '(boolean) If set to true the rollover action will only be validated but not actually performed even if a condition matches. The default is false',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     *   'wait_for_active_shards' => '(string) Set the number of active shards to wait for on the newly created rollover index before the operation returns.',
     * ]
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
     * Endpoint: indices.split
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/indices-split-index.html
     *
     * $params[
     *   'body'                   => '(string) The configuration for the target index (`settings` and `aliases`)',
     *   'index'                  => '(string) The name of the source index to split (Required)',
     *   'target'                 => '(string) The name of the target index to split into (Required)',
     *   'copy_settings'          => '(boolean) whether or not to copy settings from the source index (defaults to false)',
     *   'timeout'                => '(time) Explicit operation timeout',
     *   'master_timeout'         => '(time) Specify timeout for connection to master',
     *   'wait_for_active_shards' => '(string) Set the number of active shards to wait for on the shrunken index before the operation returns.',
     * ]
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
