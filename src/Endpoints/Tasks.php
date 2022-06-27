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
class Tasks extends AbstractEndpoint
{
	/**
	 * Cancels a task, if it can be cancelled through an API.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     task_id: string, //  Cancel the task with specified task id (node_id:task_number)
	 *     nodes: list, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     actions: list, // A comma-separated list of actions that should be cancelled. Leave empty to cancel all.
	 *     parent_task_id: string, // Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to cancel all.
	 *     wait_for_completion: boolean, // Should the request block until the cancellation of the task and its descendant tasks is completed. Defaults to false
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
	public function cancel(array $params = [])
	{
		if (isset($params['task_id'])) {
			$url = '/_tasks/' . $this->encode($params['task_id']) . '/_cancel';
			$method = 'POST';
		} else {
			$url = '/_tasks/_cancel';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['nodes','actions','parent_task_id','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about a task.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) Return the task with specified id (node_id:task_number)
	 *     wait_for_completion: boolean, // Wait for the matching tasks to complete (default: false)
	 *     timeout: time, // Explicit operation timeout
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
		$this->checkRequiredParameters(['task_id'], $params);
		$url = '/_tasks/' . $this->encode($params['task_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_completion','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns a list of tasks.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     nodes: list, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     actions: list, // A comma-separated list of actions that should be returned. Leave empty to return all.
	 *     detailed: boolean, // Return detailed task information (default: false)
	 *     parent_task_id: string, // Return tasks with specified parent task id (node_id:task_number). Set to -1 to return all.
	 *     wait_for_completion: boolean, // Wait for the matching tasks to complete (default: false)
	 *     group_by: enum, // Group tasks by nodes or parent/child relationships
	 *     timeout: time, // Explicit operation timeout
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
		$url = '/_tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['nodes','actions','detailed','parent_task_id','wait_for_completion','group_by','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
