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
class Slm extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an existing snapshot lifecycle policy.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-delete-policy.html
	 *
	 * @param array{
	 *     policy_id: string, // (REQUIRED) The id of the snapshot lifecycle policy to remove
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['policy_id'], $params);
		$url = '/_slm/policy/' . urlencode((string) $params['policy_id']);
		$method = 'DELETE';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Immediately creates a snapshot according to the lifecycle policy, without waiting for the scheduled time.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-execute-lifecycle.html
	 *
	 * @param array{
	 *     policy_id: string, // (REQUIRED) The id of the snapshot lifecycle policy to be executed
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function executeLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['policy_id'], $params);
		$url = '/_slm/policy/' . urlencode((string) $params['policy_id']) . '/_execute';
		$method = 'PUT';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Deletes any snapshots that are expired according to the policy's retention rules.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-execute-retention.html
	 */
	public function executeRetention(array $params = [])
	{
		$url = '/_slm/_execute_retention';
		$method = 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves one or more snapshot lifecycle policy definitions and information about the latest snapshot attempts.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-get-policy.html
	 *
	 * @param array{
	 *     policy_id: list, //  Comma-separated list of snapshot lifecycle policies to retrieve
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getLifecycle(array $params = [])
	{
		if (isset($params['policy_id'])) {
			$url = '/_slm/policy/' . urlencode((string) $params['policy_id']);
			$method = 'GET';
		} else {
			$url = '/_slm/policy';
			$method = 'GET';
		}
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns global and policy-level statistics about actions taken by snapshot lifecycle management.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/slm-api-get-stats.html
	 */
	public function getStats(array $params = [])
	{
		$url = '/_slm/stats';
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves the status of snapshot lifecycle management (SLM).
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-get-status.html
	 */
	public function getStatus(array $params = [])
	{
		$url = '/_slm/status';
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Creates or updates a snapshot lifecycle policy.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-put-policy.html
	 *
	 * @param array{
	 *     policy_id: string, // (REQUIRED) The id of the snapshot lifecycle policy
	 *     body: array, //  The snapshot lifecycle policy definition to register
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['policy_id'], $params);
		$url = '/_slm/policy/' . urlencode((string) $params['policy_id']);
		$method = 'PUT';

		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Turns on snapshot lifecycle management (SLM).
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-start.html
	 */
	public function start(array $params = [])
	{
		$url = '/_slm/start';
		$method = 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Turns off snapshot lifecycle management (SLM).
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-stop.html
	 */
	public function stop(array $params = [])
	{
		$url = '/_slm/stop';
		$method = 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
