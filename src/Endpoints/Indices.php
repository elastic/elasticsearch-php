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
class Indices extends AbstractEndpoint
{
	/**
	 * Add an index block
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-add-block
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to add a block to
	 *     block: string, // (REQUIRED) The block to add (one of read, write, read_only or metadata)
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function addBlock(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','block'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_block/' . $this->encode($params['block']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'block'], $request, 'indices.add_block');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get tokens from text analysis
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-analyze
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string, // The name of the index to scope the operation
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Define analyzer/tokenizer parameters and the text on which the analysis should be performed. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function analyze(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_analyze';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_analyze';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.analyze');
		return $this->client->sendRequest($request);
	}


	/**
	 * Cancel a migration reindex operation
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-cancel-migrate-reindex
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of index or data stream names
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
	public function cancelMigrateReindex(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/_migration/reindex/' . $this->encode($this->convertValue($params['index'])) . '/_cancel';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.cancel_migrate_reindex');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear the cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-clear-cache
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index name to limit the operation
	 *     fielddata?: bool, // Clear field data
	 *     fields?: string|array<string>, // A comma-separated list of fields to clear when using the `fielddata` parameter (default: all)
	 *     query?: bool, // Clear query caches
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     request?: bool, // Clear request cache
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
	public function clearCache(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_cache/clear';
			$method = 'POST';
		} else {
			$url = '/_cache/clear';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['fielddata','fields','query','ignore_unavailable','allow_no_indices','expand_wildcards','request','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.clear_cache');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clone an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-clone
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to clone
	 *     target: string, // (REQUIRED) The name of the target index to clone into
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     wait_for_active_shards?: string, // Set the number of active shards to wait for on the cloned index before the operation returns.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The configuration for the target index (`settings` and `aliases`). If body is a string must be a valid JSON.
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
		$this->checkRequiredParameters(['index','target'], $params);
		$url = '/' . $this->encode($params['index']) . '/_clone/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'target'], $request, 'indices.clone');
		return $this->client->sendRequest($request);
	}


	/**
	 * Close an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-close
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to close
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     wait_for_active_shards?: string, // Sets the number of active shards to wait for before the operation returns.
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
	public function close(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_close';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.close');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-create
	 * @group serverless
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards?: string, // Set the number of active shards to wait for before the operation returns.
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The configuration for the index (`settings` and `mappings`). If body is a string must be a valid JSON.
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
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.create');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-create-data-stream
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the data stream
	 *     timeout?: int|string, // Specify timeout for acknowledging the cluster state update
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function createDataStream(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.create_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create an index from a source index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-create-from
	 * @group serverless
	 *
	 * @param array{
	 *     source: string, // (REQUIRED) The source index name
	 *     dest: string, // (REQUIRED) The destination index name
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The body contains the fields `mappings_override`, `settings_override`, and `remove_index_blocks`.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function createFrom(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['source','dest'], $params);
		$url = '/_create_from/' . $this->encode($params['source']) . '/' . $this->encode($params['dest']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['source', 'dest'], $request, 'indices.create_from');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-data-streams-stats-1
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of data stream names; use `_all` or empty string to perform the operation on all data streams
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expressions to concrete data stream names that are open, closed or both.
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
	public function dataStreamsStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_data_stream/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.data_streams_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open, closed, or hidden indices
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
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an alias
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-alias
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names (supports wildcards); use `_all` for all indices
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of aliases to delete (supports wildcards); use `_all` to delete all aliases for the specified indices.
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteAlias(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','name'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_alias/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'name'], $request, 'indices.delete_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete data stream lifecycles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-data-lifecycle
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams of which the data stream lifecycle will be deleted; use `*` to get all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteDataLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_lifecycle';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.delete_data_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete data streams
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-data-stream
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams to delete; use `*` to delete all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteDataStream(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.delete_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete data stream options
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-data-stream-options
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams of which the data stream options will be deleted; use `*` to get all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteDataStreamOptions(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_options';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.delete_data_stream_options');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an index template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-index-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) Comma-separated list of index template names used to limit the request. Wildcard (*) expressions are supported.
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.delete_index_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete sampling configuration for an index or data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of a data stream or index
	 *     master_timeout?: int|string, // Timeout for connection to master node
	 *     timeout?: int|string, // Timeout for the request
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
	public function deleteSampleConfiguration(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_sample/config';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.delete_sample_configuration');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a legacy index template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-delete-template
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function deleteTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_template/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.delete_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Analyze the index disk usage
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-disk-usage
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of data streams, indices, and aliases used to limit the request. It’s recommended to execute this API with a single index (or the latest backing index of a data stream) as the API consumes resources significantly.
	 *     run_expensive_tasks?: bool, // Must be set to [true] in order for the task to be performed. Defaults to false.
	 *     flush?: bool, // Whether flush or not before analyzing the index disk usage. Defaults to true
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function diskUsage(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_disk_usage';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['run_expensive_tasks','flush','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.disk_usage');
		return $this->client->sendRequest($request);
	}


	/**
	 * Downsample an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-downsample
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The index to downsample
	 *     target_index: string, // (REQUIRED) The name of the target index to store downsampled data
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The downsampling configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function downsample(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','target_index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_downsample/' . $this->encode($params['target_index']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'target_index'], $request, 'indices.downsample');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-exists
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     include_defaults?: bool, // Whether to return all default setting for each of the indices.
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
	public function exists(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index']));
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['local','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.exists');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check aliases
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-exists-alias
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of alias names to return
	 *     index?: string|array<string>, // A comma-separated list of index names to filter aliases
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
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
	public function existsAlias(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_alias/' . $this->encode($this->convertValue($params['name']));
			$method = 'HEAD';
		} else {
			$url = '/_alias/' . $this->encode($this->convertValue($params['name']));
			$method = 'HEAD';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name', 'index'], $request, 'indices.exists_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check index templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-exists-index-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function existsIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.exists_index_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check existence of index templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-exists-template
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) The comma separated names of the index templates
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
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
	public function existsTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_template/' . $this->encode($this->convertValue($params['name']));
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.exists_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the status for a data stream lifecycle
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-explain-data-lifecycle
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of index names to explain
	 *     include_defaults?: bool, // indicates if the API should return the default values the system uses for the index's lifecycle
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function explainDataLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_lifecycle/explain';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['include_defaults','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.explain_data_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get field usage stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-field-usage-stats
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list or wildcard expression of index names used to limit the request.
	 *     fields?: string|array<string>, // A comma-separated list of fields to include in the stats if only a subset of fields should be returned (supports wildcards)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function fieldUsageStats(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_field_usage_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['fields','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.field_usage_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Flush data streams or indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-flush
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string for all indices
	 *     force?: bool, // Whether a flush should be forced even if it is not necessarily needed ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if no uncommitted changes are present. (This setting can be considered as internal)
	 *     wait_if_ongoing?: bool, // If set to true the flush operation will block until the flush can be executed if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running.
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function flush(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_flush';
			$method = 'POST';
		} else {
			$url = '/_flush';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['force','wait_if_ongoing','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.flush');
		return $this->client->sendRequest($request);
	}


	/**
	 * Force a merge
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-forcemerge
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     flush?: bool, // Specify whether the index should be flushed after performing the operation (default: true)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     max_num_segments?: int, // The number of segments the index should be merged into (default: dynamic)
	 *     only_expunge_deletes?: bool, // Specify whether the operation should only expunge deleted documents
	 *     wait_for_completion?: bool, // Should the request wait until the force merge is completed.
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
	public function forcemerge(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_forcemerge';
			$method = 'POST';
		} else {
			$url = '/_forcemerge';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['flush','ignore_unavailable','allow_no_indices','expand_wildcards','max_num_segments','only_expunge_deletes','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.forcemerge');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     features?: string|array<string>, // Return only information on specified index features
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     include_defaults?: bool, // Whether to return all default setting for each of the indices.
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index']));
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['local','ignore_unavailable','allow_no_indices','expand_wildcards','features','flat_settings','include_defaults','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get aliases
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-alias
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of alias names to return
	 *     index?: string|array<string>, // A comma-separated list of index names to filter aliases
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
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
	public function getAlias(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index']) && isset($params['name'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_alias/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} elseif (isset($params['name'])) {
			$url = '/_alias/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_alias';
			$method = 'GET';
		} else {
			$url = '/_alias';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name', 'index'], $request, 'indices.get_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get sampling configurations for all indices and data streams
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Timeout for connection to master node
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
	public function getAllSampleConfiguration(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_sample/config';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'indices.get_all_sample_configuration');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream lifecycles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-lifecycle
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     include_defaults?: bool, // Return all relevant default configurations for the data stream (default: false)
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function getDataLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_lifecycle';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','include_defaults','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_data_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream lifecycle stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-lifecycle-stats
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
	public function getDataLifecycleStats(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_lifecycle/stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'indices.get_data_lifecycle_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data streams
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-stream
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     include_defaults?: bool, // Return all relevant default configurations for the data stream (default: false)
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     verbose?: bool, // Whether the maximum timestamp for each data stream should be calculated and returned (default: false)
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
	public function getDataStream(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_data_stream/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_data_stream';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['expand_wildcards','include_defaults','master_timeout','verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-stream-mappings
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams or data stream patterns. Supports wildcards (`*`).
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node
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
	public function getDataStreamMappings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_mappings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_data_stream_mappings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream options
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-stream-options
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function getDataStreamOptions(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_options';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_data_stream_options');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data stream settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-data-stream-settings
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams or data stream patterns. Supports wildcards (`*`).
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node
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
	public function getDataStreamSettings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_settings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_data_stream_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get mapping definitions
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-mapping
	 *
	 * @param array{
	 *     fields: string|array<string>, // (REQUIRED) A comma-separated list of fields
	 *     index?: string|array<string>, // A comma-separated list of index names
	 *     include_defaults?: bool, // Whether the default mapping values should be returned as well
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function getFieldMapping(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['fields'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_mapping/field/' . $this->encode($this->convertValue($params['fields']));
			$method = 'GET';
		} else {
			$url = '/_mapping/field/' . $this->encode($this->convertValue($params['fields']));
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['include_defaults','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['fields', 'index'], $request, 'indices.get_field_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-index-template
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string, // A pattern that returned template names must match
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     include_defaults?: bool, // Return all relevant default configurations for the index template (default: false)
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
	public function getIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_index_template/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_index_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_index_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get mapping definitions
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-mapping
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
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
	public function getMapping(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_mapping';
			$method = 'GET';
		} else {
			$url = '/_mapping';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the migration reindexing status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/group/endpoint-migration
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) Comma-separated list of index or data stream names.
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
	public function getMigrateReindexStatus(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/_migration/reindex/' . $this->encode($this->convertValue($params['index'])) . '/_status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get_migrate_reindex_status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get random sample of ingested data
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of a data stream or index
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
	public function getSample(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_sample';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get_sample');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get sampling configuration for an index or data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of a data stream or index
	 *     master_timeout?: int|string, // Timeout for connection to master node
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
	public function getSampleConfiguration(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_sample/config';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get_sample_configuration');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get stats about a random sample of ingested data
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of a data stream or index
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
	public function getSampleStats(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_sample/stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.get_sample_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-settings
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     name?: string|array<string>, // The name of the settings that should be included
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     include_defaults?: bool, // Whether to return all default setting for each of the indices.
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
		if (isset($params['index']) && isset($params['name'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_settings/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_settings';
			$method = 'GET';
		} elseif (isset($params['name'])) {
			$url = '/_settings/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_settings';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','local','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'name'], $request, 'indices.get_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get legacy index templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-get-template
	 *
	 * @param array{
	 *     name?: string|array<string>, // The comma separated names of the index templates
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
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
	public function getTemplate(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_template/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.get_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reindex legacy backing indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-migrate-reindex
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The body contains the fields `mode` and `source.index, where the only mode currently supported is `upgrade`, and the `source.index` must be a data stream name. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function migrateReindex(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_migration/reindex';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'indices.migrate_reindex');
		return $this->client->sendRequest($request);
	}


	/**
	 * Convert an index alias to a data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-migrate-to-data-stream
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the alias to migrate
	 *     timeout?: int|string, // Specify timeout for acknowledging the cluster state update
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function migrateToDataStream(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/_migrate/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.migrate_to_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update data streams
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-modify-data-stream
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data stream modifications. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function modifyDataStream(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_data_stream/_modify';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'indices.modify_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Open a closed index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-open
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to open
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     wait_for_active_shards?: string, // Sets the number of active shards to wait for before the operation returns.
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
	public function open(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_open';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.open');
		return $this->client->sendRequest($request);
	}


	/**
	 * Promote a data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-promote-data-stream
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the data stream
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function promoteDataStream(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/_promote/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.promote_data_stream');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update an alias
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-alias
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names the alias should point to (supports wildcards); use `_all` to perform the operation on all indices.
	 *     name: string, // (REQUIRED) The name of the alias to be created or updated
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The settings for the alias, such as `routing` or `filter`. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAlias(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','name'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_alias/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'name'], $request, 'indices.put_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update data stream lifecycles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-data-lifecycle
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams whose lifecycle will be updated; use `*` to set the lifecycle to all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data stream lifecycle configuration that consist of the data retention. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_lifecycle';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_data_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update data stream mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-data-stream-mappings
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams or data stream patterns.
	 *     dry_run?: bool, // Whether this request should only be a dry run rather than actually applying mappings
	 *     timeout?: int|string, // Period to wait for a response
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data stream mappings to be updated. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataStreamMappings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_mappings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['dry_run','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_data_stream_mappings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update data stream options
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-data-stream-options
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams whose options will be updated; use `*` to set the options to all data streams
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data stream options configuration that consist of the failure store configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataStreamOptions(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_options';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_data_stream_options');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update data stream settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-data-stream-settings
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams or data stream patterns.
	 *     dry_run?: bool, // Whether this request should only be a dry run rather than actually applying settings
	 *     timeout?: int|string, // Period to wait for a response
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data stream settings to be updated. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataStreamSettings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_data_stream/' . $this->encode($this->convertValue($params['name'])) . '/_settings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['dry_run','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_data_stream_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update an index template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-index-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     create?: bool, // Whether the index template should only be added if new or can also replace an existing one
	 *     cause?: string, // User defined reason for creating/updating the index template
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function putIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_index_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update field mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-mapping
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     write_index_only?: bool, // When true, applies mappings only to the write index of an alias or data stream
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The mapping definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putMapping(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_mapping';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','write_index_only','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.put_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure sampling for an index or data stream
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of a data stream or index
	 *     master_timeout?: int|string, // Timeout for connection to master node
	 *     timeout?: int|string, // Timeout for the request
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The sampling configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putSampleConfiguration(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_sample/config';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.put_sample_configuration');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-settings
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     timeout?: int|string, // Explicit operation timeout
	 *     preserve_existing?: bool, // Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`
	 *     reopen?: bool, // Whether to close and reopen the index to apply non-dynamic settings. If set to `true` the indices to which the settings are being applied will be closed temporarily and then reopened in order to apply the changes. The default is `false`
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The index settings to be updated. If body is a string must be a valid JSON.
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
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_settings';
			$method = 'PUT';
		} else {
			$url = '/_settings';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','preserve_existing','reopen','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.put_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update a legacy index template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-put-template
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     order?: int, // The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)
	 *     create?: bool, // Whether the index template should only be added if new or can also replace an existing one
	 *     cause?: string, // User defined reason for creating/updating the index template
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	public function putTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['order','create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.put_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index recovery information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-recovery
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     detailed?: bool, // Whether to display detailed information about shard recovery
	 *     active_only?: bool, // Display only those recoveries that are currently on-going
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function recovery(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_recovery';
			$method = 'GET';
		} else {
			$url = '/_recovery';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['detailed','active_only','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.recovery');
		return $this->client->sendRequest($request);
	}


	/**
	 * Refresh an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-refresh
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function refresh(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_refresh';
			$method = 'POST';
		} else {
			$url = '/_refresh';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.refresh');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reload search analyzers
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-reload-search-analyzers
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to reload analyzers for
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     resource?: string, // changed resource to reload analyzers from if applicable
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
	public function reloadSearchAnalyzers(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_reload_search_analyzers';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','resource','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.reload_search_analyzers');
		return $this->client->sendRequest($request);
	}


	/**
	 * Remove an index block
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-remove-block
	 * @group serverless
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to remove a block from
	 *     block: string, // (REQUIRED) The block to remove (one of read, write, read_only or metadata)
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function removeBlock(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','block'], $params);
		$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_block/' . $this->encode($params['block']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'block'], $request, 'indices.remove_block');
		return $this->client->sendRequest($request);
	}


	/**
	 * Resolve the cluster
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-resolve-cluster
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of cluster:index names or wildcard expressions
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed). Only allowed when providing an index expression.
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled. Only allowed when providing an index expression.
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified). Only allowed when providing an index expression.
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open). Only allowed when providing an index expression.
	 *     timeout?: int|string, // The maximum time to wait for remote clusters to respond
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
	public function resolveCluster(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_resolve/cluster/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_resolve/cluster';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.resolve_cluster');
		return $this->client->sendRequest($request);
	}


	/**
	 * Resolve indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-resolve-index
	 * @group serverless
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of names or wildcard expressions
	 *     expand_wildcards?: string|array<string>, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     mode?: string|array<string>, // Filter indices by index mode. Comma-separated list of IndexMode. Empty means no filter.
	 *     project_routing?: string, // A Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
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
	public function resolveIndex(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_resolve/index/' . $this->encode($this->convertValue($params['name']));
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','ignore_unavailable','allow_no_indices','mode','project_routing','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.resolve_index');
		return $this->client->sendRequest($request);
	}


	/**
	 * Roll over to a new index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-rollover
	 * @group serverless
	 *
	 * @param array{
	 *     alias: string, // (REQUIRED) The name of the alias to rollover
	 *     new_index?: string, // The name of the rollover index
	 *     timeout?: int|string, // Explicit operation timeout
	 *     dry_run?: bool, // If set to true the rollover action will only be validated but not actually performed even if a condition matches. The default is false
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     wait_for_active_shards?: string, // Set the number of active shards to wait for on the newly created rollover index before the operation returns.
	 *     lazy?: bool, // If set to true, the rollover action will only mark a data stream to signal that it needs to be rolled over at the next write. Only allowed on data streams.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The conditions that needs to be met for executing rollover. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function rollover(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['alias'], $params);
		if (isset($params['new_index'])) {
			$url = '/' . $this->encode($params['alias']) . '/_rollover/' . $this->encode($params['new_index']);
			$method = 'POST';
		} else {
			$url = '/' . $this->encode($params['alias']) . '/_rollover';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout','dry_run','master_timeout','wait_for_active_shards','lazy','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['alias', 'new_index'], $request, 'indices.rollover');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index segments
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-segments
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function segments(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_segments';
			$method = 'GET';
		} else {
			$url = '/_segments';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.segments');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index shard stores
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-shard-stores
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     status?: string|array<string>, // A comma-separated list of statuses used to filter on shards to get store information for
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function shardStores(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_shard_stores';
			$method = 'GET';
		} else {
			$url = '/_shard_stores';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['status','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.shard_stores');
		return $this->client->sendRequest($request);
	}


	/**
	 * Shrink an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-shrink
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to shrink
	 *     target: string, // (REQUIRED) The name of the target index to shrink into
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     wait_for_active_shards?: string, // Set the number of active shards to wait for on the shrunken index before the operation returns.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The configuration for the target index (`settings` and `aliases`). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function shrink(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','target','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_shrink/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'target'], $request, 'indices.shrink');
		return $this->client->sendRequest($request);
	}


	/**
	 * Simulate an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-simulate-index-template
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the index (it must be a concrete index name)
	 *     create?: bool, // Whether the index template we optionally defined in the body should only be dry-run added if new or can also replace an existing one
	 *     cause?: string, // User defined reason for dry-run creating the new template for simulation purposes
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     include_defaults?: bool, // Return all relevant default configurations for this index template simulation (default: false)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // New index template definition, which will be included in the simulation, as if it already exists in the system. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function simulateIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/_simulate_index/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.simulate_index_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Simulate an index template
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-simulate-template
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string, // The name of the index template
	 *     create?: bool, // Whether the index template we optionally defined in the body should only be dry-run added if new or can also replace an existing one
	 *     cause?: string, // User defined reason for dry-run creating the new template for simulation purposes
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     include_defaults?: bool, // Return all relevant default configurations for this template simulation (default: false)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // New index template definition to be simulated, if no index template name is specified. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function simulateTemplate(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_index_template/_simulate/' . $this->encode($params['name']);
			$method = 'POST';
		} else {
			$url = '/_index_template/_simulate';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.simulate_template');
		return $this->client->sendRequest($request);
	}


	/**
	 * Split an index
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-split
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to split
	 *     target: string, // (REQUIRED) The name of the target index to split into
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     wait_for_active_shards?: string, // Set the number of active shards to wait for on the shrunken index before the operation returns.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The configuration for the target index (`settings` and `aliases`). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function split(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','target','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_split/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index', 'target'], $request, 'indices.split');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index statistics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-stats
	 *
	 * @param array{
	 *     metric?: string|array<string>, // Limit the information returned the specific metrics.
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     completion_fields?: string|array<string>, // A comma-separated list of fields for the `completion` index metric (supports wildcards)
	 *     fielddata_fields?: string|array<string>, // A comma-separated list of fields for the `fielddata` index metric (supports wildcards)
	 *     fields?: string|array<string>, // A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)
	 *     groups?: string|array<string>, // A comma-separated list of search groups for `search` index metric
	 *     level?: string, // Return stats aggregated at cluster, index or shard level
	 *     include_segment_file_sizes?: bool, // Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested)
	 *     include_unloaded_segments?: bool, // If set to true segment stats will include stats for segments that are not currently loaded into memory
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     forbid_closed_indices?: bool, // If set to false stats will also collected from closed indices if explicitly specified or if expand_wildcards expands to closed indices
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
		if (isset($params['index']) && isset($params['metric'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_stats/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_stats/' . $this->encode($this->convertValue($params['metric']));
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['completion_fields','fielddata_fields','fields','groups','level','include_segment_file_sizes','include_unloaded_segments','expand_wildcards','forbid_closed_indices','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['metric', 'index'], $request, 'indices.stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update an alias
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-update-aliases
	 * @group serverless
	 *
	 * @param array{
	 *     timeout?: int|string, // Request timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The definition of `actions` to perform. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateAliases(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_aliases';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'indices.update_aliases');
		return $this->client->sendRequest($request);
	}


	/**
	 * Validate a query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-indices-validate-query
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
	 *     explain?: bool, // Return detailed information about the error
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     q?: string, // Query in the Lucene query string syntax
	 *     analyzer?: string, // The analyzer to use for the query string
	 *     analyze_wildcard?: bool, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator?: string, // The default operator for query string query (AND or OR)
	 *     df?: string, // The field to use as default where no field prefix is given in the query string
	 *     lenient?: bool, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     rewrite?: bool, // Provide a more detailed explanation showing the actual Lucene query that will be executed.
	 *     all_shards?: bool, // Execute validation on all shards instead of one random shard per index
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The query definition specified with the Query DSL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function validateQuery(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/' . $this->encode($this->convertValue($params['index'])) . '/_validate/query';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_validate/query';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['explain','ignore_unavailable','allow_no_indices','expand_wildcards','q','analyzer','analyze_wildcard','default_operator','df','lenient','rewrite','all_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.validate_query');
		return $this->client->sendRequest($request);
	}
}
