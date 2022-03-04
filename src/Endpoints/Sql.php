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
class Sql extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Clears the SQL cursor
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/clear-sql-cursor-api.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) Specify the cursor value in the `cursor` element to clean the cursor.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCursor(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_sql/close';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Deletes an async SQL search or a stored synchronous SQL search. If the search is still running, the API cancels it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-async-sql-search-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteAsync(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_sql/async/delete/' . urlencode((string) $params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns the current status and available results for an async SQL search or stored synchronous SQL search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-async-sql-search-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 *     delimiter: string, // Separator for CSV results
	 *     format: string, // Short version of the Accept header, e.g. json, yaml
	 *     keep_alive: time, // Retention period for the search and its results
	 *     wait_for_completion_timeout: time, // Duration to wait for complete results
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getAsync(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_sql/async/' . urlencode((string) $params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['delimiter','format','keep_alive','wait_for_completion_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns the current status of an async SQL search or a stored synchronous SQL search
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-async-sql-search-status-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async search ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getAsyncStatus(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_sql/async/status/' . urlencode((string) $params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Executes a SQL request
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/sql-search-api.html
	 *
	 * @param array{
	 *     format: string, // a short version of the Accept header, e.g. json, yaml
	 *     body: array, // (REQUIRED) Use the `query` element to start a query. Use the `cursor` element to continue a query.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function query(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_sql';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['format']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Translates SQL into Elasticsearch queries
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/sql-translate-api.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) Specify the query in the `query` element.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function translate(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_sql/translate';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
