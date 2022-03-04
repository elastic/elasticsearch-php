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

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Fleet extends AbstractEndpoint
{
	use EndpointTrait;

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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function globalCheckpoints(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_fleet/global_checkpoints';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_advance','wait_for_index','checkpoints','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Multi Search API where the search will only be executed after specified checkpoints are available due to a refresh. This API is designed for internal use by the fleet server project.
	 *
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, //  The index name to use as the default
	 *     body: array, // (REQUIRED) The request definitions (metadata-fleet search request definition pairs), separated by newlines
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function msearch(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . urlencode((string) $params['index']) . '/_fleet/_fleet_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_fleet/_fleet_msearch';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/x-ndjson',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 *     body: array, //  The search definition using the Query DSL
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function search(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_fleet/_fleet_search';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['wait_for_checkpoints','wait_for_checkpoints_timeout','allow_partial_search_results']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
