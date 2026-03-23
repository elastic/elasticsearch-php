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
class Nodes extends AbstractEndpoint
{
	/**
	 * Clear the archived repositories metering
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/clear-repositories-metering-archive-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     node_id: string|array<string>, // (REQUIRED) Comma-separated list of node IDs or names used to limit returned information.
	 *     max_archive_version: int, // (REQUIRED) Specifies the maximum archive_version to be cleared from the archive.
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
	public function clearRepositoriesMeteringArchive(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['node_id','max_archive_version'], $params);
		$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/_repositories_metering/' . $this->encode($params['max_archive_version']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id', 'max_archive_version'], $request, 'nodes.clear_repositories_metering_archive');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get cluster repositories metering
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/get-repositories-metering-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     node_id: string|array<string>, // (REQUIRED) A comma-separated list of node IDs or names to limit the returned information.
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
	public function getRepositoriesMeteringInfo(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['node_id'], $params);
		$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/_repositories_metering';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'nodes.get_repositories_metering_info');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the hot threads for nodes
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster-nodes-hot-threads.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     interval?: int|string, // The interval to do the second sampling of threads. (DEFAULT: 500ms)
	 *     snapshots?: int, // Number of samples of thread stacktrace. (DEFAULT: 10)
	 *     threads?: int, // Specifies the number of hot threads to provide information for. (DEFAULT: 3)
	 *     ignore_idle_threads?: bool, // If true, known idle threads (e.g. waiting in a socket select, or to get a task from an empty queue) are filtered out. (DEFAULT: 1)
	 *     type?: string, // The type to sample. (DEFAULT: cpu)
	 *     sort?: string, // The sort order for 'cpu' type (DEFAULT: total)
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function hotThreads(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/hot_threads';
			$method = 'GET';
		} else {
			$url = '/_nodes/hot_threads';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['interval','snapshots','threads','ignore_idle_threads','type','sort','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'nodes.hot_threads');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get node information
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster-nodes-info.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // A comma-separated list of metrics you wish returned. Use `_all` to retrieve all metrics and `_none` to retrieve the node identity without any additional metrics.
	 *     flat_settings?: bool, // If true, returns settings in flat format.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function info(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id']) && isset($params['metric'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} elseif (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id']));
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} else {
			$url = '/_nodes';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id', 'metric'], $request, 'nodes.info');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reload the keystore on nodes in the cluster
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster-nodes-reload-secure-settings.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs to span the reload/reinit call. Should stay empty because reloading usually involves all cluster nodes.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // An object containing the password for the elasticsearch keystore. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reloadSecureSettings(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/reload_secure_settings';
			$method = 'POST';
		} else {
			$url = '/_nodes/reload_secure_settings';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'nodes.reload_secure_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get node statistics
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster-nodes-stats.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // Limit the information returned to the specified metrics
	 *     index_metric?: string|array<string>, // Limit the information returned for `indices` metric to the specific index metrics. Isn't used if `indices` (or `all`) metric isn't specified.
	 *     completion_fields?: string|array<string>, // Comma-separated list or wildcard expressions of fields to include in fielddata and suggest statistics.
	 *     fielddata_fields?: string|array<string>, // Comma-separated list or wildcard expressions of fields to include in fielddata statistics.
	 *     fields?: string|array<string>, // Comma-separated list or wildcard expressions of fields to include in the statistics.
	 *     groups?: bool, // Comma-separated list of search groups to include in the search statistics.
	 *     level?: string, // Indicates whether statistics are aggregated at the node, indices, or shards level. (DEFAULT: node)
	 *     types?: string|array<string>, // A comma-separated list of document types for the indexing index metric.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     include_segment_file_sizes?: bool, // If true, the call reports the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested).
	 *     include_unloaded_segments?: bool, // If `true`, the response includes information from segments that are not loaded into memory.
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
		if (isset($params['metric']) && isset($params['index_metric']) && isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/stats/' . $this->encode($this->convertValue($params['metric'])) . '/' . $this->encode($this->convertValue($params['index_metric']));
			$method = 'GET';
		} elseif (isset($params['metric']) && isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/stats/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} elseif (isset($params['metric']) && isset($params['index_metric'])) {
			$url = '/_nodes/stats/' . $this->encode($this->convertValue($params['metric'])) . '/' . $this->encode($this->convertValue($params['index_metric']));
			$method = 'GET';
		} elseif (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/stats';
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_nodes/stats/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} else {
			$url = '/_nodes/stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['completion_fields','fielddata_fields','fields','groups','level','types','timeout','include_segment_file_sizes','include_unloaded_segments','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id', 'metric', 'index_metric'], $request, 'nodes.stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get feature usage information
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.19/cluster-nodes-usage.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // Limit the information returned to the specified metrics
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function usage(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['metric']) && isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/usage/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} elseif (isset($params['node_id'])) {
			$url = '/_nodes/' . $this->encode($this->convertValue($params['node_id'])) . '/usage';
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_nodes/usage/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} else {
			$url = '/_nodes/usage';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id', 'metric'], $request, 'nodes.usage');
		return $this->client->sendRequest($request);
	}
}
