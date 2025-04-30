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
	 * Allows to perform multiple index/update/delete operations in a single request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-bulk.html
	 *
	 * @param array{
	 *     index?: string, // Default index for items which don't provide one
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the bulk operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing?: string, // Specific routing value
	 *     timeout?: int|string, // Explicit operation timeout
	 *     type?: string, // Default document type for items which don't provide one
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or default list of fields to return, can be overridden on each sub-request
	 *     _source_excludes?: string|array<string>, // Default list of fields to exclude from the returned _source field, can be overridden on each sub-request
	 *     _source_includes?: string|array<string>, // Default list of fields to extract and return from the _source field, can be overridden on each sub-request
	 *     pipeline?: string, // The pipeline id to preprocess incoming documents with
	 *     require_alias?: bool, // Sets require_alias for all incoming documents. Defaults to unset (false)
	 *     require_data_stream?: bool, // When true, requires the destination to be a data stream (existing or to-be-created). Default is false
	 *     list_executed_pipelines?: bool, // Sets list_executed_pipelines for all incoming documents. Defaults to unset (false)
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. Defaults to true.
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
		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','refresh','routing','timeout','type','_source','_source_excludes','_source_includes','pipeline','require_alias','require_data_stream','list_executed_pipelines','include_source_on_error','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'bulk');
		return $this->sendRequest($request);
	}


	/**
	 * Explicitly clears the search context for a scroll.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/clear-scroll-api.html
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
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/point-in-time-api.html
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // a point-in-time id to close. If body is a string must be a valid JSON.
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
	 * Returns number of documents matching a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-count.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of indices to restrict the results
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     min_score?: int, // Include only documents with a specific `_score` value in the result
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     q?: string, // Query in the Lucene query string syntax
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     terminate_after?: int, // The maximum count for each shard, upon reaching which the query execution will terminate early
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
	 * Creates a new document in the index.
	 *
	 * Returns a 409 response when a document with a same ID already exists in the index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing?: string, // Specific routing value
	 *     timeout?: int|string, // Explicit operation timeout
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
	 *     pipeline?: string, // The pipeline id to preprocess incoming documents with
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. Defaults to true.
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

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','refresh','routing','timeout','version','version_type','pipeline','include_source_on_error','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id', 'index'], $request, 'create');
		return $this->sendRequest($request);
	}


	/**
	 * Removes a document from the index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the delete operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing?: string, // Specific routing value
	 *     timeout?: int|string, // Explicit operation timeout
	 *     if_seq_no?: int, // only perform the delete operation if the last operation that has changed the document has the specified sequence number
	 *     if_primary_term?: int, // only perform the delete operation if the last operation that has changed the document has the specified primary term
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Deletes documents matching the provided query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-delete-by-query.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     from?: int, // Starting offset (default: 0)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     conflicts?: string, // What to do when the delete by query hits version conflicts?
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     scroll?: int|string, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     search_type?: string, // Search operation type
	 *     search_timeout?: int|string, // Explicit timeout for each search request. Defaults to no timeout.
	 *     max_docs?: int, // Maximum number of documents to process (default: all documents)
	 *     sort?: string|array<string>, // A comma-separated list of <field>:<direction> pairs
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     stats?: string|array<string>, // Specific 'tag' of the request for logging and statistical purposes
	 *     version?: bool, // Specify whether to return document version as part of a hit
	 *     request_cache?: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     refresh?: bool, // Should the affected indexes be refreshed?
	 *     timeout?: int|string, // Time each individual bulk request should wait for shards that are unavailable.
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     scroll_size?: int, // Size on the scroll request powering the delete by query
	 *     wait_for_completion?: bool, // Should the request should block until the delete by query is complete.
	 *     requests_per_second?: int, // The throttle for this request in sub-requests per second. -1 means no throttle.
	 *     slices?: int|string, // The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`.
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
	 * Changes the number of requests per second for a particular Delete By Query operation.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-delete-by-query.html
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle to set on this request in floating sub-requests per second. -1 means set no throttle.
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
	 * Deletes a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	 * Returns information about whether a document exists in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return in the response
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime?: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh?: bool, // Refresh the shard containing the document before performing the operation
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Returns information about whether a document source exists in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime?: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh?: bool, // Refresh the shard containing the document before performing the operation
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Returns information about why a specific matches (or doesn't match) a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-explain.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     analyze_wildcard?: bool, // Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)
	 *     analyzer?: string, // The analyzer for the query string query
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The default field for query string query (default: _all)
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return in the response
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
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
	 * Returns the information about the capabilities of fields among multiple indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-field-caps.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     fields?: string|array<string>, // A comma-separated list of field names
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     include_unmapped?: bool, // Indicates whether unmapped fields should be included in the response.
	 *     filters?: string|array<string>, // An optional set of filters: can include +metadata,-metadata,-nested,-multifield,-parent
	 *     types?: string|array<string>, // Only return results for fields that have one of the types in the list
	 *     include_empty_fields?: bool, // Include empty fields in result
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
	 * Returns a document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     force_synthetic_source?: bool, // Should this request force synthetic _source? Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance. Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return in the response
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime?: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh?: bool, // Refresh the shard containing the document before performing the operation
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Returns a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	 * Returns all script contexts.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/painless/master/painless-contexts.html
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
	 * Returns available script types, languages and contexts
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
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
	 * Returns the source of a document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-get.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime?: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh?: bool, // Refresh the shard containing the document before performing the operation
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Returns the health of the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/health-api.html
	 *
	 * @param array{
	 *     feature?: string, // A feature of the cluster, as returned by the top-level health API
	 *     timeout?: int|string, // Explicit operation timeout
	 *     verbose?: bool, // Opt in for more information about the health of the system
	 *     size?: int, // Limit the number of affected resources the health API returns
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
	 * Creates or updates a document in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-index_.html
	 *
	 * @param array{
	 *     id?: string, // Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     op_type?: string, // Explicit operation type. Defaults to `index` for requests with an explicit document ID, and to `create`for requests without an explicit document ID
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     routing?: string, // Specific routing value
	 *     timeout?: int|string, // Explicit operation timeout
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
	 *     if_seq_no?: int, // only perform the index operation if the last operation that has changed the document has the specified sequence number
	 *     if_primary_term?: int, // only perform the index operation if the last operation that has changed the document has the specified primary term
	 *     pipeline?: string, // The pipeline id to preprocess incoming documents with
	 *     require_alias?: bool, // When true, requires destination to be an alias. Default is false
	 *     require_data_stream?: bool, // When true, requires the destination to be a data stream (existing or to-be-created). Default is false
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. Defaults to true.
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
	 * Returns basic information about the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
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
	 * Performs a kNN search.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-search.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` to perform the operation on all indices
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The search definition. If body is a string must be a valid JSON.
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
		$this->checkRequiredParameters(['index'], $params);
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
	 * Allows to get multiple documents in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-get.html
	 *
	 * @param array{
	 *     index?: string, // The name of the index
	 *     force_synthetic_source?: bool, // Should this request force synthetic _source? Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance. Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return in the response
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     realtime?: bool, // Specify whether to perform the operation in realtime or search mode
	 *     refresh?: bool, // Refresh the shard containing the document before performing the operation
	 *     routing?: string, // Specific routing value
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
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
	 * Allows to execute several search operations in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-multi-search.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to use as default
	 *     search_type?: string, // Search operation type
	 *     max_concurrent_searches?: int, // Controls the maximum number of concurrent searches the multi search api will execute
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     pre_filter_shard_size?: int, // A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
	 *     max_concurrent_shard_requests?: int, // The number of concurrent shard requests each sub search executes concurrently per node. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     ccs_minimize_roundtrips?: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
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
		$url = $this->addQueryString($url, $params, ['search_type','max_concurrent_searches','typed_keys','pre_filter_shard_size','max_concurrent_shard_requests','rest_total_hits_as_int','ccs_minimize_roundtrips','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'msearch');
		return $this->sendRequest($request);
	}


	/**
	 * Allows to execute several search template operations in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-multi-search.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to use as default
	 *     search_type?: string, // Search operation type
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     max_concurrent_searches?: int, // Controls the maximum number of concurrent searches the multi search api will execute
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     ccs_minimize_roundtrips?: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
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
	 * Returns multiple termvectors in one request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-multi-termvectors.html
	 *
	 * @param array{
	 *     index?: string, // The index in which the document resides.
	 *     ids?: string|array<string>, // A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
	 *     term_statistics?: bool, // Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     field_statistics?: bool, // Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     fields?: string|array<string>, // A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     offsets?: bool, // Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     positions?: bool, // Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     payloads?: bool, // Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     routing?: string, // Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".
	 *     realtime?: bool, // Specifies if requests are real-time as opposed to near-real-time (default: true).
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Open a point in time that can be used in subsequent searches
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/point-in-time-api.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to open point in time; use `_all` or empty string to perform the operation on all indices
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing?: string, // Specific routing value
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     keep_alive?: string, // Specific the time to live for the point in time
	 *     allow_partial_search_results?: bool, // Specify whether to tolerate shards missing when creating the point-in-time, or otherwise throw an exception. (default: false)
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

		$url = $this->addQueryString($url, $params, ['preference','routing','ignore_unavailable','expand_wildcards','keep_alive','allow_partial_search_results','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'open_point_in_time');
		return $this->sendRequest($request);
	}


	/**
	 * Returns whether the cluster is running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html
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
	 * Creates or updates a script.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-scripting.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Script ID
	 *     context?: string, // Script context
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	 * Allows to evaluate the quality of ranked search results over a set of typical search queries
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-rank-eval.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Allows to copy documents from one index to another, optionally filtering the source
	 * documents by a query, changing the destination index settings, or fetching the
	 * documents from a remote cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
	 *
	 * @param array{
	 *     refresh?: bool, // Should the affected indexes be refreshed?
	 *     timeout?: int|string, // Time each individual bulk request should wait for shards that are unavailable.
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the reindex operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     wait_for_completion?: bool, // Should the request should block until the reindex is complete.
	 *     requests_per_second?: int, // The throttle to set on this request in sub-requests per second. -1 means no throttle.
	 *     scroll?: int|string, // Control how long to keep the search context alive
	 *     slices?: int|string, // The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`.
	 *     max_docs?: int, // Maximum number of documents to process (default: all documents)
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

		$url = $this->addQueryString($url, $params, ['refresh','timeout','wait_for_active_shards','wait_for_completion','requests_per_second','scroll','slices','max_docs','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'reindex');
		return $this->sendRequest($request);
	}


	/**
	 * Changes the number of requests per second for a particular Reindex operation.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-reindex.html
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle to set on this request in floating sub-requests per second. -1 means set no throttle.
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
	 * Allows to use the Mustache language to pre-render a search definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/render-search-template-api.html
	 *
	 * @param array{
	 *     id?: string, // The id of the stored search template
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The search definition template and its params. If body is a string must be a valid JSON.
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
	 * Allows an arbitrary script to be executed and a result to be returned
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/painless/master/painless-execute-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The script to execute. If body is a string must be a valid JSON.
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
	 * Allows to retrieve a large numbers of results from a single search request.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-request-body.html#request-body-search-scroll
	 *
	 * @param array{
	 *     scroll_id?: string, // The scroll ID
	 *     scroll?: int|string, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
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
	 * Returns results matching a query.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-search.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     ccs_minimize_roundtrips?: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     explain?: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit
	 *     docvalue_fields?: string|array<string>, // A comma-separated list of fields to return as the docvalue representation of a field for each hit
	 *     from?: int, // Starting offset (default: 0)
	 *     force_synthetic_source?: bool, // Should this request force synthetic _source? Use this to test if the mapping supports synthetic _source and to get a sense of the worst case performance. Fetches with this enabled will be slower the enabling synthetic source natively in the index.
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     scroll?: int|string, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     search_type?: string, // Search operation type
	 *     size?: int, // Number of hits to return (default: 10)
	 *     sort?: string|array<string>, // A comma-separated list of <field>:<direction> pairs
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     stats?: string|array<string>, // Specific 'tag' of the request for logging and statistical purposes
	 *     suggest_field?: string, // Specify which field to use for suggestions
	 *     suggest_mode?: string, // Specify suggest mode
	 *     suggest_size?: int, // How many suggestions to return in response
	 *     suggest_text?: string, // The source text for which the suggestions should be returned
	 *     timeout?: int|string, // Explicit operation timeout
	 *     track_scores?: bool, // Whether to calculate and return scores even if they are not used for sorting
	 *     track_total_hits?: bool|int, // Indicate if the number of documents that match the query should be tracked. A number can also be specified, to accurately track the total hit count up to the number.
	 *     allow_partial_search_results?: bool, // Indicate if an error should be returned if there is a partial search failure or timeout
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     version?: bool, // Specify whether to return document version as part of a hit
	 *     seq_no_primary_term?: bool, // Specify whether to return sequence number and primary term of the last modification of each hit
	 *     request_cache?: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     batched_reduce_size?: int, // The number of shard results that should be reduced at once on the coordinating node. This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large.
	 *     max_concurrent_shard_requests?: int, // The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests
	 *     pre_filter_shard_size?: int, // A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     min_compatible_shard_node?: string, // The minimum compatible version that all shards involved in search should have for this request to be successful
	 *     include_named_queries_score?: bool, // Indicates whether hit.matched_queries should be rendered as a map that includes the name of the matched query associated with its score (true) or as an array containing the name of the matched queries (false)
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
	 * Searches a vector tile for geospatial values. Returns results as a binary Mapbox vector tile.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-vector-tile-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of data streams, indices, or aliases to search
	 *     field: string, // (REQUIRED) Field containing geospatial data to return
	 *     zoom: int, // (REQUIRED) Zoom level for the vector tile to search
	 *     x: int, // (REQUIRED) X coordinate for the vector tile to search
	 *     y: int, // (REQUIRED) Y coordinate for the vector tile to search
	 *     exact_bounds?: bool, // If false, the meta layer's feature is the bounding box of the tile. If true, the meta layer's feature is a bounding box resulting from a `geo_bounds` aggregation.
	 *     extent?: int, // Size, in pixels, of a side of the vector tile.
	 *     grid_precision?: int, // Additional zoom levels available through the aggs layer. Accepts 0-8.
	 *     grid_type?: string, // Determines the geometry type for features in the aggs layer.
	 *     size?: int, // Maximum number of features to return in the hits layer. Accepts 0-10000.
	 *     track_total_hits?: bool|int, // Indicate if the number of documents that match the query should be tracked. A number can also be specified, to accurately track the total hit count up to the number.
	 *     with_labels?: bool, // If true, the hits and aggs layers will contain additional point features with suggested label positions for the original features.
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

		$url = $this->addQueryString($url, $params, ['exact_bounds','extent','grid_precision','grid_type','size','track_total_hits','with_labels','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/vnd.mapbox-vector-tile',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'field', 'zoom', 'x', 'y'], $request, 'search_mvt');
		return $this->sendRequest($request);
	}


	/**
	 * Returns information about the indices and shards that a search request would be executed against.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-shards.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing?: string, // Specific routing value
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
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
	 * Allows to use the Mustache language to pre-render a search definition.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-template.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     scroll?: int|string, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     search_type?: string, // Search operation type
	 *     explain?: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     profile?: bool, // Specify whether to profile the query execution
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     ccs_minimize_roundtrips?: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
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
	 * The terms enum API  can be used to discover terms in the index that begin with the provided string. It is designed for low-latency look-ups used in auto-complete scenarios.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/search-terms-enum.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // field name, string which is the prefix expected in matching terms, timeout and size for max number of results. If body is a string must be a valid JSON.
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
		$this->checkRequiredParameters(['index'], $params);
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
	 * Returns information and statistics about terms in the fields of a particular document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-termvectors.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The index in which the document resides.
	 *     id?: string, // The id of the document, when not specified a doc param should be supplied.
	 *     term_statistics?: bool, // Specifies if total term frequency and document frequency should be returned.
	 *     field_statistics?: bool, // Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned.
	 *     fields?: string|array<string>, // A comma-separated list of fields to return.
	 *     offsets?: bool, // Specifies if term offsets should be returned.
	 *     positions?: bool, // Specifies if term positions should be returned.
	 *     payloads?: bool, // Specifies if term payloads should be returned.
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random).
	 *     routing?: string, // Specific routing value.
	 *     realtime?: bool, // Specifies if request is real-time as opposed to near-real-time (default: true).
	 *     version?: int, // Explicit version number for concurrency control
	 *     version_type?: string, // Specific version type
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
	 * Updates a document with a script or partial document.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Document ID
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the update operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     lang?: string, // The script language (default: painless)
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes.
	 *     retry_on_conflict?: int, // Specify how many times should the operation be retried when a conflict occurs (default: 0)
	 *     routing?: string, // Specific routing value
	 *     timeout?: int|string, // Explicit operation timeout
	 *     if_seq_no?: int, // only perform the update operation if the last operation that has changed the document has the specified sequence number
	 *     if_primary_term?: int, // only perform the update operation if the last operation that has changed the document has the specified primary term
	 *     require_alias?: bool, // When true, requires destination is an alias. Default is false
	 *     include_source_on_error?: bool, // True or false if to include the document source in the error message in case of parsing errors. Defaults to true.
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
	 * Performs an update on every document in the index without changing the source,
	 * for example to pick up a mapping change.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/docs-update-by-query.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     from?: int, // Starting offset (default: 0)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     conflicts?: string, // What to do when the update by query hits version conflicts?
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     pipeline?: string, // Ingest pipeline to set on index requests made by this action. (default: none)
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     scroll?: int|string, // Specify how long a consistent view of the index should be maintained for scrolled search
	 *     search_type?: string, // Search operation type
	 *     search_timeout?: int|string, // Explicit timeout for each search request. Defaults to no timeout.
	 *     max_docs?: int, // Maximum number of documents to process (default: all documents)
	 *     sort?: string|array<string>, // A comma-separated list of <field>:<direction> pairs
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
	 *     stats?: string|array<string>, // Specific 'tag' of the request for logging and statistical purposes
	 *     version?: bool, // Specify whether to return document version as part of a hit
	 *     version_type?: bool, // Should the document increment the version number (internal) on hit or not (reindex)
	 *     request_cache?: bool, // Specify if request cache should be used for this request or not, defaults to index level setting
	 *     refresh?: bool, // Should the affected indexes be refreshed?
	 *     timeout?: int|string, // Time each individual bulk request should wait for shards that are unavailable.
	 *     wait_for_active_shards?: string, // Sets the number of shard copies that must be active before proceeding with the update by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     scroll_size?: int, // Size on the scroll request powering the update by query
	 *     wait_for_completion?: bool, // Should the request should block until the update by query operation is complete.
	 *     requests_per_second?: int, // The throttle to set on this request in sub-requests per second. -1 means no throttle.
	 *     slices?: int|string, // The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`.
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
	 * Changes the number of requests per second for a particular Update By Query operation.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-update-by-query.html
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) The task id to rethrottle
	 *     requests_per_second?: int, // The throttle to set on this request in floating sub-requests per second. -1 means set no throttle.
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
