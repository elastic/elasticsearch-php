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
class Enrich extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an existing enrich policy and its enrich index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-enrich-policy-api.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the enrich policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deletePolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_enrich/policy/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates the enrich index for an existing enrich policy.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/execute-enrich-policy-api.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the enrich policy
	 *     wait_for_completion: boolean, // Should the request should block until the execution is complete.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function executePolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_enrich/policy/{$params['name']}/_execute";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets information about an enrich policy.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-enrich-policy-api.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of enrich policy names
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getPolicy(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_enrich/policy/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_enrich/policy";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a new enrich policy.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-enrich-policy-api.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the enrich policy
	 *     body: array, // (REQUIRED) The enrich policy to register
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putPolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = "/_enrich/policy/{$params['name']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets enrich coordinator statistics and information about enrich policies that are currently executing.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/enrich-stats-api.html
	 */
	public function stats(array $params = [])
	{
		$url = "/_enrich/_stats";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
