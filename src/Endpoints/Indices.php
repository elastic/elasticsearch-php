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
	 *     index: list, // (REQUIRED) A comma separated list of indices to add a block to
	 *     block: string, // (REQUIRED) The block to add (one of read, write, read_only or metadata)
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
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
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function addBlock(array $params = [])
	{
		$this->checkRequiredParameters(['index','block'], $params);
		$url = '/' . $this->encode($params['index']) . '/_block/' . $this->encode($params['block']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Performs the analysis process on a text and return the tokens breakdown of the text.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-analyze.html
	 *
	 * @param array{
	 *     index: string, //  The name of the index to scope the operation
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  Define analyzer/tokenizer parameters and the text on which the analysis should be performed
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function analyze(array $params = [])
	{
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Clears all or specific caches for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clearcache.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index name to limit the operation
	 *     fielddata: boolean, // Clear field data
	 *     fields: list, // A comma-separated list of fields to clear when using the `fielddata` parameter (default: all)
	 *     query: boolean, // Clear query caches
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     request: boolean, // Clear request cache
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
	public function clearCache(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_cache/clear';
			$method = 'POST';
		} else {
			$url = '/_cache/clear';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['fielddata','fields','query','ignore_unavailable','allow_no_indices','expand_wildcards','request','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Clones an index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-clone-index.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to clone
	 *     target: string, // (REQUIRED) The name of the target index to clone into
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     wait_for_active_shards: string, // Set the number of active shards to wait for on the cloned index before the operation returns.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The configuration for the target index (`settings` and `aliases`)
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clone(array $params = [])
	{
		$this->checkRequiredParameters(['index','target'], $params);
		$url = '/' . $this->encode($params['index']) . '/_clone/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Closes an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma separated list of indices to close
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     wait_for_active_shards: string, // Sets the number of active shards to wait for before the operation returns.
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
	public function close(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_close';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates an index with optional settings and mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-create-index.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index
	 *     wait_for_active_shards: string, // Set the number of active shards to wait for before the operation returns.
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The configuration for the index (`settings` and `mappings`)
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function create(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['wait_for_active_shards','timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the data stream
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
	public function createDataStream(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Provides statistics on operations happening in a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of data stream names; use `_all` or empty string to perform the operation on all data streams
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
	public function dataStreamsStats(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_data_stream/' . $this->encode($params['name']) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_data_stream/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-delete-index.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of indices to delete; use `_all` or `*` string to delete all indices
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices: boolean, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open, closed, or hidden indices
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
	public function delete(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names (supports wildcards); use `_all` for all indices
	 *     name: list, // (REQUIRED) A comma-separated list of aliases to delete (supports wildcards); use `_all` to delete all aliases for the specified indices.
	 *     timeout: time, // Explicit timestamp for the document
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
	public function deleteAlias(array $params = [])
	{
		$this->checkRequiredParameters(['index','name'], $params);
		$url = '/' . $this->encode($params['index']) . '/_alias/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes a data stream.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: list, // (REQUIRED) A comma-separated list of data streams to delete; use `*` to delete all data streams
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	public function deleteDataStream(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
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
	public function deleteIndexTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Deletes an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
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
	public function deleteTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_template/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Analyzes the disk usage of each field of an index or data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-disk-usage.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) Comma-separated list of indices or data streams to analyze the disk usage
	 *     run_expensive_tasks: boolean, // Must be set to [true] in order for the task to be performed. Defaults to false.
	 *     flush: boolean, // Whether flush or not before analyzing the index disk usage. Defaults to true
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
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function diskUsage(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_disk_usage';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['run_expensive_tasks','flush','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
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
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The downsampling configuration
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function downsample(array $params = [])
	{
		$this->checkRequiredParameters(['index','target_index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_downsample/' . $this->encode($params['target_index']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about whether a particular index exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-exists.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices: boolean, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     include_defaults: boolean, // Whether to return all default setting for each of the indices.
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
	public function exists(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['local','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about whether a particular alias exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     name: list, // (REQUIRED) A comma-separated list of alias names to return
	 *     index: list, //  A comma-separated list of index names to filter aliases
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function existsAlias(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_alias/' . $this->encode($params['name']);
			$method = 'HEAD';
		} else {
			$url = '/_alias/' . $this->encode($params['name']);
			$method = 'HEAD';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
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
	public function existsIndexTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about whether a particular index template exists.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: list, // (REQUIRED) The comma separated names of the index templates
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
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
	public function existsTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_template/' . $this->encode($params['name']);
		$method = 'HEAD';

		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns the field usage stats for each field of an index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/field-usage-stats.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     fields: list, // A comma-separated list of fields to include in the stats if only a subset of fields should be returned (supports wildcards)
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
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function fieldUsageStats(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_field_usage_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['fields','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Performs the flush operation on one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-flush.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string for all indices
	 *     force: boolean, // Whether a flush should be forced even if it is not necessarily needed ie. if no changes will be committed to the index. This is useful if transaction log IDs should be incremented even if no uncommitted changes are present. (This setting can be considered as internal)
	 *     wait_if_ongoing: boolean, // If set to true the flush operation will block until the flush can be executed if another flush operation is already executing. The default is true. If set to false the flush will be skipped iff if another flush operation is already running.
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
	public function flush(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_flush';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_flush';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['force','wait_if_ongoing','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Performs the force merge operation on one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-forcemerge.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     flush: boolean, // Specify whether the index should be flushed after performing the operation (default: true)
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     max_num_segments: number, // The number of segments the index should be merged into (default: dynamic)
	 *     only_expunge_deletes: boolean, // Specify whether the operation should only expunge deleted documents
	 *     wait_for_completion: boolean, // Should the request wait until the force merge is completed.
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
	public function forcemerge(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_forcemerge';
			$method = 'POST';
		} else {
			$url = '/_forcemerge';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['flush','ignore_unavailable','allow_no_indices','expand_wildcards','max_num_segments','only_expunge_deletes','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-index.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices: boolean, // Ignore if a wildcard expression resolves to no concrete indices (default: false)
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
	 *     features: enum, // Return only information on specified index features
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     include_defaults: boolean, // Whether to return all default setting for each of the indices.
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
	public function get(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['local','ignore_unavailable','allow_no_indices','expand_wildcards','features','flat_settings','include_defaults','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of alias names to return
	 *     index: list, //  A comma-separated list of index names to filter aliases
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function getAlias(array $params = [])
	{
		if (isset($params['index']) && isset($params['name'])) {
			$url = '/' . $this->encode($params['index']) . '/_alias/' . $this->encode($params['name']);
			$method = 'GET';
		} elseif (isset($params['name'])) {
			$url = '/_alias/' . $this->encode($params['name']);
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_alias';
			$method = 'GET';
		} else {
			$url = '/_alias';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns data streams.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: list, //  A comma-separated list of data streams to get; use `*` to get all data streams
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	public function getDataStream(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_data_stream/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_data_stream';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns mapping for one or more fields.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-field-mapping.html
	 *
	 * @param array{
	 *     fields: list, // (REQUIRED) A comma-separated list of fields
	 *     index: list, //  A comma-separated list of index names
	 *     include_defaults: boolean, // Whether the default mapping values should be returned as well
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
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
	public function getFieldMapping(array $params = [])
	{
		$this->checkRequiredParameters(['fields'], $params);
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_mapping/field/' . $this->encode($params['fields']);
			$method = 'GET';
		} else {
			$url = '/_mapping/field/' . $this->encode($params['fields']);
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['include_defaults','ignore_unavailable','allow_no_indices','expand_wildcards','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, //  A pattern that returned template names must match
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
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
	public function getIndexTemplate(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_index_template/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_index_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns mappings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-mapping.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout: time, // Specify timeout for connection to master
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
	public function getMapping(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_mapping';
			$method = 'GET';
		} else {
			$url = '/_mapping';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns settings for one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-get-settings.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     name: list, //  The name of the settings that should be included
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     local: boolean, // Return local information, do not retrieve the state from master node (default: false)
	 *     include_defaults: boolean, // Whether to return all default setting for each of the indices.
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
		if (isset($params['index']) && isset($params['name'])) {
			$url = '/' . $this->encode($params['index']) . '/_settings/' . $this->encode($params['name']);
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_settings';
			$method = 'GET';
		} elseif (isset($params['name'])) {
			$url = '/_settings/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_settings';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','local','include_defaults','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: list, //  The comma separated names of the index templates
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
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
	public function getTemplate(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_template/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_template';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['flat_settings','master_timeout','local','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Migrates an alias to a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the alias to migrate
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
	public function migrateToDataStream(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/_migrate/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Modifies a data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The data stream modifications
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function modifyDataStream(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_data_stream/_modify';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Opens an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-open-close.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma separated list of indices to open
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     wait_for_active_shards: string, // Sets the number of active shards to wait for before the operation returns.
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
	public function open(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_open';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Promotes a data stream from a replicated data stream managed by CCR to a regular data stream
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/data-streams.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the data stream
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
	public function promoteDataStream(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_data_stream/_promote/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates or updates an alias.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names the alias should point to (supports wildcards); use `_all` to perform the operation on all indices.
	 *     name: string, // (REQUIRED) The name of the alias to be created or updated
	 *     timeout: time, // Explicit timestamp for the document
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The settings for the alias, such as `routing` or `filter`
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAlias(array $params = [])
	{
		$this->checkRequiredParameters(['index','name'], $params);
		$url = '/' . $this->encode($params['index']) . '/_alias/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     create: boolean, // Whether the index template should only be added if new or can also replace an existing one
	 *     cause: string, // User defined reason for creating/updating the index template
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
	public function putIndexTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_index_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates the index mappings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-put-mapping.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names the mapping should be added to (supports wildcards); use `_all` or omit to add the mapping on all indices.
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     write_index_only: boolean, // When true, applies mappings only to the write index of an alias or data stream
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The mapping definition
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putMapping(array $params = [])
	{
		$this->checkRequiredParameters(['index','body'], $params);
		$url = '/' . $this->encode($params['index']) . '/_mapping';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','write_index_only','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates the index settings.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-update-settings.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     timeout: time, // Explicit operation timeout
	 *     preserve_existing: boolean, // Whether to update existing settings. If set to `true` existing settings on an index remain unchanged, the default is `false`
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     flat_settings: boolean, // Return settings in flat format (default: false)
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The index settings to be updated
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
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_settings';
			$method = 'PUT';
		} else {
			$url = '/_settings';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','preserve_existing','ignore_unavailable','allow_no_indices','expand_wildcards','flat_settings','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Creates or updates an index template.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the template
	 *     order: number, // The order for this template when merging multiple matching ones (higher numbers are merged later, overriding the lower numbers)
	 *     create: boolean, // Whether the index template should only be added if new or can also replace an existing one
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
	public function putTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_template/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['order','create','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about ongoing index shard recoveries.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-recovery.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     detailed: boolean, // Whether to display detailed information about shard recovery
	 *     active_only: boolean, // Display only those recoveries that are currently on-going
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
	public function recovery(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_recovery';
			$method = 'GET';
		} else {
			$url = '/_recovery';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['detailed','active_only','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Performs the refresh operation in one or more indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-refresh.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
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
	public function refresh(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_refresh';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_refresh';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Reloads an index's search analyzers and their resources.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-reload-analyzers.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names to reload analyzers for
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
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function reloadSearchAnalyzers(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_reload_search_analyzers';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Returns information about any matching indices, aliases, and data streams
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-resolve-index-api.html
	 *
	 * @param array{
	 *     name: list, // (REQUIRED) A comma-separated list of names or wildcard expressions
	 *     expand_wildcards: enum, // Whether wildcard expressions should get expanded to open or closed indices (default: open)
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
	public function resolveIndex(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_resolve/index/' . $this->encode($params['name']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates an alias to point to a new index when the existing index
	 * is considered to be too large or too old.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-rollover-index.html
	 *
	 * @param array{
	 *     alias: string, // (REQUIRED) The name of the alias to rollover
	 *     new_index: string, //  The name of the rollover index
	 *     timeout: time, // Explicit operation timeout
	 *     dry_run: boolean, // If set to true the rollover action will only be validated but not actually performed even if a condition matches. The default is false
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     wait_for_active_shards: string, // Set the number of active shards to wait for on the newly created rollover index before the operation returns.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The conditions that needs to be met for executing rollover
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function rollover(array $params = [])
	{
		$this->checkRequiredParameters(['alias'], $params);
		if (isset($params['new_index'])) {
			$url = '/' . $this->encode($params['alias']) . '/_rollover/' . $this->encode($params['new_index']);
			$method = 'POST';
		} else {
			$url = '/' . $this->encode($params['alias']) . '/_rollover';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout','dry_run','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Provides low-level information about segments in a Lucene index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-segments.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     verbose: boolean, // Includes detailed memory usage by Lucene.
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
	public function segments(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_segments';
			$method = 'GET';
		} else {
			$url = '/_segments';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','expand_wildcards','verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Provides store information for shard copies of indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shards-stores.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     status: list, // A comma-separated list of statuses used to filter on shards to get store information for
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
	public function shardStores(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_shard_stores';
			$method = 'GET';
		} else {
			$url = '/_shard_stores';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['status','ignore_unavailable','allow_no_indices','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Allow to shrink an existing index into a new index with fewer primary shards.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-shrink-index.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to shrink
	 *     target: string, // (REQUIRED) The name of the target index to shrink into
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     wait_for_active_shards: string, // Set the number of active shards to wait for on the shrunken index before the operation returns.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The configuration for the target index (`settings` and `aliases`)
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function shrink(array $params = [])
	{
		$this->checkRequiredParameters(['index','target'], $params);
		$url = '/' . $this->encode($params['index']) . '/_shrink/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Simulate matching the given index name against the index templates in the system
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the index (it must be a concrete index name)
	 *     create: boolean, // Whether the index template we optionally defined in the body should only be dry-run added if new or can also replace an existing one
	 *     cause: string, // User defined reason for dry-run creating the new template for simulation purposes
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  New index template definition, which will be included in the simulation, as if it already exists in the system
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function simulateIndexTemplate(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_index_template/_simulate_index/' . $this->encode($params['name']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Simulate resolving the given template name or body
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-templates.html
	 *
	 * @param array{
	 *     name: string, //  The name of the index template
	 *     create: boolean, // Whether the index template we optionally defined in the body should only be dry-run added if new or can also replace an existing one
	 *     cause: string, // User defined reason for dry-run creating the new template for simulation purposes
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  New index template definition to be simulated, if no index template name is specified
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function simulateTemplate(array $params = [])
	{
		if (isset($params['name'])) {
			$url = '/_index_template/_simulate/' . $this->encode($params['name']);
			$method = 'POST';
		} else {
			$url = '/_index_template/_simulate';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['create','cause','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Allows you to split an existing index into a new index with more primary shards.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-split-index.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the source index to split
	 *     target: string, // (REQUIRED) The name of the target index to split into
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     wait_for_active_shards: string, // Set the number of active shards to wait for on the shrunken index before the operation returns.
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The configuration for the target index (`settings` and `aliases`)
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function split(array $params = [])
	{
		$this->checkRequiredParameters(['index','target'], $params);
		$url = '/' . $this->encode($params['index']) . '/_split/' . $this->encode($params['target']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Provides statistics on operations happening in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-stats.html
	 *
	 * @param array{
	 *     metric: list, //  Limit the information returned the specific metrics.
	 *     index: list, //  A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
	 *     completion_fields: list, // A comma-separated list of fields for the `completion` index metric (supports wildcards)
	 *     fielddata_fields: list, // A comma-separated list of fields for the `fielddata` index metric (supports wildcards)
	 *     fields: list, // A comma-separated list of fields for `fielddata` and `completion` index metric (supports wildcards)
	 *     groups: list, // A comma-separated list of search groups for `search` index metric
	 *     level: enum, // Return stats aggregated at cluster, index or shard level
	 *     include_segment_file_sizes: boolean, // Whether to report the aggregated disk usage of each one of the Lucene index files (only applies if segment stats are requested)
	 *     include_unloaded_segments: boolean, // If set to true segment stats will include stats for segments that are not currently loaded into memory
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     forbid_closed_indices: boolean, // If set to false stats will also collected from closed indices if explicitly specified or if expand_wildcards expands to closed indices
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
		if (isset($params['index']) && isset($params['metric'])) {
			$url = '/' . $this->encode($params['index']) . '/_stats/' . $this->encode($params['metric']);
			$method = 'GET';
		} elseif (isset($params['metric'])) {
			$url = '/_stats/' . $this->encode($params['metric']);
			$method = 'GET';
		} elseif (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['completion_fields','fielddata_fields','fields','groups','level','include_segment_file_sizes','include_unloaded_segments','expand_wildcards','forbid_closed_indices','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Unfreezes an index. When a frozen index is unfrozen, the index goes through the normal recovery process and becomes writeable again.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/unfreeze-index-api.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to unfreeze
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     wait_for_active_shards: string, // Sets the number of active shards to wait for before the operation returns.
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
	public function unfreeze(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_unfreeze';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','ignore_unavailable','allow_no_indices','expand_wildcards','wait_for_active_shards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Updates index aliases.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-aliases.html
	 *
	 * @param array{
	 *     timeout: time, // Request timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The definition of `actions` to perform
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateAliases(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_aliases';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}


	/**
	 * Allows a user to validate a potentially expensive query without executing it.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/search-validate.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names to restrict the operation; use `_all` or empty string to perform the operation on all indices
	 *     explain: boolean, // Return detailed information about the error
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     q: string, // Query in the Lucene query string syntax
	 *     analyzer: string, // The analyzer to use for the query string
	 *     analyze_wildcard: boolean, // Specify whether wildcard and prefix queries should be analyzed (default: false)
	 *     default_operator: enum, // The default operator for query string query (AND or OR)
	 *     df: string, // The field to use as default where no field prefix is given in the query string
	 *     lenient: boolean, // Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
	 *     rewrite: boolean, // Provide a more detailed explanation showing the actual Lucene query that will be executed.
	 *     all_shards: boolean, // Execute validation on all shards instead of one random shard per index
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The query definition specified with the Query DSL
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function validateQuery(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . $this->encode($params['index']) . '/_validate/query';
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
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
