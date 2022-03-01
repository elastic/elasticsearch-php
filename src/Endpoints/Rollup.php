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
class Rollup extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an existing rollup job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-delete-job.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the job to delete
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteJob(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_rollup/job/{$params['id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves the configuration, stats, and status of rollup jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-get-job.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, //  The ID of the job(s) to fetch. Accepts glob patterns, or left blank for all jobs
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getJobs(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_rollup/job/{$params['id']}";
			$method = 'GET';
		} else {
			$url = "/_rollup/job/";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns the capabilities of any rollup jobs that have been configured for a specific index or index pattern.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-get-rollup-caps.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, //  The ID of the index to check rollup capabilities on, or left blank for all jobs
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRollupCaps(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_rollup/data/{$params['id']}";
			$method = 'GET';
		} else {
			$url = "/_rollup/data/";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns the rollup capabilities of all jobs inside of a rollup index (e.g. the index where rollup data is stored).
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-get-rollup-index-caps.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The rollup index or index pattern to obtain rollup capabilities from.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRollupIndexCaps(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_rollup/data";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a rollup job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-put-job.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the job to create
	 *     body: array, // (REQUIRED) The job configuration
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putJob(array $params = [])
	{
		$this->checkRequiredParameters(['id','body'], $params);
		$url = "/_rollup/job/{$params['id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Rollup an index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/xpack-rollup.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The index to roll up
	 *     rollup_index: string, // (REQUIRED) The name of the rollup index to create
	 *     body: array, // (REQUIRED) The rollup configuration
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function rollup(array $params = [])
	{
		$this->checkRequiredParameters(['index','rollup_index','body'], $params);
		$url = "/{$params['index']}/_rollup/{$params['rollup_index']}";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Enables searching rolled-up data using the standard query DSL.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-search.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) The indices or index-pattern(s) (containing rollup or regular data) that should be searched
	 *     typed_keys: boolean, // Specify whether aggregation and suggester names should be prefixed by their respective types in the response
	 *     rest_total_hits_as_int: boolean, // Indicates whether hits.total should be rendered as an integer or an object in the rest search response
	 *     body: array, // (REQUIRED) The search request body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function rollupSearch(array $params = [])
	{
		$this->checkRequiredParameters(['index','body'], $params);
		$url = "/{$params['index']}/_rollup_search";
		$method = empty($params['body']) ? 'GET' : 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Starts an existing, stopped rollup job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-start-job.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the job to start
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function startJob(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_rollup/job/{$params['id']}/_start";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Stops an existing, started rollup job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/rollup-stop-job.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the job to stop
	 *     wait_for_completion: boolean, // True if the API should block until the job has fully stopped, false if should be executed async. Defaults to false.
	 *     timeout: time, // Block for (at maximum) the specified duration while waiting for the job to stop.  Defaults to 30s.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stopJob(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_rollup/job/{$params['id']}/_stop";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
