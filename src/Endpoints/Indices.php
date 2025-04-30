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
	 * Adds a block to an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/index-modules-blocks.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to add a block to
	 *     block: string, // (REQUIRED) The block to add (one of read, write, read_only or metadata)
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Performs the analysis process on a text and return the tokens breakdown of the text.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-analyze.html
	 *
	 * @param array{
	 *     index?: string, // The name of the index to scope the operation
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Define analyzer/tokenizer parameters and the text on which the analysis should be performed. If body is a string must be a valid JSON.
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
	 * Clears all or specific caches for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clearcache.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index name to limit the operation
	 *     fielddata?: bool, // Clear field data
	 *     fields?: string|array<string>, // A comma-separated list of fields to clear when using the `fielddata` parameter (default: all)
	 *     query?: bool, // Clear query caches
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Clones an index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clone-index.html
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
	 * Closes an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to close
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Creates an index with optional settings and mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-create-index.html
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
	 * Creates a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
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
	 * Provides statistics on operations happening in a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of data stream names; use `_all` or empty string to perform the operation on all data streams
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
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.data_streams_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open, closed, or hidden indices
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
	 * Deletes an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
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
	 * Deletes the data stream lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-delete-lifecycle.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams of which the data stream lifecycle will be deleted; use `*` to get all data streams
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	 * Deletes a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams to delete; use `*` to delete all data streams
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-template.html
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
	public function deleteIndexTemplate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
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
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-template-v1.html
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
	 * Analyzes the disk usage of each field of an index or data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-disk-usage.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) Comma-separated list of indices or data streams to analyze the disk usage
	 *     run_expensive_tasks?: bool, // Must be set to [true] in order for the task to be performed. Defaults to false.
	 *     flush?: bool, // Whether flush or not before analyzing the index disk usage. Defaults to true
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = '/' . $this->encode($params['index']) . '/_disk_usage';
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
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/xpack-rollup.html
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
	 * Returns information about whether a particular index exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	 * Returns information about whether a particular alias exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of alias names to return
	 *     index?: string|array<string>, // A comma-separated list of index names to filter aliases
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name', 'index'], $request, 'indices.exists_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/index-templates.html
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
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-template-exists-v1.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) The comma separated names of the index templates
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
	 * Retrieves information about the index's current data stream lifecycle, such as any potential encountered error, time since creation etc.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/data-streams-explain-lifecycle.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to explain
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
		$url = '/' . $this->encode($params['index']) . '/_lifecycle/explain';
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
	 * Returns the field usage stats for each field of an index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/field-usage-stats.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     fields?: string|array<string>, // A comma-separated list of fields to include in the stats if only a subset of fields should be returned (supports wildcards)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = '/' . $this->encode($params['index']) . '/_field_usage_stats';
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
	 * Performs the flush operation on one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-flush.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string for all indices
	 *     force?: bool, // Whether a flush should be forced even if it is not necessarily needed ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if no uncommitted changes are present. (This setting can be considered as internal)
	 *     wait_if_ongoing?: bool, // If set to true the flush operation will block until the flush can be executed if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running.
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Performs the force merge operation on one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-forcemerge.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     flush?: bool, // Specify whether the index should be flushed after performing the operation (default: true)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Returns information about one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-index.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     features?: string, // Return only information on specified index features
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
	 * Returns an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of alias names to return
	 *     index?: string|array<string>, // A comma-separated list of index names to filter aliases
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name', 'index'], $request, 'indices.get_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns the data stream lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-get-lifecycle.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	 * Get data stream lifecycle statistics.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-get-lifecycle-stats.html
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
	 * Returns data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	 * Returns mapping for one or more fields.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-field-mapping.html
	 *
	 * @param array{
	 *     fields: string|array<string>, // (REQUIRED) A comma-separated list of fields
	 *     index?: string|array<string>, // A comma-separated list of index names
	 *     include_defaults?: bool, // Whether the default mapping values should be returned as well
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
		$url = $this->addQueryString($url, $params, ['include_defaults','ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['fields', 'index'], $request, 'indices.get_field_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-template.html
	 *
	 * @param array{
	 *     name?: string, // A pattern that returned template names must match
	 *     flat_settings?: bool, // Return settings in flat format (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
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
	 * Returns mappings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Specify timeout for connection to master
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
	 * Returns settings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     name?: string|array<string>, // The name of the settings that should be included
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-template-v1.html
	 *
	 * @param array{
	 *     name?: string|array<string>, // The comma separated names of the index templates
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
	 * Migrates an alias to a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
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
	 * Modifies a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
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
	 * Opens an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma separated list of indices to open
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Promotes a data stream from a replicated data stream managed by CCR to a regular data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
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
	 * Creates or updates an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
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
	 * Updates the data stream lifecycle of the selected data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams-put-lifecycle.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data streams whose lifecycle will be updated; use `*` to set the lifecycle to all data streams
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     timeout?: int|string, // Explicit timestamp for the document
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The data stream lifecycle configuration that consist of the data retention. If body is a string must be a valid JSON.
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
		$this->checkRequiredParameters(['name'], $params);
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
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-template.html
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
	 * Updates the index mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Updates the index settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     timeout?: int|string, // Explicit operation timeout
	 *     preserve_existing?: bool, // Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`
	 *     reopen?: bool, // Whether to close and reopen the index to apply non-dynamic settings. If set to `true` the indices to which the settings are being applied will be closed temporarily and then reopened in order to apply the changes. The default is `false`
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates-v1.html
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
	 * Returns information about ongoing index shard recoveries.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-recovery.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     detailed?: bool, // Whether to display detailed information about shard recovery
	 *     active_only?: bool, // Display only those recoveries that are currently on-going
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
		$url = $this->addQueryString($url, $params, ['detailed','active_only','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.recovery');
		return $this->client->sendRequest($request);
	}


	/**
	 * Performs the refresh operation in one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-refresh.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Reloads an index's search analyzers and their resources.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-reload-analyzers.html
	 *
	 * @param array{
	 *     index: string|array<string>, // (REQUIRED) A comma-separated list of index names to reload analyzers for
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Resolves the specified index expressions to return information about each cluster. If no index expression is provided, this endpoint will return information about all the remote clusters that are configured on the local cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-cluster-api.html
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of cluster:index names or wildcard expressions
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed). Only allowed when providing an index expression.
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled. Only allowed when providing an index expression.
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified). Only allowed when providing an index expression.
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open). Only allowed when providing an index expression.
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
	 * Returns information about any matching indices, aliases, and data streams
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-index-api.html
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of names or wildcard expressions
	 *     expand_wildcards?: string, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
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

		$url = $this->addQueryString($url, $params, ['expand_wildcards','ignore_unavailable','allow_no_indices','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'indices.resolve_index');
		return $this->client->sendRequest($request);
	}


	/**
	 * Updates an alias to point to a new index when the existing index
	 * is considered to be too large or too old.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-rollover-index.html
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
	 * Provides low-level information about segments in a Lucene index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-segments.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     verbose?: bool, // Includes detailed memory usage by Lucene.
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
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.segments');
		return $this->client->sendRequest($request);
	}


	/**
	 * Provides store information for shard copies of indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shards-stores.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     status?: string|array<string>, // A comma-separated list of statuses used to filter on shards to get store information for
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Allow to shrink an existing index into a new index with fewer primary shards.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shrink-index.html
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
	public function shrink(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','target'], $params);
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
	 * Simulate matching the given index name against the index templates in the system
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-simulate-index.html
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
	 * Simulate resolving the given template name or body
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-simulate-template.html
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
	 * Allows you to split an existing index into a new index with more primary shards.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-split-index.html
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
	public function split(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','target'], $params);
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
	 * Provides statistics on operations happening in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-stats.html
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
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	 * Unfreezes an index. When a frozen index is unfrozen, the index goes through the normal recovery process and becomes writeable again.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/unfreeze-index-api.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to unfreeze
	 *     timeout?: int|string, // Explicit operation timeout
	 *     master_timeout?: int|string, // Specify timeout for connection to master
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function unfreeze(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_unfreeze';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'indices.unfreeze');
		return $this->client->sendRequest($request);
	}


	/**
	 * Updates index aliases.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
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
	 * Allows a user to validate a potentially expensive query without executing it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
	 *     explain?: bool, // Return detailed information about the error
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards?: string, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
