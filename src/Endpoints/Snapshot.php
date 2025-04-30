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
class Snapshot extends AbstractEndpoint
{
	/**
	 * Removes stale data from repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/clean-up-snapshot-repo-api.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
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
	public function cleanupRepository(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/_cleanup';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.cleanup_repository');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clones indices from one snapshot into another snapshot in the same repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) The name of the snapshot to clone from
	 *     target_snapshot: string, // (REQUIRED) The name of the cloned snapshot to create
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The snapshot clone definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clone(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','snapshot','target_snapshot','body'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($params['snapshot']) . '/_clone/' . $this->encode($params['target_snapshot']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot', 'target_snapshot'], $request, 'snapshot.clone');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates a snapshot in a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The snapshot definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function create(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($params['snapshot']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.create');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
	 *     verify?: bool, // Whether to verify the repository after creation
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The repository definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function createRepository(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','body'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','verify','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.create_repository');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes one or more snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string|array<string>, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning
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
	public function delete(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($this->convertValue($params['snapshot']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string|array<string>, // (REQUIRED) Name of the snapshot repository to unregister. Wildcard (`*`) patterns are supported.
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
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
	public function deleteRepository(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . $this->encode($this->convertValue($params['repository']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.delete_repository');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns information about a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string|array<string>, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     ignore_unavailable?: bool, // Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
	 *     index_names?: bool, // Whether to include the name of each index in the snapshot. Defaults to true.
	 *     index_details?: bool, // Whether to include details of each index in the snapshot, if those details are available. Defaults to false.
	 *     include_repository?: bool, // Whether to include the repository name in the snapshot info. Defaults to true.
	 *     sort?: string, // Allows setting a sort order for the result. Defaults to start_time
	 *     size?: int, // Maximum number of snapshots to return. Defaults to 0 which means return all that match without limit.
	 *     order?: string, // Sort order
	 *     from_sort_value?: string, // Value of the current sort column at which to start retrieval.
	 *     after?: string, // Offset identifier to start pagination from as returned by the 'next' field in the response body.
	 *     offset?: int, // Numeric offset to start pagination based on the snapshots matching the request. Defaults to 0
	 *     slm_policy_filter?: string, // Filter snapshots by a comma-separated list of SLM policy names that snapshots belong to. Accepts wildcards. Use the special pattern '_none' to match snapshots without an SLM policy
	 *     verbose?: bool, // Whether to show verbose snapshot info or only show the basic info found in the repository index blob
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
	public function get(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($this->convertValue($params['snapshot']));
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','index_names','index_details','include_repository','sort','size','order','from_sort_value','after','offset','slm_policy_filter','verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns information about a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository?: string|array<string>, // A comma-separated list of repository names
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function getRepository(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['repository'])) {
			$url = '/_snapshot/' . $this->encode($this->convertValue($params['repository']));
			$method = 'GET';
		} else {
			$url = '/_snapshot';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.get_repository');
		return $this->client->sendRequest($request);
	}


	/**
	 * Analyzes a repository for correctness and performance
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     blob_count?: int, // Number of blobs to create during the test. Defaults to 100.
	 *     concurrency?: int, // Number of operations to run concurrently during the test. Defaults to 10.
	 *     read_node_count?: int, // Number of nodes on which to read a blob after writing. Defaults to 10.
	 *     early_read_node_count?: int, // Number of nodes on which to perform an early read on a blob, i.e. before writing has completed. Early reads are rare actions so the 'rare_action_probability' parameter is also relevant. Defaults to 2.
	 *     seed?: int, // Seed for the random number generator used to create the test workload. Defaults to a random value.
	 *     rare_action_probability?: int, // Probability of taking a rare action such as an early read or an overwrite. Defaults to 0.02.
	 *     max_blob_size?: string, // Maximum size of a blob to create during the test, e.g '1gb' or '100mb'. Defaults to '10mb'.
	 *     max_total_data_size?: string, // Maximum total size of all blobs to create during the test, e.g '1tb' or '100gb'. Defaults to '1gb'.
	 *     timeout?: int|string, // Explicit operation timeout. Defaults to '30s'.
	 *     detailed?: bool, // Whether to return detailed results or a summary. Defaults to 'false' so that only the summary is returned.
	 *     rarely_abort_writes?: bool, // Whether to rarely abort writes before they complete. Defaults to 'true'.
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
	public function repositoryAnalyze(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/_analyze';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['blob_count','concurrency','read_node_count','early_read_node_count','seed','rare_action_probability','max_blob_size','max_total_data_size','timeout','detailed','rarely_abort_writes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.repository_analyze');
		return $this->client->sendRequest($request);
	}


	/**
	 * Restores a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Details of what to restore. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function restore(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository','snapshot'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($params['snapshot']) . '/_restore';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.restore');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns information about the status of a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository?: string, // A repository name
	 *     snapshot?: string|array<string>, // A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     ignore_unavailable?: bool, // Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
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
	public function status(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['repository']) && isset($params['snapshot'])) {
			$url = '/_snapshot/' . $this->encode($params['repository']) . '/' . $this->encode($this->convertValue($params['snapshot'])) . '/_status';
			$method = 'GET';
		} elseif (isset($params['repository'])) {
			$url = '/_snapshot/' . $this->encode($params['repository']) . '/_status';
			$method = 'GET';
		} else {
			$url = '/_snapshot/_status';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Verifies a repository.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
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
	public function verifyRepository(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . $this->encode($params['repository']) . '/_verify';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.verify_repository');
		return $this->client->sendRequest($request);
	}
}
