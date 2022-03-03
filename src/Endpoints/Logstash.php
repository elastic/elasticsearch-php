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
class Logstash extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes Logstash Pipelines used by Central Management
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/logstash-api-delete-pipeline.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the Pipeline
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deletePipeline(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_logstash/pipeline/' . urlencode((string) $params['id']);
		$method = 'DELETE';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves Logstash Pipelines used by Central Management
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/logstash-api-get-pipeline.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) A comma-separated list of Pipeline IDs
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getPipeline(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_logstash/pipeline/' . urlencode((string) $params['id']);
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Adds and updates Logstash Pipelines used for Central Management
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/logstash-api-put-pipeline.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the Pipeline
	 *     body: array, // (REQUIRED) The Pipeline to add or update
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putPipeline(array $params = [])
	{
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_logstash/pipeline/' . urlencode((string) $params['id']);
		$method = 'PUT';

		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
