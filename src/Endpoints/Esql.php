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
class Esql extends AbstractEndpoint
{
	/**
	 * Executes an ESQL request asynchronously
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/esql-async-query-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     delimiter: string, // The character to use between values within a CSV row. Only valid for the csv format.
	 *     drop_null_columns: boolean, // Should entirely null columns be removed from the results? Their name and type will be returning in a new `all_columns` section.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) Use the `query` element to start a query. Use `columnar` to format the answer.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function asyncQuery(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_query/async';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['format','delimiter','drop_null_columns','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Retrieves the results of a previously submitted async query request given its ID.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/esql-async-query-get-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async query ID
	 *     wait_for_completion_timeout: time, // Specify the time that the request should block waiting for the final response
	 *     keep_alive: time, // Specify the time interval in which the results (partial or final) for this search will be available
	 *     drop_null_columns: boolean, // Should entirely null columns be removed from the results? Their name and type will be returning in a new `all_columns` section.
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
	public function asyncQueryGet(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_query/async/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_completion_timeout','keep_alive','drop_null_columns','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Executes an ESQL request
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/esql-query-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     delimiter: string, // The character to use between values within a CSV row. Only valid for the csv format.
	 *     drop_null_columns: boolean, // Should entirely null columns be removed from the results? Their name and type will be returning in a new `all_columns` section.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) Use the `query` element to start a query. Use `columnar` to format the answer.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function query(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_query';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['format','delimiter','drop_null_columns','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
