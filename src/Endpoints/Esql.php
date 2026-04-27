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
class Esql extends AbstractEndpoint
{
	/**
	 * Run an async ES|QL query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-async-query
	 *
	 * @param array{
	 *     format?: string, // A short version of the Accept header, e.g. json, yaml.  `csv`, `tsv`, and `txt` formats will return results in a tabular format, excluding other metadata fields from the response.  For async requests, nothing will be returned if the async query doesn't finish within the timeout. The query ID and running status are available in the `X-Elasticsearch-Async-Id` and `X-Elasticsearch-Async-Is-Running` HTTP headers of the response, respectively.
	 *     delimiter?: string, // The character to use between values within a CSV row. It is valid only for the CSV format. (DEFAULT: ,)
	 *     drop_null_columns?: bool, // Indicates whether columns that are entirely `null` will be removed from the `columns` and `values` portion of the results. If `true`, the response will include an extra section under the name `all_columns` which has the name of all the columns.
	 *     allow_partial_results?: bool, // If `true`, partial results will be returned if there are shard failures, but the query can continue to execute on other clusters and shards. If `false`, the query will fail if there are any failures.  To override the default behavior, you can set the `esql.query.allow_partial_results` cluster setting to `false`. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Use the `query` element to start a query. Use `columnar` to format the answer.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function asyncQuery(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_query/async';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['format','delimiter','drop_null_columns','allow_partial_results','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'esql.async_query');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an async ES|QL query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-async-query-delete
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async query ID
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
	public function asyncQueryDelete(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_query/async/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'esql.async_query_delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get async ES|QL query results
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-async-query-get
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async query ID
	 *     format?: string, // A short version of the Accept header, for example `json` or `yaml`.
	 *     wait_for_completion_timeout?: int|string, // The period to wait for the request to finish. By default, the request waits for complete query results. If the request completes during the period specified in this parameter, complete query results are returned. Otherwise, the response returns an `is_running` value of `true` and no results.
	 *     keep_alive?: int|string, // The period for which the query and its results are stored in the cluster. When this period expires, the query and its results are deleted, even if the query is still ongoing.
	 *     drop_null_columns?: bool, // Indicates whether columns that are entirely `null` will be removed from the `columns` and `values` portion of the results. If `true`, the response will include an extra section under the name `all_columns` which has the name of all the columns.
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
	public function asyncQueryGet(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_query/async/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','wait_for_completion_timeout','keep_alive','drop_null_columns','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'esql.async_query_get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop async ES|QL query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-async-query-stop
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The async query ID
	 *     drop_null_columns?: bool, // Indicates whether columns that are entirely `null` will be removed from the `columns` and `values` portion of the results. If `true`, the response will include an extra section under the name `all_columns` which has the name of all the columns.
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
	public function asyncQueryStop(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_query/async/' . $this->encode($params['id']) . '/stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['drop_null_columns','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'esql.async_query_stop');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete one or more ES|QL data sources. Fails with 409 if any dataset references them.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-data-source-delete
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of data sources to delete
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
	public function deleteDataSource(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_query/data_source/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.delete_data_source');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete one or more ES|QL datasets.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-dataset-delete
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of datasets to delete
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
	public function deleteDataset(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_query/dataset/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.delete_dataset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a non-materialized VIEW for ESQL.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-view-delete
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the view to delete
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
	public function deleteView(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_query/view/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.delete_view');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get one or more ES|QL data sources. Secret setting values are returned masked.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-data-source-get
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of data source names or wildcard patterns
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
	public function getDataSource(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_query/data_source/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_query/data_source';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.get_data_source');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get one or more ES|QL datasets.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-dataset-get
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of dataset names or wildcard patterns
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
	public function getDataset(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_query/dataset/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_query/dataset';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.get_dataset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a specific running ES|QL query information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-get-query
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The query ID
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
	public function getQuery(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_query/queries/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'esql.get_query');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a non-materialized VIEW for ESQL.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-view-get
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of view names
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
	public function getView(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_query/view/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_query/view';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.get_view');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get running ES|QL queries information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-list-queries
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
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
	public function listQueries(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_query/queries';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'esql.list_queries');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or replaces an ES|QL data source.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-data-source-put
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the data source to create or update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Data source definition: type, optional description, and type-specific settings map.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataSource(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_query/data_source/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.put_data_source');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or replaces an ES|QL dataset referencing a parent data source.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-dataset-put
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the dataset to create or update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Dataset definition: parent data_source name, resource path, optional description, and type-specific settings.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataset(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_query/dataset/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.put_dataset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates a non-materialized VIEW for ESQL.
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-esql-view-put
	 * @group serverless
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the view to create or update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Use the `query` element to define the ES|QL query to use as a non-materialized VIEW.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putView(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_query/view/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'esql.put_view');
		return $this->client->sendRequest($request);
	}


	/**
	 * Run an ES|QL query
	 *
	 * @link https://www.elastic.co/docs/explore-analyze/query-filter/languages/esql-rest
	 * @group serverless
	 *
	 * @param array{
	 *     format?: string, // A short version of the Accept header, e.g. json, yaml.  `csv`, `tsv`, and `txt` formats will return results in a tabular format, excluding other metadata fields from the response.
	 *     delimiter?: string, // The character to use between values within a CSV row. Only valid for the CSV format. (DEFAULT: ,)
	 *     drop_null_columns?: bool, // Should columns that are entirely `null` be removed from the `columns` and `values` portion of the results? Defaults to `false`. If `true` then the response will include an extra section under the name `all_columns` which has the name of all columns.
	 *     allow_partial_results?: bool, // If `true`, partial results will be returned if there are shard failures, but the query can continue to execute on other clusters and shards. If `false`, the query will fail if there are any failures.  To override the default behavior, you can set the `esql.query.allow_partial_results` cluster setting to `false`. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Use the `query` element to start a query. Use `columnar` to format the answer.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function query(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_query';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['format','delimiter','drop_null_columns','allow_partial_results','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'esql.query');
		return $this->client->sendRequest($request);
	}
}
