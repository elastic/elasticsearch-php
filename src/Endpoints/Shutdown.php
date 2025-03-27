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
class Shutdown extends AbstractEndpoint
{
	/**
	 * Removes a node from the shutdown list. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id: string, // (REQUIRED) The node id of node to be removed from the shutdown state
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
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
	public function deleteNode(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['node_id'], $params);
		$url = '/_nodes/' . $this->encode($params['node_id']) . '/shutdown';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'shutdown.delete_node');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieve status of a node or nodes that are currently marked as shutting down. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id?: string, // Which node for which to retrieve the shutdown status
	 *     master_timeout?: int|string, // Timeout for processing on master node
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
	public function getNode(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($params['node_id']) . '/shutdown';
			$method = 'GET';
		} else {
			$url = '/_nodes/shutdown';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'shutdown.get_node');
		return $this->client->sendRequest($request);
	}


	/**
	 * Adds a node to be shut down. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id: string, // (REQUIRED) The node id of node to be shut down
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The shutdown type definition to register. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putNode(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['node_id','body'], $params);
		$url = '/_nodes/' . $this->encode($params['node_id']) . '/shutdown';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'shutdown.put_node');
		return $this->client->sendRequest($request);
	}
}
