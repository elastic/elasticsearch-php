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
class Tasks extends AbstractEndpoint
{
	use EndpointTrait;

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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function cancel(array $params = [])
	{
		if (isset($params['task_id'])) {
			$url = '/_tasks/' . urlencode((string) $params['task_id']) . '/_cancel';
			$method = 'POST';
		} else {
			$url = '/_tasks/_cancel';
			$method = 'POST';
		}
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function get(array $params = [])
	{
		$this->checkRequiredParameters(['task_id'], $params);
		$url = '/_tasks/' . urlencode((string) $params['task_id']);
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function list(array $params = [])
	{
		$url = '/_tasks';
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
