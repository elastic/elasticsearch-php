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
	 * Clean up the snapshot repository
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-cleanup-repository
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1` (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response from all relevant nodes in the cluster after updating the cluster metadata. If no response is received before the timeout expires, the cluster metadata update still applies but the response will indicate that it was not completely acknowledged. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
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
	 * Clone a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-clone
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) The name of the snapshot to clone from
	 *     target_snapshot: string, // (REQUIRED) The name of the cloned snapshot to create
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
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
	 * Create a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-create
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     wait_for_completion?: bool, // If `true`, the request returns a response when the snapshot is complete. If `false`, the request returns a response when the snapshot initializes.
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
	 * Create or update a snapshot repository
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-create-repository
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response from all relevant nodes in the cluster after updating the cluster metadata. If no response is received before the timeout expires, the cluster metadata update still applies but the response will indicate that it was not completely acknowledged. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     verify?: bool, // If `true`, the request verifies the repository is functional on all master and data nodes in the cluster. If `false`, this verification is skipped. You can also perform this verification with the verify snapshot repository API. (DEFAULT: 1)
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
	 * Delete snapshots
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-delete
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string|array<string>, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     wait_for_completion?: bool, // If `true`, the request returns a response when the matching snapshots are all deleted. If `false`, the request returns a response as soon as the deletes are scheduled. (DEFAULT: 1)
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
	 * Delete snapshot repositories
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-delete-repository
	 *
	 * @param array{
	 *     repository: string|array<string>, // (REQUIRED) Name of the snapshot repository to unregister. Wildcard (`*`) patterns are supported.
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response from all relevant nodes in the cluster after updating the cluster metadata. If no response is received before the timeout expires, the cluster metadata update still applies but the response will indicate that it was not completely acknowledged. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
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
	 * Get snapshot information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-get
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string|array<string>, // (REQUIRED) A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error for any snapshots that are unavailable.
	 *     index_names?: bool, // If `true`, the response includes the name of each index in each snapshot. (DEFAULT: 1)
	 *     index_details?: bool, // If `true`, the response includes additional information about each index in the snapshot comprising the number of shards in the index, the total size of the index in bytes, and the maximum number of segments per shard in the index. The default is `false`, meaning that this information is omitted.
	 *     include_repository?: bool, // If `true`, the response includes the repository name in each snapshot. (DEFAULT: 1)
	 *     sort?: string, // The sort order for the result. The default behavior is sorting by snapshot start time stamp. (DEFAULT: start_time)
	 *     size?: int, // The maximum number of snapshots to return. The default is -1, which means to return all that match the request without limit. (DEFAULT: -1)
	 *     order?: string, // The sort order. Valid values are `asc` for ascending and `desc` for descending order. The default behavior is ascending order. (DEFAULT: asc)
	 *     from_sort_value?: string, // The value of the current sort column at which to start retrieval. It can be a string `snapshot-` or a repository name when sorting by snapshot or repository name. It can be a millisecond time value or a number when sorting by `index-` or shard count.
	 *     after?: string, // An offset identifier to start pagination from as returned by the next field in the response body.
	 *     offset?: int, // Numeric offset to start pagination from based on the snapshots matching this request. Using a non-zero value for this parameter is mutually exclusive with using the after parameter. Defaults to 0.
	 *     slm_policy_filter?: string, // Filter snapshots by a comma-separated list of snapshot lifecycle management (SLM) policy names that snapshots belong to.  You can use wildcards (`*`) and combinations of wildcards followed by exclude patterns starting with `-`. For example, the pattern `*,-policy-a-\*` will return all snapshots except for those that were created by an SLM policy with a name starting with `policy-a-`. Note that the wildcard pattern `*` matches all snapshots created by an SLM policy but not those snapshots that were not created by an SLM policy. To include snapshots that were not created by an SLM policy, you can use the special pattern `_none` that will match all snapshots without an SLM policy.
	 *     verbose?: bool, // If `true`, returns additional information about each snapshot such as the version of Elasticsearch which took the snapshot, the start and end times of the snapshot, and the number of shards snapshotted.  NOTE: The parameters `size`, `order`, `after`, `from_sort_value`, `offset`, `slm_policy_filter`, and `sort` are not supported when you set `verbose=false` and the sort order for requests with `verbose=false` is undefined. (DEFAULT: 1)
	 *     state?: string|array<string>, // Only return snapshots with a state found in the given comma-separated list of snapshot states. The default is all snapshot states.
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

		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','index_names','index_details','include_repository','sort','size','order','from_sort_value','after','offset','slm_policy_filter','verbose','state','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository', 'snapshot'], $request, 'snapshot.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get snapshot repository information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-get-repository
	 *
	 * @param array{
	 *     repository?: string|array<string>, // A comma-separated list of repository names
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     local?: bool, // If `true`, the request gets information from the local node only. If `false`, the request gets information from the master node.
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
	 * Analyze a snapshot repository
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-repository-analyze
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     blob_count?: int, // The total number of blobs to write to the repository during the test. For realistic experiments, set this parameter to at least `2000`. (DEFAULT: 100)
	 *     concurrency?: int, // The number of operations to run concurrently during the test. For realistic experiments, leave this parameter unset. (DEFAULT: 10)
	 *     register_operation_count?: int, // The minimum number of linearizable register operations to perform in total. For realistic experiments, set this parameter to at least `100`. (DEFAULT: 10)
	 *     read_node_count?: int, // The number of nodes on which to read a blob after writing. For realistic experiments, leave this parameter unset. (DEFAULT: 10)
	 *     early_read_node_count?: int, // The number of nodes on which to perform an early read operation while writing each blob. Early read operations are only rarely performed. For realistic experiments, leave this parameter unset. (DEFAULT: 2)
	 *     seed?: int, // The seed for the pseudo-random number generator used to generate the list of operations performed during the test. To repeat the same set of operations in multiple experiments, use the same seed in each experiment. Note that the operations are performed concurrently so might not always happen in the same order on each run. For realistic experiments, leave this parameter unset.
	 *     rare_action_probability?: float, // The probability of performing a rare action such as an early read, an overwrite, or an aborted write on each blob. For realistic experiments, leave this parameter unset. (DEFAULT: 0.02)
	 *     max_blob_size?: string, // The maximum size of a blob to be written during the test. For realistic experiments, set this parameter to at least `2gb`. (DEFAULT: 10mb)
	 *     max_total_data_size?: string, // An upper limit on the total size of all the blobs written during the test. For realistic experiments, set this parameter to at least `1tb`. (DEFAULT: 1gb)
	 *     timeout?: int|string, // The period of time to wait for the test to complete. If no response is received before the timeout expires, the test is cancelled and returns an error. For realistic experiments, set this parameter sufficiently long to allow the test to complete. (DEFAULT: 30s)
	 *     detailed?: bool, // Indicates whether to return detailed results, including timing information for every operation performed during the analysis. If false, it returns only a summary of the analysis.
	 *     rarely_abort_writes?: bool, // Indicates whether to rarely cancel writes before they complete. For realistic experiments, leave this parameter unset. (DEFAULT: 1)
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

		$url = $this->addQueryString($url, $params, ['blob_count','concurrency','register_operation_count','read_node_count','early_read_node_count','seed','rare_action_probability','max_blob_size','max_total_data_size','timeout','detailed','rarely_abort_writes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.repository_analyze');
		return $this->client->sendRequest($request);
	}


	/**
	 * Verify the repository integrity
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-repository-verify-integrity
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     repository: string|array<string>, // (REQUIRED) Comma-separated list of snapshot repository names.
	 *     meta_thread_pool_concurrency?: int, // The maximum number of snapshot metadata operations to run concurrently. The default behavior is to use at most half of the `snapshot_meta` thread pool at once.
	 *     blob_thread_pool_concurrency?: int, // If `verify_blob_contents` is `true`, this parameter specifies how many blobs to verify at once. (DEFAULT: 1)
	 *     snapshot_verification_concurrency?: int, // The number of snapshots to verify concurrently. The default behavior is to use at most half of the `snapshot_meta` thread pool at once.
	 *     index_verification_concurrency?: int, // The number of indices to verify concurrently. The default behavior is to use the entire `snapshot_meta` thread pool.
	 *     index_snapshot_verification_concurrency?: int, // The maximum number of index snapshots to verify concurrently within each index verification. (DEFAULT: 1)
	 *     max_failed_shard_snapshots?: int, // The number of shard snapshot failures to track during integrity verification, in order to avoid excessive resource usage. If your repository contains more than this number of shard snapshot failures, the verification will fail. (DEFAULT: 10000)
	 *     verify_blob_contents?: bool, // Indicates whether to verify the checksum of every data blob in the repository. If this feature is enabled, Elasticsearch will read the entire repository contents, which may be extremely slow and expensive.
	 *     max_bytes_per_sec?: string, // If `verify_blob_contents` is `true`, this parameter specifies the maximum amount of data that Elasticsearch will read from the repository every second. (DEFAULT: 10mb)
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
	public function repositoryVerifyIntegrity(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['repository'], $params);
		$url = '/_snapshot/' . $this->encode($this->convertValue($params['repository'])) . '/_verify_integrity';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['meta_thread_pool_concurrency','blob_thread_pool_concurrency','snapshot_verification_concurrency','index_verification_concurrency','index_snapshot_verification_concurrency','max_failed_shard_snapshots','verify_blob_contents','max_bytes_per_sec','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'snapshot.repository_verify_integrity');
		return $this->client->sendRequest($request);
	}


	/**
	 * Restore a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-restore
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     snapshot: string, // (REQUIRED) A snapshot name
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     wait_for_completion?: bool, // If `true`, the request returns a response when the restore operation completes. The operation is complete when it finishes all attempts to recover primary shards for restored indices. This applies even if one or more of the recovery attempts fail.  If `false`, the request returns a response when the restore operation initializes.
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
	 * Get the snapshot status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-status
	 *
	 * @param array{
	 *     repository?: string, // A repository name
	 *     snapshot?: string|array<string>, // A comma-separated list of snapshot names
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error for any snapshots that are unavailable. If `true`, the request ignores snapshots that are unavailable, such as those that are corrupted or temporarily cannot be returned.
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
	 * Verify a snapshot repository
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-snapshot-verify-repository
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) A repository name
	 *     master_timeout?: int|string, // The period to wait for the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
	 *     timeout?: int|string, // The period to wait for a response from all relevant nodes in the cluster after updating the cluster metadata. If no response is received before the timeout expires, the cluster metadata update still applies but the response will indicate that it was not completely acknowledged. To indicate that the request should never timeout, set it to `-1`. (DEFAULT: 30s)
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
