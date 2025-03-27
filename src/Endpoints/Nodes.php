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
	 * Removes the archived repositories metering information present in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/clear-repositories-metering-archive-api.html
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
	 * Returns cluster repositories metering information.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-repositories-metering-api.html
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
	 * Returns information about hot threads on each node in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-hot-threads.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     interval?: int|string, // The interval for the second sampling of threads
	 *     snapshots?: int, // Number of samples of thread stacktrace (default: 10)
	 *     threads?: int, // Specify the number of threads to provide information for (default: 3)
	 *     ignore_idle_threads?: bool, // Don't show threads that are in known-idle places, such as waiting on a socket select or pulling from an empty task queue (default: true)
	 *     type?: string, // The type to sample (default: cpu)
	 *     sort?: string, // The sort order for 'cpu' type (default: total)
	 *     timeout?: int|string, // Explicit operation timeout
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
	 * Returns information about nodes in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-info.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // A comma-separated list of metrics you wish returned. Use `_all` to retrieve all metrics and `_none` to retrieve the node identity without any additional metrics.
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     timeout?: int|string, // Explicit operation timeout
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
	 * Reloads secure settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/secure-settings.html#reloadable-secure-settings
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs to span the reload/reinit call. Should stay empty because reloading usually involves all cluster nodes.
	 *     timeout?: int|string, // Explicit operation timeout
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
	 * Returns statistical information about nodes in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-stats.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // Limit the information returned to the specified metrics
	 *     index_metric?: string|array<string>, // Limit the information returned for `indices` metric to the specific index metrics. Isn't used if `indices` (or `all`) metric isn't specified.
	 *     completion_fields?: string|array<string>, // A comma-separated list of fields for the `completion` index metric (supports wildcards)
	 *     fielddata_fields?: string|array<string>, // A comma-separated list of fields for the `fielddata` index metric (supports wildcards)
	 *     fields?: string|array<string>, // A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)
	 *     groups?: bool, // A comma-separated list of search groups for `search` index metric
	 *     level?: string, // Return indices stats aggregated at index, node or shard level
	 *     types?: string|array<string>, // A comma-separated list of document types for the `indexing` index metric
	 *     timeout?: int|string, // Explicit operation timeout
	 *     include_segment_file_sizes?: bool, // Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested)
	 *     include_unloaded_segments?: bool, // If set to true segment stats will include stats for segments that are not currently loaded into memory
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
	 * Returns low-level information about REST actions usage on nodes.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-nodes-usage.html
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     metric?: string|array<string>, // Limit the information returned to the specified metrics
	 *     timeout?: int|string, // Explicit operation timeout
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
