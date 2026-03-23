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
	 * Explain the shard allocations
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-allocation-explain
	 *
	 * @param array{
	 *     index?: string, // The name of the index that you would like an explanation for.
	 *     shard?: int, // An identifier for the shard that you would like an explanation for.
	 *     primary?: bool, // If true, returns an explanation for the primary shard for the specified shard ID.
	 *     current_node?: string, // Explain a shard only if it is currently located on the specified node name or node ID.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     include_yes_decisions?: bool, // If true, returns YES decisions in explanation.
	 *     include_disk_info?: bool, // If true, returns information about disk usage and shard sizes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The index, shard, and primary flag to explain. Empty means 'explain a randomly-chosen unassigned shard'. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function allocationExplain(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cluster/allocation/explain';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['index','shard','primary','current_node','master_timeout','include_yes_decisions','include_disk_info','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.allocation_explain');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete component templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-put-component-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) Comma-separated list or wildcard expression of component template names used to limit the request.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function deleteComponentTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_component_template/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cluster.delete_component_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear cluster voting config exclusions
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-post-voting-config-exclusions
	 *
	 * @param array{
	 *     wait_for_removal?: bool, // Specifies whether to wait for all excluded nodes to be removed from the cluster before clearing the voting configuration exclusions list. Defaults to true, meaning that all excluded nodes must be removed from the cluster before this API takes any action. If set to false then the voting configuration exclusions list is cleared even if some excluded nodes are still in the cluster. (DEFAULT: 1)
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
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
	public function deleteVotingConfigExclusions(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cluster/voting_config_exclusions';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['wait_for_removal','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.delete_voting_config_exclusions');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check component templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-put-component-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) Comma-separated list of component template names used to limit the request. Wildcard (*) expressions are supported.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     local?: bool, // If true, the request retrieves information from the local node only. Defaults to false, which means information is retrieved from the master node.
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
	public function existsComponentTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_component_template/' . $this->encode($this->convertValue($params['name']));
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cluster.exists_component_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get component templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-put-component-template
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string, // The name of the component template. Wildcard (`*`) expressions are supported.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     local?: bool, // If `true`, the request retrieves information from the local node only. If `false`, information is retrieved from the master node.
	 *     include_defaults?: bool, // Return all default configurations for the component template
	 *     flat_settings?: bool, // If `true`, returns settings in flat format.
	 *     settings_filter?: string|array<string>, // Filter out results, for example to filter out sensitive information. Supports wildcards or full settings keys
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
	public function getComponentTemplate(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_component_template/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_component_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','local','include_defaults','flat_settings','settings_filter','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cluster.get_component_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get cluster-wide settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-get-settings
	 *
	 * @param array{
	 *     flat_settings?: bool, // If `true`, returns settings in flat format.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     include_defaults?: bool, // If `true`, also returns default values for all other cluster settings, reflecting the values in the `elasticsearch.yml` file of one of the nodes in the cluster. If the nodes in your cluster do not all have the same values in their `elasticsearch.yml` config files then the values returned by this API may vary from invocation to invocation and may not reflect the values that Elasticsearch uses in all situations. Use the `GET _nodes/settings` API to fetch the settings for each individual node in your cluster.
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
		$url = '/_cluster/settings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','timeout','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.get_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the cluster health status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-health
	 *
	 * @param array{
	 *     index?: string|array<string>, // Limit the information returned to a specific index
	 *     expand_wildcards?: string|array<string>, // Expand wildcard expression to concrete indices that are open, closed or both. (DEFAULT: all)
	 *     level?: string, // Return health information at a specific level of detail. (DEFAULT: cluster)
	 *     local?: bool, // If true, retrieve information from the local node only. If false, retrieve information from the master node.
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     wait_for_active_shards?: string, // Wait for the specified number of active shards. Use `all` to wait for all shards in the cluster to be active. Use `0` to not wait.
	 *     wait_for_nodes?: string, // Wait until the specified number (N) of nodes is available. It also accepts `>=N`, `<=N`, `>N` and `<N`. Alternatively, use the notations `ge(N)`, `le(N)`, `gt(N)`, and `lt(N)`.
	 *     wait_for_events?: string, // Wait until all currently queued events with the given priority are processed.
	 *     wait_for_no_relocating_shards?: bool, // Wait (until the timeout expires) for the cluster to have no shard relocations. If false, the request not wait for relocating shards.
	 *     wait_for_no_initializing_shards?: bool, // Wait (until the timeout expires) for the cluster to have no shard initializations. If false, the request does not wait for initializing shards.
	 *     wait_for_status?: string, // Wait (until the timeout expires) for the cluster to reach a specific health status (or a better status). A green status is better than yellow and yellow is better than red. By default, the request does not wait for a particular status.
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
	public function health(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/_cluster/health/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cluster/health';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['expand_wildcards','level','local','master_timeout','timeout','wait_for_active_shards','wait_for_nodes','wait_for_events','wait_for_no_relocating_shards','wait_for_no_initializing_shards','wait_for_status','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cluster.health');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get cluster info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-info
	 * @group serverless
	 *
	 * @param array{
	 *     target: string|array<string>, // (REQUIRED) Limit the information returned to the specified target.
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
	public function info(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['target'], $params);
		$url = '/_info/' . $this->encode($this->convertValue($params['target']));
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['target'], $request, 'cluster.info');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the pending cluster tasks
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-pending-tasks
	 *
	 * @param array{
	 *     local?: bool, // If `true`, the request retrieves information from the local node only. If `false`, information is retrieved from the master node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function pendingTasks(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cluster/pending_tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['local','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.pending_tasks');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update voting configuration exclusions
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-post-voting-config-exclusions
	 *
	 * @param array{
	 *     node_ids?: string|array<string>, // A comma-separated list of the persistent ids of the nodes to exclude from the voting configuration. If specified, you may not also specify node_names.
	 *     node_names?: string|array<string>, // A comma-separated list of the names of the nodes to exclude from the voting configuration. If specified, you may not also specify node_ids.
	 *     timeout?: int|string, // When adding a voting configuration exclusion, the API waits for the specified nodes to be excluded from the voting configuration before returning. If the timeout expires before the appropriate condition is satisfied, the request fails and returns an error. (DEFAULT: 30s)
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
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
	public function postVotingConfigExclusions(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cluster/voting_config_exclusions';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['node_ids','node_names','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.post_voting_config_exclusions');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update a component template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-put-component-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     create?: bool, // If `true`, this request cannot replace or update existing component templates.
	 *     cause?: string, // User defined reason for create the component template. (DEFAULT: api)
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The template definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putComponentTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_component_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cluster.put_component_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update the cluster settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-put-settings
	 *
	 * @param array{
	 *     flat_settings?: bool, // Return settings in flat format
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The settings to be updated. Can be either `transient` or `persistent` (survives cluster restart).. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putSettings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_cluster/settings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.put_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get remote cluster information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-remote-info
	 *
	 * @param array{
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
	public function remoteInfo(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_remote/info';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.remote_info');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reroute the cluster
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-reroute
	 *
	 * @param array{
	 *     dry_run?: bool, // If true, then the request simulates the operation. It will calculate the result of applying the commands to the current cluster state and return the resulting cluster state after the commands (and rebalancing) have been applied; it will not actually perform the requested changes.
	 *     explain?: bool, // If true, then the response contains an explanation of why the commands can or cannot run.
	 *     retry_failed?: bool, // If true, then retries allocation of shards that are blocked due to too many subsequent allocation failures.
	 *     metric?: string|array<string>, // Limits the information returned to the specified metrics. (DEFAULT: all)
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The definition of `commands` to perform (`move`, `cancel`, `allocate`). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reroute(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cluster/reroute';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run','explain','retry_failed','metric','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cluster.reroute');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the cluster state
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-state
	 *
	 * @param array{
	 *     metric?: string|array<string>, // Limit the information returned to the specified metrics
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     local?: bool, // Return local information, do not retrieve the state from master node
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked (DEFAULT: 30s)
	 *     flat_settings?: bool, // Return settings in flat format
	 *     wait_for_metadata_version?: int, // Wait for the metadata version to be equal or greater than the specified metadata version
	 *     wait_for_timeout?: int|string, // The maximum time to wait for wait_for_metadata_version before timing out
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified) (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both (DEFAULT: open)
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
	public function state(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index']) && isset($params['metric'])) {
			$url = '/_cluster/state/' . $this->encode($this->convertValue($params['metric'])) . '/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_cluster/state/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} else {
			$url = '/_cluster/state';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['local','master_timeout','flat_settings','wait_for_metadata_version','wait_for_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['metric', 'index'], $request, 'cluster.state');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get cluster statistics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cluster-stats
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     include_remotes?: bool, // Include remote cluster data into the response
	 *     timeout?: int|string, // Period to wait for each node to respond. If a node does not respond before its timeout expires, the response does not include its stats. However, timed out nodes are included in the response’s `_nodes.failed` property. Defaults to no timeout.
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
		if (isset($params['node_id'])) {
			$url = '/_cluster/stats/nodes/' . $this->encode($this->convertValue($params['node_id']));
			$method = 'GET';
		} else {
			$url = '/_cluster/stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['include_remotes','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'cluster.stats');
		return $this->client->sendRequest($request);
	}
}
