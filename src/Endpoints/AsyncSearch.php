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

namespace Elastic\Elasticsearch\Endpoints;

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class AsyncSearch extends AbstractEndpoint
{
	/**
	 * Deletes an async search by ID. If the search is still running, the search request will be cancelled. Otherwise, the saved search results are deleted.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/async-search.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
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
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_async_search/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'async_search.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves the results of a previously submitted async search request given its ID.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/async-search.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     wait_for_completion_timeout?: int|string, // Specify the time that the request should block waiting for the final response
	 *     keep_alive?: int|string, // Specify the time interval in which the results (partial or final) for this search will be available
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
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
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_async_search/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_alive','typed_keys','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'async_search.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves the status of a previously submitted async search request given its ID.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/async-search.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     keep_alive?: int|string, // Specify the time interval in which the results (partial or final) for this search will be available
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
	public function status(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_async_search/status/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['keep_alive','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'async_search.status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Executes a search request asynchronously.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/async-search.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     wait_for_completion_timeout?: int|string, // Specify the time that the request should block waiting for the final response
	 *     keep_on_completion?: bool, // Control whether the response should be stored in the cluster if it completed within the provided [wait_for_completion] time (default: false)
	 *     keep_alive?: int|string, // Update the time interval in which the results (partial or final) for this search will be available
	 *     batched_reduce_size?: int, // The number of shard results that should be reduced at once on the coordinating node. This value should be used as the granularity at which progress results will be made available.
	 *     request_cache?: bool, // Specify if request cache should be used for this request or not, defaults to true
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     ccs_minimize_roundtrips?: bool, // When doing a cross-cluster search, setting it to true may improve overall search latency, particularly when searching clusters with a large number of shards. However, when set to true, the progress of searches on the remote clusters will not be received until the search finishes on all clusters.
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     explain?: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit
	 *     docvalue_fields?: string|array<string>, // A comma-separated list of fields to return as the docvalue representation of a field for each hit
	 *     from?: int, // Starting offset (default: 0)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     preference?: string, // Specify the node or shard the operation should be performed on (default: random)
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
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
	 *     max_concurrent_shard_requests?: int, // The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests
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
	public function submit(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_async_search';
			$method = 'POST';
		} else {
			$url = '/_async_search';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_on_completion','keep_alive','batched_reduce_size','request_cache','analyzer','analyze_wildcard','ccs_minimize_roundtrips','default_operator','df','explain','stored_fields','docvalue_fields','from','ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','lenient','preference','rest_total_hits_as_int','q','routing','search_type','size','sort','_source','_source_excludes','_source_includes','terminate_after','stats','suggest_field','suggest_mode','suggest_size','suggest_text','timeout','track_scores','track_total_hits','allow_partial_search_results','typed_keys','version','seq_no_primary_term','max_concurrent_shard_requests','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'async_search.submit');
		return $this->client->sendRequest($request);
	}
}
