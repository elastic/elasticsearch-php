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
	 * Acknowledges a watch, manually throttling the execution of the watch's actions.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-ack-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 *     action_id: list, //  A comma-separated list of the action ids to be acked
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function ackWatch(array $params = [])
	{
		$this->checkRequiredParameters(['watch_id'], $params);
		if (isset($params['action_id'])) {
			$url = '/_watcher/watch/' . $this->encode($params['watch_id']) . '/_ack/' . $this->encode($params['action_id']);
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
	 * Activates a currently inactive watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-activate-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function activateWatch(array $params = [])
	{
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
	 * Deactivates a currently active watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-deactivate-watch.html
	 *
	 * @param array{
	 *     watch_id: string, // (REQUIRED) Watch ID
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deactivateWatch(array $params = [])
	{
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
	 * Removes a watch from Watcher.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-delete-watch.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteWatch(array $params = [])
	{
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
	 * Forces the execution of a stored watch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-execute-watch.html
	 *
	 * @param array{
	 *     id: string, //  Watch ID
	 *     debug: boolean, // indicates whether the watch should execute in debug mode
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  Execution control
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function executeWatch(array $params = [])
	{
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
	 * Retrieve settings for the watcher system index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-get-settings.html
	 *
	 * @param array{
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getSettings(array $params = [])
	{
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
	 * Retrieves a watch by its ID.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-get-watch.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Watch ID
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getWatch(array $params = [])
	{
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
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The watch
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putWatch(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
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
	 * Retrieves stored watches.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-query-watches.html
	 *
	 * @param array{
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  From, size, query, sort and search_after
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function queryWatches(array $params = [])
	{
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
	 * Starts Watcher if it is not already running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-start.html
	 *
	 * @param array{
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function start(array $params = [])
	{
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
	 * Retrieves the current Watcher metrics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stats.html
	 *
	 * @param array{
	 *     metric: list, //  Controls what additional stat metrics should be include in the response
	 *     emit_stacktraces: boolean, // Emits stack traces of currently running watches
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function stats(array $params = [])
	{
		if (isset($params['metric'])) {
			$url = '/_watcher/stats/' . $this->encode($params['metric']);
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
	 * Stops Watcher if it is running.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-stop.html
	 *
	 * @param array{
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function stop(array $params = [])
	{
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
	 * Update settings for the watcher system index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/watcher-api-update-settings.html
	 *
	 * @param array{
	 *     timeout: time, // Specify timeout for waiting for acknowledgement from all nodes
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) An object with the new index settings
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateSettings(array $params = [])
	{
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
