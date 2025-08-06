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
class Streams extends AbstractEndpoint
{
	/**
	 * Disable the Logs Streams feature for this cluster
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-logs-disable.html
	 *
	 * @param array{
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
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
	public function logsDisable(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_streams/logs/_disable';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json,text/plain',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'streams.logs_disable');
		return $this->client->sendRequest($request);
	}


	/**
	 * Enable the Logs Streams feature for this cluster
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-logs-enable.html
	 *
	 * @param array{
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error.
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
	public function logsEnable(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_streams/logs/_enable';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json,text/plain',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'streams.logs_enable');
		return $this->client->sendRequest($request);
	}


	/**
	 * Return the current status of the streams feature for each streams type
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/streams-status.html
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
	public function status(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_streams/status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'streams.status');
		return $this->client->sendRequest($request);
	}
}
