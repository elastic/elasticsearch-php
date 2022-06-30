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
class Fleet extends AbstractEndpoint
{
	/**
	 * Returns the current global checkpoints for an index. This API is design for internal use by the fleet server project.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-global-checkpoints.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index.
	 *     wait_for_advance: boolean, // Whether to wait for the global checkpoint to advance past the specified current checkpoints
	 *     wait_for_index: boolean, // Whether to wait for the target index to exist and all primary shards be active
	 *     checkpoints: list, // Comma separated list of checkpoints
	 *     timeout: time, // Timeout to wait for global checkpoint to advance
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function globalCheckpoints(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_fleet/global_checkpoints';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_advance','wait_for_index','checkpoints','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Multi Search API where the search will only be executed after specified checkpoints are available due to a refresh. This API is designed for internal use by the fleet server project.
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, //  The index name to use as the default
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The request definitions (metadata-fleet search request definition pairs), separated by newlines
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function msearch(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_fleet/_fleet_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_fleet/_fleet_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Search API where the search will only be executed after specified checkpoints are available due to a refresh. This API is designed for internal use by the fleet server project.
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The index name to search.
	 *     wait_for_checkpoints: list, // Comma separated list of checkpoints, one per shard
	 *     wait_for_checkpoints_timeout: time, // Explicit wait_for_checkpoints timeout
	 *     allow_partial_search_results: boolean, // Indicate if an error should be returned if there is a partial search failure or timeout
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The search definition using the Query DSL
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function search(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_fleet/_fleet_search';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['wait_for_checkpoints','wait_for_checkpoints_timeout','allow_partial_search_results','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
