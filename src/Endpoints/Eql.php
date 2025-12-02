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
class Eql extends AbstractEndpoint
{
	/**
	 * Delete an async EQL search
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-eql-delete
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
		$url = '/_eql/search/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'eql.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get async EQL search results
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-eql-get
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     wait_for_completion_timeout?: int|string, // Specify the time that the request should block waiting for the final response
	 *     keep_alive?: int|string, // Update the time interval in which the results (partial or final) for this search will be available
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
		$url = '/_eql/search/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_alive','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'eql.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the async EQL status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-eql-get-status
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
	public function getStatus(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_eql/search/status/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'eql.get_status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get EQL search results
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-eql-search
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of index names to scope the operation
	 *     wait_for_completion_timeout?: int|string, // Specify the time that the request should block waiting for the final response
	 *     keep_on_completion?: bool, // Control whether the response should be stored in the cluster if it completed within the provided [wait_for_completion] time (default: false)
	 *     keep_alive?: int|string, // Update the time interval in which the results (partial or final) for this search will be available
	 *     allow_partial_search_results?: bool, // Control whether the query should keep running in case of shard failures, and return partial results
	 *     allow_partial_sequence_results?: bool, // Control whether a sequence query should return partial results or no results at all in case of shard failures. This option has effect only if [allow_partial_search_results] is true.
	 *     ccs_minimize_roundtrips?: bool, // Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     project_routing?: string, // A Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Eql request body. Use the `query` to limit the query scope.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function search(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_eql/search';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_on_completion','keep_alive','allow_partial_search_results','allow_partial_sequence_results','ccs_minimize_roundtrips','ignore_unavailable','allow_no_indices','expand_wildcards','project_routing','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'eql.search');
		return $this->client->sendRequest($request);
	}
}
