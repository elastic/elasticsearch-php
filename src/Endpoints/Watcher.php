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
class Watcher extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Acknowledges a watch, manually throttling the execution of the watch's actions.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-ack-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 *     action_id: list, //  A comma-separated list of the action ids to be acked
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function ackWatch(array $params = [])
	{
		$this->checkRequiredParameters(['watch_id'], $params);
		if (isset($params['action_id'])) {
			$url = '/_watcher/watch/' . urlencode((string) $params['watch_id']) . '/_ack/' . urlencode((string) $params['action_id']);
			$method = 'PUT';
		} else {
			$url = '/_watcher/watch/' . urlencode((string) $params['watch_id']) . '/_ack';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Activates a currently inactive watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-activate-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function activateWatch(array $params = [])
	{
		$this->checkRequiredParameters(['watch_id'], $params);
		$url = '/_watcher/watch/' . urlencode((string) $params['watch_id']) . '/_activate';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Deactivates a currently active watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-deactivate-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deactivateWatch(array $params = [])
	{
		$this->checkRequiredParameters(['watch_id'], $params);
		$url = '/_watcher/watch/' . urlencode((string) $params['watch_id']) . '/_deactivate';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Removes a watch from Watcher.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-delete-watch.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteWatch(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_watcher/watch/' . urlencode((string) $params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Forces the execution of a stored watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-execute-watch.html
	 *
	 * @param array{
	 *     id: string, //  Watch ID
	 *     debug: boolean, // indicates whether the watch should execute in debug mode
	 *     body: array, //  Execution control
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function executeWatch(array $params = [])
	{
		if (isset($params['id'])) {
			$url = '/_watcher/watch/' . urlencode((string) $params['id']) . '/_execute';
			$method = 'PUT';
		} else {
			$url = '/_watcher/watch/_execute';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['debug']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves a watch by its ID.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-get-watch.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getWatch(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_watcher/watch/' . urlencode((string) $params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Creates a new watch, or updates an existing one.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-put-watch.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 *     active: boolean, // Specify whether the watch is in/active by default
	 *     version: number, // Explicit version number for concurrency control
	 *     if_seq_no: number, // only update the watch if the last operation that has changed the watch has the specified sequence number
	 *     if_primary_term: number, // only update the watch if the last operation that has changed the watch has the specified primary term
	 *     body: array, //  The watch
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putWatch(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_watcher/watch/' . urlencode((string) $params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['active','version','if_seq_no','if_primary_term']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves stored watches.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-query-watches.html
	 *
	 * @param array{
	 *     body: array, //  From, size, query, sort and search_after
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function queryWatches(array $params = [])
	{
		$url = '/_watcher/_query/watches';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Starts Watcher if it is not already running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-start.html
	 */
	public function start(array $params = [])
	{
		$url = '/_watcher/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves the current Watcher metrics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stats.html
	 *
	 * @param array{
	 *     metric: list, //  Controls what additional stat metrics should be include in the response
	 *     emit_stacktraces: boolean, // Emits stack traces of currently running watches
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stats(array $params = [])
	{
		if (isset($params['metric'])) {
			$url = '/_watcher/stats/' . urlencode((string) $params['metric']);
			$method = 'GET';
		} else {
			$url = '/_watcher/stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['emit_stacktraces']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Stops Watcher if it is running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stop.html
	 */
	public function stop(array $params = [])
	{
		$url = '/_watcher/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
