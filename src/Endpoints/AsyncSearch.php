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
	 * Delete an async search
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-async-search-submit
	 * @group serverless
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
	 * Get async search results
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-async-search-submit
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     wait_for_completion_timeout?: int|string, // Specifies to wait for the search to be completed up until the provided timeout. Final results will be returned if available before the timeout expires, otherwise the currently available results will be returned once the timeout expires. By default no timeout is set meaning that the currently available results will be returned without any additional wait.
	 *     keep_alive?: int|string, // The length of time that the async search should be available in the cluster. When not specified, the `keep_alive` set with the corresponding submit async request will be used. Otherwise, it is possible to override the value and extend the validity of the request. When this period expires, the search, if still running, is cancelled. If the search is completed, its saved results are deleted.
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
	 * Get the async search status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-async-search-submit
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     keep_alive?: int|string, // The length of time that the async search needs to be available. Ongoing async searches and any saved search results are deleted after this period. (DEFAULT: 5d)
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
	 * Run an async search
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-async-search-submit
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     wait_for_completion_timeout?: int|string, // Blocks and waits until the search is completed up to a certain timeout. When the async search completes within the timeout, the response won’t include the ID as the results are not stored in the cluster. (DEFAULT: 1s)
	 *     keep_on_completion?: bool, // If `true`, results are stored for later retrieval when the search completes within the `wait_for_completion_timeout`.
	 *     keep_alive?: int|string, // Specifies how long the async search needs to be available. Ongoing async searches and any saved search results are deleted after this period. (DEFAULT: 5d)
	 *     batched_reduce_size?: int, // Affects how often partial results become available, which happens whenever shard results are reduced. A partial reduction is performed every time the coordinating node has received a certain number of new shard responses (5 by default). (DEFAULT: 5)
	 *     request_cache?: bool, // Specify if request cache should be used for this request or not, defaults to true (DEFAULT: 1)
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed
	 *     ccs_minimize_roundtrips?: bool, // The default value is the only supported value.
	 *     default_operator?: string, // The default operator for query string query (AND or OR) (DEFAULT: or)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     explain?: bool, // Specify whether to return detailed information about score computation as part of a hit
	 *     stored_fields?: string|array<string>, // A comma-separated list of stored fields to return as part of a hit
	 *     docvalue_fields?: string|array<string>, // A comma-separated list of fields to return as the docvalue representation of a field for each hit
	 *     from?: int, // Starting offset
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both (DEFAULT: open)
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     preference?: string, // Specify the node or shard the operation should be performed on (DEFAULT: random)
	 *     project_routing?: string, // A Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
	 *     rest_total_hits_as_int?: bool, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     q?: string, // Query in the Lucene query string syntax
	 *     routing?: string|array<string>, // A comma-separated list of specific routing values
	 *     search_type?: string, // Search operation type
	 *     size?: int, // Number of hits to return (DEFAULT: 10)
	 *     sort?: string|array<string>, // A comma-separated list of <field>:<direction> pairs
	 *     _source?: string|array<string>, // True or false to return the _source field or not, or a list of fields to return
	 *     _source_excludes?: string|array<string>, // A list of fields to exclude from the returned _source field
	 *     _source_includes?: string|array<string>, // A list of fields to extract and return from the _source field
	 *     terminate_after?: int, // The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early
	 *     stats?: string|array<string>, // Specific 'tag' of the request for logging and statistical purposes
	 *     suggest_field?: string, // Specifies which field to use for suggestions.
	 *     suggest_mode?: string, // Specify suggest mode (DEFAULT: missing)
	 *     suggest_size?: int, // How many suggestions to return in response
	 *     suggest_text?: string, // The source text for which the suggestions should be returned.
	 *     timeout?: int|string, // Explicit operation timeout
	 *     track_scores?: bool, // Whether to calculate and return scores even if they are not used for sorting
	 *     track_total_hits?: bool|int, // Indicate if the number of documents that match the query should be tracked. A number can also be specified, to accurately track the total hit count up to the number.
	 *     allow_partial_search_results?: bool, // Indicate if an error should be returned if there is a partial search failure or timeout (DEFAULT: 1)
	 *     typed_keys?: bool, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     version?: bool, // Specify whether to return document version as part of a hit
	 *     seq_no_primary_term?: bool, // Specify whether to return sequence number and primary term of the last modification of each hit
	 *     max_concurrent_shard_requests?: int, // The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (DEFAULT: 5)
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
		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_on_completion','keep_alive','batched_reduce_size','request_cache','analyzer','analyze_wildcard','ccs_minimize_roundtrips','default_operator','df','explain','stored_fields','docvalue_fields','from','ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','lenient','preference','project_routing','rest_total_hits_as_int','q','routing','search_type','size','sort','_source','_source_excludes','_source_includes','terminate_after','stats','suggest_field','suggest_mode','suggest_size','suggest_text','timeout','track_scores','track_total_hits','allow_partial_search_results','typed_keys','version','seq_no_primary_term','max_concurrent_shard_requests','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'async_search.submit');
		return $this->client->sendRequest($request);
	}
}
