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
class Cluster extends AbstractEndpoint
{
	/**
	 * Provides explanations for shard allocations in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-allocation-explain.html
	 *
	 * @param array{
	 *     include_yes_decisions: boolean, // Return 'YES' decisions in explanation (default: false)
	 *     include_disk_info: boolean, // Return information about disk usage and shard sizes (default: false)
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The index, shard, and primary flag to explain. Empty means 'explain a randomly-chosen unassigned shard'
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function allocationExplain(array $params = [])
	{
		$url = '/_cluster/allocation/explain';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['include_yes_decisions','include_disk_info','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes a component template
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
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
	public function deleteComponentTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_component_template/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Clears cluster voting config exclusions.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/voting-config-exclusions.html
	 *
	 * @param array{
	 *     wait_for_removal: boolean, // Specifies whether to wait for all excluded nodes to be removed from the cluster before clearing the voting configuration exclusions list.
	 *     master_timeout: time, // Timeout for submitting request to master
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
	public function deleteVotingConfigExclusions(array $params = [])
	{
		$url = '/_cluster/voting_config_exclusions';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['wait_for_removal','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about whether a particular component template exist
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
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
	public function existsComponentTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_component_template/' . $this->encode($params['name']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns one or more component templates
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
	 *
	 * @param array{
	 *     name: list, //  The comma separated names of the component templates
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
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
	public function getComponentTemplate(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_component_template/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_component_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns cluster settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-get-settings.html
	 *
	 * @param array{
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     include_defaults: boolean, // Whether to return all default clusters setting.
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
		$url = '/_cluster/settings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','timeout','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns basic information about the health of the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-health.html
	 *
	 * @param array{
	 *     index: list, //  Limit the information returned to a specific index
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     level: enum, // Specify the level of detail for returned information
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     wait_for_active_shards: string, // Wait until the specified number of shards is active
	 *     wait_for_nodes: string, // Wait until the specified number of nodes is available
	 *     wait_for_events: enum, // Wait until all currently queued events with the given priority are processed
	 *     wait_for_no_relocating_shards: boolean, // Whether to wait until there are no relocating shards in the cluster
	 *     wait_for_no_initializing_shards: boolean, // Whether to wait until there are no initializing shards in the cluster
	 *     wait_for_status: enum, // Wait until cluster is in a specific state
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
	public function health(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/_cluster/health/' . $this->encode($params['index']);
			$method = 'GET';
		} else {
			$url = '/_cluster/health';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['expand_wildcards','level','local','master_timeout','timeout','wait_for_active_shards','wait_for_nodes','wait_for_events','wait_for_no_relocating_shards','wait_for_no_initializing_shards','wait_for_status','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns a list of any cluster-level changes (e.g. create index, update mapping,
	 * allocate or fail shard) which have not yet been executed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-pending.html
	 *
	 * @param array{
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
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
	public function pendingTasks(array $params = [])
	{
		$url = '/_cluster/pending_tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['local','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates the cluster voting config exclusions by node ids or node names.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/voting-config-exclusions.html
	 *
	 * @param array{
	 *     node_ids: string, // A comma-separated list of the persistent ids of the nodes to exclude from the voting configuration. If specified, you may not also specify ?node_names.
	 *     node_names: string, // A comma-separated list of the names of the nodes to exclude from the voting configuration. If specified, you may not also specify ?node_ids.
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Timeout for submitting request to master
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
	public function postVotingConfigExclusions(array $params = [])
	{
		$url = '/_cluster/voting_config_exclusions';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['node_ids','node_names','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates or updates a component template
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     create: boolean, // Whether the index template should only be added if new or can also replace an existing one
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The template definition
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putComponentTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_component_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['create','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates the cluster settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-update-settings.html
	 *
	 * @param array{
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The settings to be updated. Can be either `transient` or `persistent` (survives cluster restart).
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putSettings(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_cluster/settings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns the information about configured remote clusters.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-remote-info.html
	 *
	 * @param array{
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
	public function remoteInfo(array $params = [])
	{
		$url = '/_remote/info';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Allows to manually change the allocation of individual shards in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-reroute.html
	 *
	 * @param array{
	 *     dry_run: boolean, // Simulate the operation only and return the resulting state
	 *     explain: boolean, // Return an explanation of why the commands can or cannot be executed
	 *     retry_failed: boolean, // Retries allocation of shards that are blocked due to too many subsequent allocation failures
	 *     metric: list, // Limit the information returned to the specified metrics. Defaults to all but metadata
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     timeout: time, // Explicit operation timeout
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The definition of `commands` to perform (`move`, `cancel`, `allocate`)
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reroute(array $params = [])
	{
		$url = '/_cluster/reroute';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run','explain','retry_failed','metric','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns a comprehensive information about the state of the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-state.html
	 *
	 * @param array{
	 *     metric: list, //  Limit the information returned to the specified metrics
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     wait_for_metadata_version: number, // Wait for the metadata version to be equal or greater than the specified metadata version
	 *     wait_for_timeout: time, // The maximum time to wait for wait_for_metadata_version before timing out
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function state(array $params = [])
	{
		if (isset($params['index']) && isset($params['metric'])) {
			$url = '/_cluster/state/' . $this->encode($params['metric']) . '/' . $this->encode($params['index']);
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_cluster/state/' . $this->encode($params['metric']);
			$method = 'GET';
		} else {
			$url = '/_cluster/state';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['local','master_timeout','flat_settings','wait_for_metadata_version','wait_for_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns high-level overview of cluster statistics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-stats.html
	 *
	 * @param array{
	 *     node_id: list, //  A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     timeout: time, // Explicit operation timeout
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
		if (isset($params['node_id'])) {
			$url = '/_cluster/stats/nodes/' . $this->encode($params['node_id']);
			$method = 'GET';
		} else {
			$url = '/_cluster/stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
