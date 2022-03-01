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
class Autoscaling extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an autoscaling policy. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/autoscaling-delete-autoscaling-policy.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) the name of the autoscaling policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteAutoscalingPolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_autoscaling/policy/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets the current autoscaling capacity based on the configured autoscaling policy. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/autoscaling-get-autoscaling-capacity.html
	 */
	public function getAutoscalingCapacity(array $params = [])
	{
		$url = "/_autoscaling/capacity";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves an autoscaling policy. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/autoscaling-get-autoscaling-policy.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) the name of the autoscaling policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getAutoscalingPolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_autoscaling/policy/{$params['name']}";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a new autoscaling policy. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/autoscaling-put-autoscaling-policy.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) the name of the autoscaling policy
	 *     body: array, // (REQUIRED) the specification of the autoscaling policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putAutoscalingPolicy(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = "/_autoscaling/policy/{$params['name']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
