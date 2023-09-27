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
class QueryRuleset extends AbstractEndpoint
{
	/**
	 * Deletes a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-query-ruleset.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset to delete
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
	public function delete(array $params = [])
	{
		$this->checkRequiredParameters(['ruleset_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns the details about a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-query-ruleset.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset
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
	public function get(array $params = [])
	{
		$this->checkRequiredParameters(['ruleset_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Lists query rulesets.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-query-rulesets.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     from: int, // Starting offset (default: 0)
	 *     size: int, // specifies a max number of results to get (default: 100)
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function list(array $params = [])
	{
		$url = '/_query_rules';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates or updates a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-query-ruleset.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the ruleset to be created or updated.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The query ruleset configuration, including `rules`
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function put(array $params = [])
	{
		$this->checkRequiredParameters(['ruleset_id','body'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
