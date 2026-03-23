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
	 * Cancel a task
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     task_id?: string, // Cancel the task with specified task id (node_id:task_number)
	 *     nodes?: string|array<string>, // A comma-separated list of node IDs or names that is used to limit the request.
	 *     actions?: string|array<string>, // A comma-separated list or wildcard expression of actions that is used to limit the request.
	 *     parent_task_id?: string, // A parent task ID that is used to limit the tasks.
	 *     wait_for_completion?: bool, // If true, the request blocks until all found tasks are complete.
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
	public function cancel(?array $params = null)
	{
		$params = $params ?? [];
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
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_id'], $request, 'tasks.cancel');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get task information
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/tasks.html
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     task_id: string, // (REQUIRED) Return the task with specified id (node_id:task_number)
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the task has completed.
	 *     timeout?: int|string, // The period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
		$this->checkRequiredParameters(['task_id'], $params);
		$url = '/_tasks/' . $this->encode($params['task_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['wait_for_completion','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_id'], $request, 'tasks.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get all tasks
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/tasks.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     nodes?: string|array<string>, // A comma-separated list of node IDs or names that is used to limit the returned information.
	 *     actions?: string|array<string>, // A comma-separated list or wildcard expression of actions used to limit the request. For example, you can use `cluser:*` to retrieve all cluster-related tasks.
	 *     detailed?: bool, // If `true`, the response includes detailed information about the running tasks. This information is useful to distinguish tasks from each other but is more costly to run.
	 *     parent_task_id?: string, // A parent task identifier that is used to limit returned information. To return all tasks, omit this parameter or use a value of `-1`. If the parent task is not found, the API does not return a 404 response code.
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the operation is complete.
	 *     group_by?: string, // A key that is used to group tasks in the response. The task lists can be grouped either by nodes or by parent tasks. (DEFAULT: nodes)
	 *     timeout?: int|string, // The period to wait for each node to respond. If a node does not respond before its timeout expires, the response does not include its information. However, timed out nodes are included in the `node_failures` property. (DEFAULT: 30s)
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
	public function list(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['nodes','actions','detailed','parent_task_id','wait_for_completion','group_by','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'tasks.list');
		return $this->client->sendRequest($request);
	}
}
