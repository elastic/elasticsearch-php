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
class Eql extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an async EQL search by ID. If the search is still running, the search request will be cancelled. Otherwise, the saved search results are deleted.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function delete(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_eql/search/' . urlencode((string) $params['id']);
		$method = 'DELETE';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns async results from previously executed Event Query Language (EQL) search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     wait_for_completion_timeout: time, // Specify the time that the request should block waiting for the final response
	 *     keep_alive: time, // Update the time interval in which the results (partial or final) for this search will be available
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function get(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_eql/search/' . urlencode((string) $params['id']);
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns the status of a previously submitted async or stored Event Query Language (EQL) search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getStatus(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_eql/search/status/' . urlencode((string) $params['id']);
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns results matching a query expressed in Event Query Language (EQL)
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/eql-search-api.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to scope the operation
	 *     wait_for_completion_timeout: time, // Specify the time that the request should block waiting for the final response
	 *     keep_on_completion: boolean, // Control whether the response should be stored in the cluster if it completed within the provided [wait_for_completion] time (default: false)
	 *     keep_alive: time, // Update the time interval in which the results (partial or final) for this search will be available
	 *     body: array, // (REQUIRED) Eql request body. Use the `query` to limit the query scope.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function search(array $params = [])
	{
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_eql/search';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
