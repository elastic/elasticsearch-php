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
class Watcher extends AbstractEndpoint
{
	/**
	 * Acknowledge a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-ack-watch
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 *     action_id?: string|array<string>, // A comma-separated list of the action ids to be acked
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
	public function ackWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['watch_id'], $params);
		if (isset($params['action_id'])) {
			$url = '/_watcher/watch/' . $this->encode($params['watch_id']) . '/_ack/' . $this->encode($this->convertValue($params['action_id']));
			$method = 'PUT';
		} else {
			$url = '/_watcher/watch/' . $this->encode($params['watch_id']) . '/_ack';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['watch_id', 'action_id'], $request, 'watcher.ack_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Activate a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-activate-watch
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
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
	public function activateWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['watch_id'], $params);
		$url = '/_watcher/watch/' . $this->encode($params['watch_id']) . '/_activate';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['watch_id'], $request, 'watcher.activate_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deactivate a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-deactivate-watch
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
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
	public function deactivateWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['watch_id'], $params);
		$url = '/_watcher/watch/' . $this->encode($params['watch_id']) . '/_deactivate';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['watch_id'], $request, 'watcher.deactivate_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-delete-watch
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
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
	public function deleteWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_watcher/watch/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'watcher.delete_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Run a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-execute-watch
	 *
	 * @param array{
	 *     id?: string, // Watch ID
	 *     debug?: bool, // indicates whether the watch should execute in debug mode
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Execution control. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function executeWatch(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_watcher/watch/' . $this->encode($params['id']) . '/_execute';
			$method = 'PUT';
		} else {
			$url = '/_watcher/watch/_execute';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['debug','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'watcher.execute_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get Watcher index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-get-settings
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function getSettings(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_watcher/settings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'watcher.get_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-get-watch
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
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
	public function getWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_watcher/watch/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'watcher.get_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update a watch
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-put-watch
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 *     active?: bool, // Specify whether the watch is in/active by default
	 *     version?: int, // Explicit version number for concurrency control
	 *     if_seq_no?: int, // only update the watch if the last operation that has changed the watch has the specified sequence number
	 *     if_primary_term?: int, // only update the watch if the last operation that has changed the watch has the specified primary term
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The watch. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putWatch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_watcher/watch/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['active','version','if_seq_no','if_primary_term','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'watcher.put_watch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Query watches
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-query-watches
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // From, size, query, sort and search_after. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function queryWatches(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_watcher/_query/watches';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'watcher.query_watches');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start the watch service
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-start
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function start(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_watcher/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'watcher.start');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get Watcher statistics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-stats
	 *
	 * @param array{
	 *     metric?: string|array<string>, // Controls what additional stat metrics should be include in the response
	 *     emit_stacktraces?: bool, // Emits stack traces of currently running watches
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
	public function stats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['metric'])) {
			$url = '/_watcher/stats/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} else {
			$url = '/_watcher/stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['emit_stacktraces','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['metric'], $request, 'watcher.stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop the watch service
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-stop
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function stop(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_watcher/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'watcher.stop');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update Watcher index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-watcher-update-settings
	 *
	 * @param array{
	 *     timeout?: int|string, // Specify timeout for waiting for acknowledgement from all nodes
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) An object with the new index settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateSettings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_watcher/settings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'watcher.update_settings');
		return $this->client->sendRequest($request);
	}
}
