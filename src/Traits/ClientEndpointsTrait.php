<?php

/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */

declare(strict_types=1);

namespace Elastic\Elasticsearch\Traits;

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
trait ClientEndpointsTrait
{
	/**
	 * Bulk index or delete documents
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-bulk.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string, // Default index for items which don't provide one
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The default is `1`, which waits for each primary shard to be active. (DEFAULT: 1)
	 *     refresh?: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search. If `wait_for`, wait for a refresh to make this operation visible to search. If `false`, do nothing with refreshes. Valid values: `true`, `false`, `wait_for`. (DEFAULT: false)
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     timeout?: int|string, // The period each action waits for the following operations: automatic index creation, dynamic mapping updates, and waiting for active shards. The default is `1m` (one minute), which guarantees Elasticsearch waits for at least the timeout before failing. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     _source?: string|array<string>, // Indicates whether to return the `_source` field (`true` or `false`) or contains a list of fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     pipeline?: string, // The pipeline identifier to use to preprocess incoming documents. If the index has a default ingest pipeline specified, setting the value to `_none` turns off the default ingest pipeline for this request. If a final pipeline is configured, it will always run regardless of the value of this parameter.
	 *     require_alias?: bool, // If `true`, the request's actions must target an index alias.
	 *     require_data_stream?: bool, // If `true`, the request's actions must target a data stream (existing or to be created).
	 *     list_executed_pipelines?: bool, // If `true`, the response will include the ingest pipelines that were run for each index or create.
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The operation definition and data (action-data pairs), separated by newlines. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function bulk(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_bulk';
			$method = 'POST';
		} else {
			$url = '/_bulk';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','refresh','routing','timeout','_source','_source_excludes','_source_includes','pipeline','require_alias','require_data_stream','list_executed_pipelines','include_source_on_error','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'bulk');
		return $this->sendRequest($request);
	}


	/**
	 * Clear a scrolling search
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/clear-scroll-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     scroll_id?: string|array<string>, // A comma-separated list of scroll IDs to clear
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // A comma-separated list of scroll IDs to clear if none was specified via the scroll_id parameter. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearScroll(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['scroll_id'])) {
			$url = '/_search/scroll/' . $this->encode($this->convertValue($params['scroll_id']));
			$method = 'DELETE';
		} else {
			$url = '/_search/scroll';
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['scroll_id'], $request, 'clear_scroll');
		return $this->sendRequest($request);
	}


	/**
	 * Close a point in time
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/point-in-time-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) a point-in-time id to close. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function closePointInTime(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_pit';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'close_point_in_time');
		return $this->sendRequest($request);
	}


	/**
	 * Count search results
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-count.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of indices to restrict the results
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     ignore_throttled?: bool, // If `true`, concrete, expanded, or aliased indices are ignored when frozen. (DEFAULT: 1)
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     min_score?: float, // The minimum `_score` value that documents must have to be included in the result.
	 *     preference?: string, // The node or shard the operation should be performed on. By default, it is random.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     q?: string, // The query in Lucene query string syntax. This parameter cannot be used with a request body.
	 *     analyzer?: string, // The analyzer to use for the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     analyze_wildcard?: bool, // If `true`, wildcard and prefix queries are analyzed. This parameter can be used only when the `q` query string parameter is specified.
	 *     default_operator?: string, // The default operator for query string query: `and` or `or`. This parameter can be used only when the `q` query string parameter is specified. (DEFAULT: or)
	 *     df?: string, // The field to use as a default when no field prefix is given in the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     lenient?: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored. This parameter can be used only when the `q` query string parameter is specified.
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard. If a query reaches this limit, Elasticsearch terminates the query early. Elasticsearch collects documents before sorting.  IMPORTANT: Use with caution. Elasticsearch applies this parameter to each shard handling the request. When possible, let Elasticsearch perform early termination automatically. Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // A query to restrict the results specified with the Query DSL (optional). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function count(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_count';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_count';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','min_score','preference','routing','q','analyzer','analyze_wildcard','default_operator','df','lenient','terminate_after','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'count');
		return $this->sendRequest($request);
	}


	/**
	 * Create a new document in the index
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-index_.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. You can set it to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The default value of `1` means it waits for each primary shard to be active. (DEFAULT: 1)
	 *     refresh?: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search. If `wait_for`, it waits for a refresh to make this operation visible to search. If `false`, it does nothing with refreshes. (DEFAULT: false)
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     timeout?: int|string, // The period the request waits for the following operations: automatic index creation, dynamic mapping updates, waiting for active shards. Elasticsearch waits for at least the specified timeout period before failing. The actual wait time could be longer, particularly when multiple waits occur.  This parameter is useful for situations where the primary shard assigned to perform the operation might not be available when the operation runs. Some reasons for this might be that the primary shard is currently recovering from a gateway or undergoing relocation. By default, the operation will wait on the primary shard to become available for at least 1 minute before failing and responding with an error. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     version?: int, // The explicit version number for concurrency control. It must be a non-negative long number.
	 *     version_type?: string, // The version type.
	 *     pipeline?: string, // The ID of the pipeline to use to preprocess incoming documents. If the index has a default ingest pipeline specified, setting the value to `_none` turns off the default ingest pipeline for this request. If a final pipeline is configured, it will always run regardless of the value of this parameter.
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. (DEFAULT: 1)
	 *     require_alias?: bool, // If `true`, the destination must be an index alias.
	 *     require_data_stream?: bool, // If `true`, the request's actions must target a data stream (existing or to be created).
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The document. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function create(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_create/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','refresh','routing','timeout','version','version_type','pipeline','include_source_on_error','require_alias','require_data_stream','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'create');
		return $this->sendRequest($request);
	}


	/**
	 * Delete a document
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-delete.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // The minimum number of shard copies that must be active before proceeding with the operation. You can set it to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The default value of `1` means it waits for each primary shard to be active. (DEFAULT: 1)
	 *     refresh?: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search. If `wait_for`, it waits for a refresh to make this operation visible to search. If `false`, it does nothing with refreshes. (DEFAULT: false)
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     timeout?: int|string, // The period to wait for active shards.  This parameter is useful for situations where the primary shard assigned to perform the delete operation might not be available when the delete operation runs. Some reasons for this might be that the primary shard is currently recovering from a store or undergoing relocation. By default, the delete operation will wait on the primary shard to become available for up to 1 minute before failing and responding with an error. (DEFAULT: 1m)
	 *     if_seq_no?: int, // Only perform the operation if the document has this sequence number.
	 *     if_primary_term?: int, // Only perform the operation if the document has this primary term.
	 *     version?: int, // An explicit version number for concurrency control. It must match the current version of the document for the request to succeed.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function delete(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_doc/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','refresh','routing','timeout','if_seq_no','if_primary_term','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'delete');
		return $this->sendRequest($request);
	}


	/**
	 * Delete documents
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-delete-by-query.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // Analyzer to use for the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     analyze_wildcard?: bool, // If `true`, wildcard and prefix queries are analyzed. This parameter can be used only when the `q` query string parameter is specified.
	 *     default_operator?: string, // The default operator for query string query: `and` or `or`. This parameter can be used only when the `q` query string parameter is specified. (DEFAULT: or)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     from?: int, // Skips the specified number of documents.
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     conflicts?: string, // What to do if delete by query hits version conflicts: `abort` or `proceed`. (DEFAULT: abort)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     lenient?: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored. This parameter can be used only when the `q` query string parameter is specified.
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     q?: string, // A query in the Lucene query string syntax.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     scroll?: int|string, // The period to retain the search context for scrolling.
	 *     search_type?: string, // The type of the search operation. Available options include `query_then_fetch` and `dfs_query_then_fetch`.
	 *     search_timeout?: int|string, // The explicit timeout for each search request. It defaults to no timeout.
	 *     max_docs?: int, // The maximum number of documents to process. Defaults to all documents. When set to a value less then or equal to `scroll_size`, a scroll will not be used to retrieve the results for the operation.
	 *     sort?: string|array<string>, // A comma-separated list of `<field>:<direction>` pairs.
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard. If a query reaches this limit, Elasticsearch terminates the query early. Elasticsearch collects documents before sorting.  Use with caution. Elasticsearch applies this parameter to each shard handling the request. When possible, let Elasticsearch perform early termination automatically. Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.
	 *     stats?: string|array<string>, // The specific `tag` of the request for logging and statistical purposes.
	 *     version?: bool, // If `true`, returns the document version as part of a hit.
	 *     request_cache?: bool, // If `true`, the request cache is used for this request. Defaults to the index-level setting.
	 *     refresh?: bool, // If `true`, Elasticsearch refreshes all shards involved in the delete by query after the request completes. This is different than the delete API's `refresh` parameter, which causes just the shard that received the delete request to be refreshed. Unlike the delete API, it does not support `wait_for`.
	 *     timeout?: int|string, // The period each deletion request waits for active shards. (DEFAULT: 1m)
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The `timeout` value controls how long each write request waits for unavailable shards to become available. (DEFAULT: 1)
	 *     scroll_size?: int, // The size of the scroll request that powers the operation. (DEFAULT: 1000)
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the operation is complete. If `false`, Elasticsearch performs some preflight checks, launches the request, and returns a task you can use to cancel or get the status of the task. Elasticsearch creates a record of this task as a document at `.tasks/task/${taskId}`. When you are done with a task, you should delete the task document so Elasticsearch can reclaim the space. (DEFAULT: 1)
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. (DEFAULT: -1)
	 *     slices?: int|string, // The number of slices this task should be divided into. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The search definition using the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteByQuery(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_delete_by_query';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['analyzer','analyze_wildcard','default_operator','df','from','ignore_unavailable','allow_no_indices','conflicts','expand_wildcards','lenient','preference','q','routing','scroll','search_type','search_timeout','max_docs','sort','terminate_after','stats','version','request_cache','refresh','timeout','wait_for_active_shards','scroll_size','wait_for_completion','requests_per_second','slices','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'delete_by_query');
		return $this->sendRequest($request);
	}


	/**
	 * Throttle a delete by query operation
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-delete-by-query.html#docs-delete-by-query-rethrottle
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. To disable throttling, set it to `-1`.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteByQueryRethrottle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_id','requests_per_second'], $params);
		$url = '/_delete_by_query/' . $this->encode($params['task_id']) . '/_rethrottle';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['requests_per_second','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_id'], $request, 'delete_by_query_rethrottle');
		return $this->sendRequest($request);
	}


	/**
	 * Delete a script or search template
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/delete-stored-script-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     timeout?: int|string, // The period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. It can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. It can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteScript(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_scripts/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'delete_script');
		return $this->sendRequest($request);
	}


	/**
	 * Check a document
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-get.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit. If no fields are specified, no stored fields are included in the response. If this field is specified, the `_source` parameter defaults to `false`.
	 *     preference?: string, // The node or shard the operation should be performed on. By default, the operation is randomized between the shard replicas.  If it is set to `_local`, the operation will prefer to be run on a local allocated shard when possible. If it is set to a custom value, the value is used to guarantee that the same shards will be used for the same custom value. This can help with "jumping values" when hitting different shards in different refresh states. A sample value can be something like the web session ID or the user name.
	 *     realtime?: bool, // If `true`, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     refresh?: bool, // If `true`, the request refreshes the relevant shards before retrieving the document. Setting it to `true` should be done after careful thought and verification that this does not cause a heavy load on the system (and slow down indexing).
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // Indicates whether to return the `_source` field (`true` or `false`) or lists the fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     version?: int, // Explicit version number for concurrency control. The specified version must match the current version of the document for the request to succeed.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function exists(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_doc/' . $this->encode($params['id']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['stored_fields','preference','realtime','refresh','routing','_source','_source_excludes','_source_includes','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'exists');
		return $this->sendRequest($request);
	}


	/**
	 * Check for a document source
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-get.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     preference?: string, // The node or shard the operation should be performed on. By default, the operation is randomized between the shard replicas.
	 *     realtime?: bool, // If `true`, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     refresh?: bool, // If `true`, the request refreshes the relevant shards before retrieving the document. Setting it to `true` should be done after careful thought and verification that this does not cause a heavy load on the system (and slow down indexing).
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // Indicates whether to return the `_source` field (`true` or `false`) or lists the fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response.
	 *     version?: int, // The version number for concurrency control. It must match the current version of the document for the request to succeed.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function existsSource(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_source/' . $this->encode($params['id']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['preference','realtime','refresh','routing','_source','_source_excludes','_source_includes','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'exists_source');
		return $this->sendRequest($request);
	}


	/**
	 * Explain a document match result
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-explain.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     analyze_wildcard?: bool, // If `true`, wildcard and prefix queries are analyzed. This parameter can be used only when the `q` query string parameter is specified.
	 *     analyzer?: string, // The analyzer to use for the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     default_operator?: string, // The default operator for query string query: `and` or `or`. This parameter can be used only when the `q` query string parameter is specified. (DEFAULT: or)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return in the response.
	 *     lenient?: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored. This parameter can be used only when the `q` query string parameter is specified.
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     q?: string, // The query in the Lucene query string syntax.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // `True` or `false` to return the `_source` field or not or a list of fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The query definition using the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function explain(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_explain/' . $this->encode($params['id']);
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['analyze_wildcard','analyzer','default_operator','df','stored_fields','lenient','preference','q','routing','_source','_source_excludes','_source_includes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'explain');
		return $this->sendRequest($request);
	}


	/**
	 * Get the field capabilities
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-field-caps.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     fields?: string|array<string>, // A comma-separated list of fields to retrieve capabilities for. Wildcard (`*`) expressions are supported.
	 *     ignore_unavailable?: bool, // If `true`, missing or closed indices are not included in the response.
	 *     allow_no_indices?: bool, // If false, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with foo but no index starts with bar. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     include_unmapped?: bool, // If true, unmapped fields are included in the response.
	 *     filters?: string|array<string>, // A comma-separated list of filters to apply to the response.
	 *     types?: string|array<string>, // A comma-separated list of field types to include. Any fields that do not match one of these types will be excluded from the results. It defaults to empty, meaning that all field types are returned.
	 *     include_empty_fields?: bool, // If false, empty fields are not included in the response. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // An index filter specified with the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function fieldCaps(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_field_caps';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_field_caps';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['fields','ignore_unavailable','allow_no_indices','expand_wildcards','include_unmapped','filters','types','include_empty_fields','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'field_caps');
		return $this->sendRequest($request);
	}


	/**
	 * Get a document by its ID
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-get.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     force_synthetic_source?: bool, // Indicates whether the request forces synthetic `_source`. Use this paramater to test if the mapping supports synthetic `_source` and to get a sense of the worst case performance. Fetches with this parameter enabled will be slower than enabling synthetic source natively in the index.
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit. If no fields are specified, no stored fields are included in the response. If this field is specified, the `_source` parameter defaults to `false`. Only leaf fields can be retrieved with the `stored_field` option. Object fields can't be returned;​if specified, the request fails.
	 *     preference?: string, // The node or shard the operation should be performed on. By default, the operation is randomized between the shard replicas.  If it is set to `_local`, the operation will prefer to be run on a local allocated shard when possible. If it is set to a custom value, the value is used to guarantee that the same shards will be used for the same custom value. This can help with "jumping values" when hitting different shards in different refresh states. A sample value can be something like the web session ID or the user name.
	 *     realtime?: bool, // If `true`, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     refresh?: bool, // If `true`, the request refreshes the relevant shards before retrieving the document. Setting it to `true` should be done after careful thought and verification that this does not cause a heavy load on the system (and slow down indexing).
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // Indicates whether to return the `_source` field (`true` or `false`) or lists the fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     version?: int, // The version number for concurrency control. It must match the current version of the document for the request to succeed.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function get(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_doc/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['force_synthetic_source','stored_fields','preference','realtime','refresh','routing','_source','_source_excludes','_source_includes','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'get');
		return $this->sendRequest($request);
	}


	/**
	 * Get a script or search template
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/get-stored-script-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. It can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getScript(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_scripts/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'get_script');
		return $this->sendRequest($request);
	}


	/**
	 * Get script contexts
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/get-script-contexts-api.html
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getScriptContext(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_script_context';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'get_script_context');
		return $this->sendRequest($request);
	}


	/**
	 * Get script languages
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/get-script-languages-api.html
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getScriptLanguages(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_script_language';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'get_script_languages');
		return $this->sendRequest($request);
	}


	/**
	 * Get a document's source
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-get.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     preference?: string, // The node or shard the operation should be performed on. By default, the operation is randomized between the shard replicas.
	 *     realtime?: bool, // If `true`, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     refresh?: bool, // If `true`, the request refreshes the relevant shards before retrieving the document. Setting it to `true` should be done after careful thought and verification that this does not cause a heavy load on the system (and slow down indexing).
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // Indicates whether to return the `_source` field (`true` or `false`) or lists the fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude in the response.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response.
	 *     version?: int, // The version number for concurrency control. It must match the current version of the document for the request to succeed.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getSource(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_source/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['preference','realtime','refresh','routing','_source','_source_excludes','_source_includes','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'get_source');
		return $this->sendRequest($request);
	}


	/**
	 * Get the cluster health
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/health-api.html
	 *
	 * @param array{
	 *     feature?: string, // A feature of the cluster, as returned by the top-level health API
	 *     timeout?: int|string, // Explicit operation timeout.
	 *     verbose?: bool, // Opt-in for more information about the health of the system. (DEFAULT: 1)
	 *     size?: int, // Limit the number of affected resources the health report API returns. (DEFAULT: 1000)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function healthReport(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['feature'])) {
			$url = '/_health_report/' . $this->encode($params['feature']);
			$method = 'GET';
		} else {
			$url = '/_health_report';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['timeout','verbose','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['feature'], $request, 'health_report');
		return $this->sendRequest($request);
	}


	/**
	 * Create or update a document in an index
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-index_.html
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. You can set it to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The default value of `1` means it waits for each primary shard to be active. (DEFAULT: 1)
	 *     op_type?: string, // Set to `create` to only index the document if it does not already exist (put if absent). If a document with the specified `_id` already exists, the indexing operation will fail. The behavior is the same as using the `<index>/_create` endpoint. If a document ID is specified, this paramater defaults to `index`. Otherwise, it defaults to `create`. If the request targets a data stream, an `op_type` of `create` is required.
	 *     refresh?: string, // If `true`, Elasticsearch refreshes the affected shards to make this operation visible to search. If `wait_for`, it waits for a refresh to make this operation visible to search. If `false`, it does nothing with refreshes. (DEFAULT: false)
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     timeout?: int|string, // The period the request waits for the following operations: automatic index creation, dynamic mapping updates, waiting for active shards.  This parameter is useful for situations where the primary shard assigned to perform the operation might not be available when the operation runs. Some reasons for this might be that the primary shard is currently recovering from a gateway or undergoing relocation. By default, the operation will wait on the primary shard to become available for at least 1 minute before failing and responding with an error. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     version?: int, // An explicit version number for concurrency control. It must be a non-negative long number.
	 *     version_type?: string, // The version type.
	 *     if_seq_no?: int, // Only perform the operation if the document has this sequence number.
	 *     if_primary_term?: int, // Only perform the operation if the document has this primary term.
	 *     pipeline?: string, // The ID of the pipeline to use to preprocess incoming documents. If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request. If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     require_alias?: bool, // If `true`, the destination must be an index alias.
	 *     require_data_stream?: bool, // If `true`, the request's actions must target a data stream (existing or to be created).
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The document. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function index(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		if (isset($params['id'])) {
			$url = '/' . $this->encode($params['index']) . '/_doc/' . $this->encode($params['id']);
			$method = 'PUT';
		} else {
			$url = '/' . $this->encode($params['index']) . '/_doc';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','op_type','refresh','routing','timeout','version','version_type','if_seq_no','if_primary_term','pipeline','require_alias','require_data_stream','include_source_on_error','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'index');
		return $this->sendRequest($request);
	}


	/**
	 * Get cluster info
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/rest-api-root.html
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function info(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'info');
		return $this->sendRequest($request);
	}


	/**
	 * Run a knn search
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/knn-search-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` to perform the operation on all indices
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The search definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function knnSearch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_knn_search';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['routing','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'knn_search');
		return $this->sendRequest($request);
	}


	/**
	 * Get multiple documents
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-multi-get.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string, // The name of the index
	 *     force_synthetic_source?: bool, // Should this request force synthetic _source? Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance. Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     stored_fields?: string|array<string>, // If `true`, retrieves the document fields stored in the index rather than the document `_source`. (DEFAULT: false)
	 *     preference?: string, // Specifies the node or shard the operation should be performed on. Random by default.
	 *     realtime?: bool, // If `true`, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     refresh?: bool, // If `true`, the request refreshes relevant shards before retrieving documents.
	 *     routing?: string|array<string>, // Custom value used to route operations to a specific shard.
	 *     _source?: string|array<string>, // True or false to return the `_source` field or not, or a list of fields to return.
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Document identifiers; can be either `docs` (containing full document information) or `ids` (when index is provided in the URL.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function mget(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_mget';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_mget';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['force_synthetic_source','stored_fields','preference','realtime','refresh','routing','_source','_source_excludes','_source_includes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'mget');
		return $this->sendRequest($request);
	}


	/**
	 * Run multiple searches
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-multi-search.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to use as default
	 *     search_type?: string, // Indicates whether global term and document frequencies should be used when scoring returned documents.
	 *     max_concurrent_searches?: int, // Maximum number of concurrent searches the multi search API can execute.
	 *     typed_keys?: bool, // Specifies whether aggregation and suggester names should be prefixed by their respective types in the response.
	 *     pre_filter_shard_size?: int, // Defines a threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method i.e., if date filters are mandatory to match but the shard bounds and the query are disjoint.
	 *     max_concurrent_shard_requests?: int, // Maximum number of concurrent shard requests that each sub-search request executes per node. (DEFAULT: 5)
	 *     rest_total_hits_as_int?: bool, // If true, hits.total are returned as an integer in the response. Defaults to false, which returns an object.
	 *     ccs_minimize_roundtrips?: bool, // If true, network roundtrips between the coordinating node and remote clusters are minimized for cross-cluster search requests. (DEFAULT: 1)
	 *     ignore_unavailable?: bool, // If true, missing or closed indices are not included in the response.
	 *     ignore_throttled?: bool, // If true, concrete, expanded or aliased indices are ignored when frozen.
	 *     allow_no_indices?: bool, // If false, the request returns an error if any wildcard expression, index alias, or _all value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting foo*,bar* returns an error if an index starts with foo but no index starts with bar.
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard expressions can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. (DEFAULT: open)
	 *     routing?: string|array<string>, // Custom routing value used to route search operations to a specific shard.
	 *     include_named_queries_score?: bool, // Indicates whether hit.matched_queries should be rendered as a map that includes the name of the matched query associated with its score (true) or as an array containing the name of the matched queries (false) This functionality reruns each named query on every hit in a search response. Typically, this adds a small overhead to a request. However, using computationally expensive named queries on a large number of hits may add significant overhead.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The request definitions (metadata-search request definition pairs), separated by newlines. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function msearch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['search_type','max_concurrent_searches','typed_keys','pre_filter_shard_size','max_concurrent_shard_requests','rest_total_hits_as_int','ccs_minimize_roundtrips','ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','routing','include_named_queries_score','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'msearch');
		return $this->sendRequest($request);
	}


	/**
	 * Run multiple templated searches
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/multi-search-template.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to use as default
	 *     search_type?: string, // The type of the search operation.
	 *     typed_keys?: bool, // If `true`, the response prefixes aggregation and suggester names with their respective types.
	 *     max_concurrent_searches?: int, // The maximum number of concurrent searches the API can run.
	 *     rest_total_hits_as_int?: bool, // If `true`, the response returns `hits.total` as an integer. If `false`, it returns `hits.total` as an object.
	 *     ccs_minimize_roundtrips?: bool, // If `true`, network round-trips are minimized for cross-cluster search requests. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The request definitions (metadata-search request definition pairs), separated by newlines. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function msearchTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_msearch/template';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_msearch/template';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['search_type','typed_keys','max_concurrent_searches','rest_total_hits_as_int','ccs_minimize_roundtrips','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'msearch_template');
		return $this->sendRequest($request);
	}


	/**
	 * Get multiple term vectors
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-multi-termvectors.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string, // The index in which the document resides.
	 *     ids?: string|array<string>, // A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
	 *     term_statistics?: bool, // If true, the response includes term frequency and document frequency.
	 *     field_statistics?: bool, // If `true`, the response includes the document count, sum of document frequencies, and sum of total term frequencies. (DEFAULT: 1)
	 *     fields?: string|array<string>, // A comma-separated list or wildcard expressions of fields to include in the statistics. It is used as the default list unless a specific field list is provided in the `completion_fields` or `fielddata_fields` parameters.
	 *     offsets?: bool, // If `true`, the response includes term offsets. (DEFAULT: 1)
	 *     positions?: bool, // If `true`, the response includes term positions. (DEFAULT: 1)
	 *     payloads?: bool, // If `true`, the response includes term payloads. (DEFAULT: 1)
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     realtime?: bool, // If true, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     version?: int, // If `true`, returns the document version as part of a hit.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Define ids, documents, parameters or a list of parameters per document here. You must at least provide a list of document ids. See documentation.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function mtermvectors(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_mtermvectors';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_mtermvectors';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ids','term_statistics','field_statistics','fields','offsets','positions','payloads','preference','routing','realtime','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'mtermvectors');
		return $this->sendRequest($request);
	}


	/**
	 * Open a point in time
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/point-in-time-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to open point in time; use `_all` or empty string to perform the operation on all indices
	 *     preference?: string, // The node or shard the operation should be performed on. By default, it is random.
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     keep_alive?: int|string, // Extend the length of time that the point in time persists.
	 *     allow_partial_search_results?: bool, // Indicates whether the point in time tolerates unavailable shards or shard failures when initially creating the PIT. If `false`, creating a point in time request when a shard is missing or unavailable will throw an exception. If `true`, the point in time will contain all the shards that are available at the time of the request.
	 *     max_concurrent_shard_requests?: int, // Maximum number of concurrent shard requests that each sub-search request executes per node. (DEFAULT: 5)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // An index_filter specified with the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function openPointInTime(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','keep_alive'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_pit';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['preference','routing','ignore_unavailable','expand_wildcards','keep_alive','allow_partial_search_results','max_concurrent_shard_requests','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'open_point_in_time');
		return $this->sendRequest($request);
	}


	/**
	 * Ping the cluster
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster.html
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function ping(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/';
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ping');
		return $this->sendRequest($request);
	}


	/**
	 * Create or update a script or search template
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/create-stored-script-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     context?: string, // Script context
	 *     timeout?: int|string, // The period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. It can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. It can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The document. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putScript(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		if (isset($params['context'])) {
			$url = '/_scripts/' . $this->encode($params['id']) . '/' . $this->encode($params['context']);
			$method = 'PUT';
		} else {
			$url = '/_scripts/' . $this->encode($params['id']);
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'context'], $request, 'put_script');
		return $this->sendRequest($request);
	}


	/**
	 * Evaluate ranked search results
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-rank-eval.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // If `true`, missing or closed indices are not included in the response.
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both. (DEFAULT: open)
	 *     search_type?: string, // Search operation type
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The ranking evaluation search definition, including search requests, document ratings and ranking metric definition.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function rankEval(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_rank_eval';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_rank_eval';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','search_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'rank_eval');
		return $this->sendRequest($request);
	}


	/**
	 * Reindex documents
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-reindex.html
	 * @group serverless
	 *
	 * @param array{
	 *     refresh?: bool, // If `true`, the request refreshes affected shards to make this operation visible to search.
	 *     timeout?: int|string, // The period each indexing waits for automatic index creation, dynamic mapping updates, and waiting for active shards. By default, Elasticsearch waits for at least one minute before failing. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. Set it to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The default value is one, which means it waits for each primary shard to be active. (DEFAULT: 1)
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the operation is complete. (DEFAULT: 1)
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. By default, there is no throttle. (DEFAULT: -1)
	 *     scroll?: int|string, // The period of time that a consistent view of the index should be maintained for scrolled search. (DEFAULT: 5m)
	 *     slices?: int|string, // The number of slices this task should be divided into. It defaults to one slice, which means the task isn't sliced into subtasks.  Reindex supports sliced scroll to parallelize the reindexing process. This parallelization can improve efficiency and provide a convenient way to break the request down into smaller parts.  NOTE: Reindexing from remote clusters does not support manual or automatic slicing.  If set to `auto`, Elasticsearch chooses the number of slices to use. This setting will use one slice per shard, up to a certain limit. If there are multiple sources, it will choose the number of slices based on the index or backing index with the smallest number of shards. (DEFAULT: 1)
	 *     max_docs?: int, // The maximum number of documents to reindex. By default, all documents are reindexed. If it is a value less then or equal to `scroll_size`, a scroll will not be used to retrieve the results for the operation.  If `conflicts` is set to `proceed`, the reindex operation could attempt to reindex more documents from the source than `max_docs` until it has successfully indexed `max_docs` documents into the target or it has gone through every document in the source query.
	 *     require_alias?: bool, // If `true`, the destination must be an index alias.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The search definition using the Query DSL and the prototype for the index request.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reindex(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_reindex';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['refresh','timeout','wait_for_active_shards','wait_for_completion','requests_per_second','scroll','slices','max_docs','require_alias','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'reindex');
		return $this->sendRequest($request);
	}


	/**
	 * Throttle a reindex operation
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-reindex.html
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. It can be either `-1` to turn off throttling or any decimal number like `1.7` or `12` to throttle to that level.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reindexRethrottle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_id','requests_per_second'], $params);
		$url = '/_reindex/' . $this->encode($params['task_id']) . '/_rethrottle';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['requests_per_second','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_id'], $request, 'reindex_rethrottle');
		return $this->sendRequest($request);
	}


	/**
	 * Render a search template
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/render-search-template-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // The id of the stored search template
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The search definition template and its params. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function renderSearchTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['id'])) {
			$url = '/_render/template/' . $this->encode($params['id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_render/template';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'render_search_template');
		return $this->sendRequest($request);
	}


	/**
	 * Run a script
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/painless/8.19/painless-execute-api.html
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The script to execute. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function scriptsPainlessExecute(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_scripts/painless/_execute';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'scripts_painless_execute');
		return $this->sendRequest($request);
	}


	/**
	 * Run a scrolling search
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/scroll-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     scroll_id?: string, // The scroll ID
	 *     scroll?: int|string, // The period to retain the search context for scrolling. (DEFAULT: 1d)
	 *     rest_total_hits_as_int?: bool, // If true, the API response’s hit.total property is returned as an integer. If false, the API response’s hit.total property is returned as an object.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The scroll ID if not passed by URL or query parameter.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function scroll(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['scroll_id'])) {
			$url = '/_search/scroll/' . $this->encode($params['scroll_id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_search/scroll';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['scroll','rest_total_hits_as_int','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['scroll_id'], $request, 'scroll');
		return $this->sendRequest($request);
	}


	/**
	 * Run a search
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-search.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // The analyzer to use for the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     analyze_wildcard?: bool, // If `true`, wildcard and prefix queries are analyzed. This parameter can be used only when the `q` query string parameter is specified.
	 *     ccs_minimize_roundtrips?: bool, // If `true`, network round-trips between the coordinating node and the remote clusters are minimized when running cross-cluster search (CCS) requests. (DEFAULT: 1)
	 *     default_operator?: string, // The default operator for the query string query: `and` or `or`. This parameter can be used only when the `q` query string parameter is specified. (DEFAULT: or)
	 *     df?: string, // The field to use as a default when no field prefix is given in the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     explain?: bool, // If `true`, the request returns detailed information about score computation as part of a hit.
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit. If no fields are specified, no stored fields are included in the response. If this field is specified, the `_source` parameter defaults to `false`. You can pass `_source: true` to return both source fields and stored fields in the search response.
	 *     docvalue_fields?: string|array<string>, // A comma-separated list of fields to return as the docvalue representation of a field for each hit.
	 *     from?: int, // The starting document offset, which must be non-negative. By default, you cannot page through more than 10,000 hits using the `from` and `size` parameters. To page through more hits, use the `search_after` parameter.
	 *     force_synthetic_source?: bool, // Should this request force synthetic _source? Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance. Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     ignore_throttled?: bool, // If `true`, concrete, expanded or aliased indices will be ignored when frozen. (DEFAULT: 1)
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values such as `open,hidden`. (DEFAULT: open)
	 *     lenient?: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored. This parameter can be used only when the `q` query string parameter is specified.
	 *     preference?: string, // The nodes and shards used for the search. By default, Elasticsearch selects from eligible nodes and shards using adaptive replica selection, accounting for allocation awareness. Valid values are:  * `_only_local` to run the search only on shards on the local node; * `_local` to, if possible, run the search on shards on the local node, or if not, select shards using the default method; * `_only_nodes:<node-id>,<node-id>` to run the search on only the specified nodes IDs, where, if suitable shards exist on more than one selected node, use shards on those nodes using the default method, or if none of the specified nodes are available, select shards from any available node using the default method; * `_prefer_nodes:<node-id>,<node-id>` to if possible, run the search on the specified nodes IDs, or if not, select shards using the default method; * `_shards:<shard>,<shard>` to run the search only on the specified shards; * `<custom-string>` (any string that does not start with `_`) to route searches with the same `<custom-string>` to the same shards in the same order.
	 *     q?: string, // A query in the Lucene query string syntax. Query parameter searches do not support the full Elasticsearch Query DSL but are handy for testing.  IMPORTANT: This parameter overrides the query parameter in the request body. If both parameters are specified, documents matching the query request body parameter are not returned.
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     scroll?: int|string, // The period to retain the search context for scrolling. By default, this value cannot exceed `1d` (24 hours). You can change this limit by using the `search.max_keep_alive` cluster-level setting.
	 *     search_type?: string, // Indicates how distributed term frequencies are calculated for relevance scoring.
	 *     size?: int, // The number of hits to return. By default, you cannot page through more than 10,000 hits using the `from` and `size` parameters. To page through more hits, use the `search_after` parameter. (DEFAULT: 10)
	 *     sort?: string|array<string>, // A comma-separated list of `<field>:<direction>` pairs.
	 *     _source?: string|array<string>, // The source fields that are returned for matching documents. These fields are returned in the `hits._source` property of the search response. Valid values are:  * `true` to return the entire document source. * `false` to not return the document source. * `<string>` to return the source fields that are specified as a comma-separated list that supports wildcard (`*`) patterns. (DEFAULT: true)
	 *     _source_excludes?: string|array<string>, // A comma-separated list of source fields to exclude from the response. You can also use this parameter to exclude fields from the subset specified in `_source_includes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     _source_includes?: string|array<string>, // A comma-separated list of source fields to include in the response. If this parameter is specified, only these source fields are returned. You can exclude fields from this subset using the `_source_excludes` query parameter. If the `_source` parameter is `false`, this parameter is ignored.
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard. If a query reaches this limit, Elasticsearch terminates the query early. Elasticsearch collects documents before sorting.  IMPORTANT: Use with caution. Elasticsearch applies this parameter to each shard handling the request. When possible, let Elasticsearch perform early termination automatically. Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers. If set to `0` (default), the query does not terminate early.
	 *     stats?: string|array<string>, // Specific `tag` of the request for logging and statistical purposes.
	 *     suggest_field?: string, // The field to use for suggestions.
	 *     suggest_mode?: string, // The suggest mode. This parameter can be used only when the `suggest_field` and `suggest_text` query string parameters are specified. (DEFAULT: missing)
	 *     suggest_size?: int, // The number of suggestions to return. This parameter can be used only when the `suggest_field` and `suggest_text` query string parameters are specified.
	 *     suggest_text?: string, // The source text for which the suggestions should be returned. This parameter can be used only when the `suggest_field` and `suggest_text` query string parameters are specified.
	 *     timeout?: int|string, // The period of time to wait for a response from each shard. If no response is received before the timeout expires, the request fails and returns an error. It defaults to no timeout.
	 *     track_scores?: bool, // If `true`, the request calculates and returns document scores, even if the scores are not used for sorting.
	 *     track_total_hits?: bool|int, // The number of hits matching the query to count accurately. If `true`, the exact number of hits is returned at the cost of some performance. If `false`, the response does not include the total number of hits matching the query. (DEFAULT: 10000)
	 *     allow_partial_search_results?: bool, // If `true` and there are shard request timeouts or shard failures, the request returns partial results. If `false`, it returns an error with no partial results.  To override the default behavior, you can set the `search.default_allow_partial_results` cluster setting to `false`. (DEFAULT: 1)
	 *     typed_keys?: bool, // If `true`, aggregation and suggester names are be prefixed by their respective types in the response.
	 *     version?: bool, // If `true`, the request returns the document version as part of a hit.
	 *     seq_no_primary_term?: bool, // If `true`, the request returns the sequence number and primary term of the last modification of each hit.
	 *     request_cache?: bool, // If `true`, the caching of search results is enabled for requests where `size` is `0`. It defaults to index level settings.
	 *     batched_reduce_size?: int, // The number of shard results that should be reduced at once on the coordinating node. If the potential number of shards in the request can be large, this value should be used as a protection mechanism to reduce the memory overhead per search request. (DEFAULT: 512)
	 *     max_concurrent_shard_requests?: int, // The number of concurrent shard requests per node that the search runs concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests. (DEFAULT: 5)
	 *     pre_filter_shard_size?: int, // A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method (if date filters are mandatory to match but the shard bounds and the query are disjoint). When unspecified, the pre-filter phase is executed if any of these conditions is met:  * The request targets more than 128 shards. * The request targets one or more read-only index. * The primary sort of the query targets an indexed field.
	 *     rest_total_hits_as_int?: bool, // Indicates whether `hits.total` should be rendered as an integer or an object in the rest search response.
	 *     min_compatible_shard_node?: string, // The minimum version of the node that can handle the request Any handling node with a lower version will fail the request.
	 *     include_named_queries_score?: bool, // If `true`, the response includes the score contribution from any named queries.  This functionality reruns each named query on every hit in a search response. Typically, this adds a small overhead to a request. However, using computationally expensive named queries on a large number of hits may add significant overhead.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The search definition using the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function search(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_search';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_search';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['analyzer','analyze_wildcard','ccs_minimize_roundtrips','default_operator','df','explain','stored_fields','docvalue_fields','from','force_synthetic_source','ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','lenient','preference','q','routing','scroll','search_type','size','sort','_source','_source_excludes','_source_includes','terminate_after','stats','suggest_field','suggest_mode','suggest_size','suggest_text','timeout','track_scores','track_total_hits','allow_partial_search_results','typed_keys','version','seq_no_primary_term','request_cache','batched_reduce_size','max_concurrent_shard_requests','pre_filter_shard_size','rest_total_hits_as_int','min_compatible_shard_node','include_named_queries_score','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'search');
		return $this->sendRequest($request);
	}


	/**
	 * Search a vector tile
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-vector-tile-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of data streams, indices, or aliases to search
	 *     field: string, // (REQUIRED) Field containing geospatial data to return
	 *     zoom: int, // (REQUIRED) Zoom level for the vector tile to search
	 *     x: int, // (REQUIRED) X coordinate for the vector tile to search
	 *     y: int, // (REQUIRED) Y coordinate for the vector tile to search
	 *     exact_bounds?: bool, // If `false`, the meta layer's feature is the bounding box of the tile. If true, the meta layer's feature is a bounding box resulting from a geo_bounds aggregation. The aggregation runs on <field> values that intersect the <zoom>/<x>/<y> tile with wrap_longitude set to false. The resulting bounding box may be larger than the vector tile.
	 *     extent?: int, // The size, in pixels, of a side of the tile. Vector tiles are square with equal sides. (DEFAULT: 4096)
	 *     grid_precision?: int, // Additional zoom levels available through the aggs layer. For example, if <zoom> is 7 and grid_precision is 8, you can zoom in up to level 15. Accepts 0-8. If 0, results don't include the aggs layer. (DEFAULT: 8)
	 *     grid_type?: string, // Determines the geometry type for features in the aggs layer. In the aggs layer, each feature represents a geotile_grid cell. If 'grid' each feature is a Polygon of the cells bounding box. If 'point' each feature is a Point that is the centroid of the cell. (DEFAULT: grid)
	 *     grid_agg?: string, // Aggregation used to create a grid for `field`. (DEFAULT: geotile)
	 *     size?: int, // Maximum number of features to return in the hits layer. Accepts 0-10000. If 0, results don't include the hits layer. (DEFAULT: 10000)
	 *     track_total_hits?: bool|int, // The number of hits matching the query to count accurately. If `true`, the exact number of hits is returned at the cost of some performance. If `false`, the response does not include the total number of hits matching the query. (DEFAULT: 10000)
	 *     with_labels?: bool, // If `true`, the hits and aggs layers will contain additional point features representing suggested label positions for the original features.  * `Point` and `MultiPoint` features will have one of the points selected. * `Polygon` and `MultiPolygon` features will have a single point generated, either the centroid, if it is within the polygon, or another point within the polygon selected from the sorted triangle-tree. * `LineString` features will likewise provide a roughly central point selected from the triangle-tree. * The aggregation results will provide one central point for each aggregation bucket.  All attributes from the original features will also be copied to the new label features. In addition, the new features will be distinguishable using the tag `_mvt_label_position`.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Search request body.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function searchMvt(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','field','zoom','x','y'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_mvt/' . $this->encode($params['field']) . '/' . $this->encode($params['zoom']) . '/' . $this->encode($params['x']) . '/' . $this->encode($params['y']);
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['exact_bounds','extent','grid_precision','grid_type','grid_agg','size','track_total_hits','with_labels','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/vnd.mapbox-vector-tile',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'field', 'zoom', 'x', 'y'], $request, 'search_mvt');
		return $this->sendRequest($request);
	}


	/**
	 * Get the search shards
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-shards.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     local?: bool, // If `true`, the request retrieves information from the local node only.
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`.
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If the master node is not available before the timeout expires, the request fails and returns an error. IT can also be set to `-1` to indicate that the request should never timeout. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function searchShards(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_search_shards';
			$method = 'GET';
		} else {
			$url = '/_search_shards';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['preference','routing','local','ignore_unavailable','allow_no_indices','expand_wildcards','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'search_shards');
		return $this->sendRequest($request);
	}


	/**
	 * Run a search with a search template
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-template-api.html
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     ignore_throttled?: bool, // If `true`, specified concrete, expanded, or aliased indices are not included in the response when throttled. (DEFAULT: 1)
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     scroll?: int|string, // Specifies how long a consistent view of the index should be maintained for scrolled search.
	 *     search_type?: string, // The type of the search operation.
	 *     explain?: bool, // If `true`, the response includes additional details about score computation as part of a hit.
	 *     profile?: bool, // If `true`, the query execution is profiled.
	 *     typed_keys?: bool, // If `true`, the response prefixes aggregation and suggester names with their respective types.
	 *     rest_total_hits_as_int?: bool, // If `true`, `hits.total` is rendered as an integer in the response. If `false`, it is rendered as an object.
	 *     ccs_minimize_roundtrips?: bool, // If `true`, network round-trips are minimized for cross-cluster search requests.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The search definition template and its params. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function searchTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_search/template';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_search/template';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','preference','routing','scroll','search_type','explain','profile','typed_keys','rest_total_hits_as_int','ccs_minimize_roundtrips','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'search_template');
		return $this->sendRequest($request);
	}


	/**
	 * Get terms in an index
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/search-terms-enum.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) field name, string which is the prefix expected in matching terms, timeout and size for max number of results. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function termsEnum(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_terms_enum';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'terms_enum');
		return $this->sendRequest($request);
	}


	/**
	 * Get term vector information
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-termvectors.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The index in which the document resides.
	 *     id?: string, // The id of the document, when not specified a doc param should be supplied.
	 *     term_statistics?: bool, // If `true`, the response includes:  * The total term frequency (how often a term occurs in all documents). * The document frequency (the number of documents containing the current term).  By default these values are not returned since term statistics can have a serious performance impact.
	 *     field_statistics?: bool, // If `true`, the response includes:  * The document count (how many documents contain this field). * The sum of document frequencies (the sum of document frequencies for all terms in this field). * The sum of total term frequencies (the sum of total term frequencies of each term in this field). (DEFAULT: 1)
	 *     fields?: string|array<string>, // A comma-separated list or wildcard expressions of fields to include in the statistics. It is used as the default list unless a specific field list is provided in the `completion_fields` or `fielddata_fields` parameters.
	 *     offsets?: bool, // If `true`, the response includes term offsets. (DEFAULT: 1)
	 *     positions?: bool, // If `true`, the response includes term positions. (DEFAULT: 1)
	 *     payloads?: bool, // If `true`, the response includes term payloads. (DEFAULT: 1)
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     routing?: string|array<string>, // A custom value that is used to route operations to a specific shard.
	 *     realtime?: bool, // If true, the request is real-time as opposed to near-real-time. (DEFAULT: 1)
	 *     version?: int, // If `true`, returns the document version as part of a hit.
	 *     version_type?: string, // The version type.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Define parameters and or supply a document to get termvectors for. See documentation.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function termvectors(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		if (isset($params['id'])) {
			$url = '/' . $this->encode($params['index']) . '/_termvectors/' . $this->encode($params['id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/' . $this->encode($params['index']) . '/_termvectors';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['term_statistics','field_statistics','fields','offsets','positions','payloads','preference','routing','realtime','version','version_type','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'id'], $request, 'termvectors');
		return $this->sendRequest($request);
	}


	/**
	 * Update a document
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-update.html
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // The number of copies of each shard that must be active before proceeding with the operation. Set to 'all' or any positive integer up to the total number of shards in the index (`number_of_replicas`+1). The default value of `1` means it waits for each primary shard to be active. (DEFAULT: 1)
	 *     _source?: string|array<string>, // If `false`, source retrieval is turned off. You can also specify a comma-separated list of the fields you want to retrieve. (DEFAULT: true)
	 *     _source_excludes?: string|array<string>, // The source fields you want to exclude.
	 *     _source_includes?: string|array<string>, // The source fields you want to retrieve.
	 *     lang?: string, // The script language. (DEFAULT: painless)
	 *     refresh?: string, // If 'true', Elasticsearch refreshes the affected shards to make this operation visible to search. If 'wait_for', it waits for a refresh to make this operation visible to search. If 'false', it does nothing with refreshes. (DEFAULT: false)
	 *     retry_on_conflict?: int, // The number of times the operation should be retried when a conflict occurs.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     timeout?: int|string, // The period to wait for the following operations: dynamic mapping updates and waiting for active shards. Elasticsearch waits for at least the timeout period before failing. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     if_seq_no?: int, // Only perform the operation if the document has this sequence number.
	 *     if_primary_term?: int, // Only perform the operation if the document has this primary term.
	 *     require_alias?: bool, // If `true`, the destination must be an index alias.
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The request definition requires either `script` or partial `doc`. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function update(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_update/' . $this->encode($params['id']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','_source','_source_excludes','_source_includes','lang','refresh','retry_on_conflict','routing','timeout','if_seq_no','if_primary_term','require_alias','include_source_on_error','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'update');
		return $this->sendRequest($request);
	}


	/**
	 * Update documents
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-update-by-query.html
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // The analyzer to use for the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     analyze_wildcard?: bool, // If `true`, wildcard and prefix queries are analyzed. This parameter can be used only when the `q` query string parameter is specified.
	 *     default_operator?: string, // The default operator for query string query: `and` or `or`. This parameter can be used only when the `q` query string parameter is specified. (DEFAULT: or)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string. This parameter can be used only when the `q` query string parameter is specified.
	 *     from?: int, // Skips the specified number of documents.
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a missing or closed index.
	 *     allow_no_indices?: bool, // If `false`, the request returns an error if any wildcard expression, index alias, or `_all` value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting `foo*,bar*` returns an error if an index starts with `foo` but no index starts with `bar`. (DEFAULT: 1)
	 *     conflicts?: string, // The preferred behavior when update by query hits version conflicts: `abort` or `proceed`. (DEFAULT: abort)
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values, such as `open,hidden`. (DEFAULT: open)
	 *     lenient?: bool, // If `true`, format-based query failures (such as providing text to a numeric field) in the query string will be ignored. This parameter can be used only when the `q` query string parameter is specified.
	 *     pipeline?: string, // The ID of the pipeline to use to preprocess incoming documents. If the index has a default ingest pipeline specified, then setting the value to `_none` disables the default ingest pipeline for this request. If a final pipeline is configured it will always run, regardless of the value of this parameter.
	 *     preference?: string, // The node or shard the operation should be performed on. It is random by default.
	 *     q?: string, // A query in the Lucene query string syntax.
	 *     routing?: string|array<string>, // A custom value used to route operations to a specific shard.
	 *     scroll?: int|string, // The period to retain the search context for scrolling. (DEFAULT: 5m)
	 *     search_type?: string, // The type of the search operation. Available options include `query_then_fetch` and `dfs_query_then_fetch`.
	 *     search_timeout?: int|string, // An explicit timeout for each search request. By default, there is no timeout.
	 *     max_docs?: int, // The maximum number of documents to process. It defaults to all documents. When set to a value less then or equal to `scroll_size` then a scroll will not be used to retrieve the results for the operation.
	 *     sort?: string|array<string>, // A comma-separated list of <field>:<direction> pairs.
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard. If a query reaches this limit, Elasticsearch terminates the query early. Elasticsearch collects documents before sorting.  IMPORTANT: Use with caution. Elasticsearch applies this parameter to each shard handling the request. When possible, let Elasticsearch perform early termination automatically. Avoid specifying this parameter for requests that target data streams with backing indices across multiple data tiers.
	 *     stats?: string|array<string>, // The specific `tag` of the request for logging and statistical purposes.
	 *     version?: bool, // If `true`, returns the document version as part of a hit.
	 *     version_type?: bool, // Should the document increment the version number (internal) on hit or not (reindex)
	 *     request_cache?: bool, // If `true`, the request cache is used for this request. It defaults to the index-level setting.
	 *     refresh?: bool, // If `true`, Elasticsearch refreshes affected shards to make the operation visible to search after the request completes. This is different than the update API's `refresh` parameter, which causes just the shard that received the request to be refreshed.
	 *     timeout?: int|string, // The period each update request waits for the following operations: dynamic mapping updates, waiting for active shards. By default, it is one minute. This guarantees Elasticsearch waits for at least the timeout before failing. The actual wait time could be longer, particularly when multiple waits occur. (DEFAULT: 1m)
	 *     wait_for_active_shards?: string, // The number of shard copies that must be active before proceeding with the operation. Set to `all` or any positive integer up to the total number of shards in the index (`number_of_replicas+1`). The `timeout` parameter controls how long each write request waits for unavailable shards to become available. Both work exactly the way they work in the bulk API. (DEFAULT: 1)
	 *     scroll_size?: int, // The size of the scroll request that powers the operation. (DEFAULT: 1000)
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the operation is complete. If `false`, Elasticsearch performs some preflight checks, launches the request, and returns a task ID that you can use to cancel or get the status of the task. Elasticsearch creates a record of this task as a document at `.tasks/task/${taskId}`. (DEFAULT: 1)
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. (DEFAULT: -1)
	 *     slices?: int|string, // The number of slices this task should be divided into. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The search definition using the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateByQuery(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_update_by_query';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['analyzer','analyze_wildcard','default_operator','df','from','ignore_unavailable','allow_no_indices','conflicts','expand_wildcards','lenient','pipeline','preference','q','routing','scroll','search_type','search_timeout','max_docs','sort','terminate_after','stats','version','version_type','request_cache','refresh','timeout','wait_for_active_shards','scroll_size','wait_for_completion','requests_per_second','slices','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'update_by_query');
		return $this->sendRequest($request);
	}


	/**
	 * Throttle an update by query operation
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/docs-update-by-query.html#docs-update-by-query-rethrottle
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. To turn off throttling, set it to `-1`.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateByQueryRethrottle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_id','requests_per_second'], $params);
		$url = '/_update_by_query/' . $this->encode($params['task_id']) . '/_rethrottle';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['requests_per_second','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_id'], $request, 'update_by_query_rethrottle');
		return $this->sendRequest($request);
	}
}
