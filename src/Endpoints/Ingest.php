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
class Ingest extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Pipeline ID
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deletePipeline(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_ingest/pipeline/{$params['id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns statistical information about geoip databases
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/geoip-stats-api.html
	 */
	public function geoIpStats(array $params = [])
	{
		$url = "/_ingest/geoip/stats";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, //  Comma separated list of pipeline ids. Wildcards supported
	 *     summary: boolean, // Return pipelines without their definitions (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getPipeline(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_ingest/pipeline/{$params['id']}";
			$method = 'GET';
		} else {
			$url = "/_ingest/pipeline";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns a list of the built-in patterns.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/grok-processor.html#grok-processor-rest-get
	 */
	public function processorGrok(array $params = [])
	{
		$url = "/_ingest/processor/grok";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates or updates a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Pipeline ID
	 *     if_version: int, // Required version for optimistic concurrency control for pipeline updates
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     body: array, // (REQUIRED) The ingest definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putPipeline(array $params = [])
	{
		$this->checkRequiredParameters(['id','body'], $params);
		$url = "/_ingest/pipeline/{$params['id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Allows to simulate a pipeline with example documents.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/simulate-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, //  Pipeline ID
	 *     verbose: boolean, // Verbose mode. Display data output for each processor in executed pipeline
	 *     body: array, // (REQUIRED) The simulate definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function simulate(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['id'])) {
			$url = "/_ingest/pipeline/{$params['id']}/_simulate";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ingest/pipeline/_simulate";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
