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
class Cat extends AbstractEndpoint
{
	/**
	 * Get aliases
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-aliases
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of alias names to return
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     master_timeout?: int|string, // Timeout for waiting for new cluster state in case it is blocked
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function aliases(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_cat/aliases/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_cat/aliases';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','h','help','s','v','expand_wildcards','master_timeout','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cat.aliases');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get shard allocation information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-allocation
	 *
	 * @param array{
	 *     node_id?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function allocation(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id'])) {
			$url = '/_cat/allocation/' . $this->encode($this->convertValue($params['node_id']));
			$method = 'GET';
		} else {
			$url = '/_cat/allocation';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','bytes','time','local','master_timeout','h','help','s','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'cat.allocation');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get circuit breakers statistics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch#TODO
	 *
	 * @param array{
	 *     circuit_breaker_patterns?: string|array<string>, // A comma-separated list of regular-expressions to filter the circuit breakers in the output
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
	public function circuitBreaker(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['circuit_breaker_patterns'])) {
			$url = '/_cat/circuit_breaker/' . $this->encode($this->convertValue($params['circuit_breaker_patterns']));
			$method = 'GET';
		} else {
			$url = '/_cat/circuit_breaker';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','time','local','master_timeout','h','help','s','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['circuit_breaker_patterns'], $request, 'cat.circuit_breaker');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get component templates
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-component-templates
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string, // A pattern that returned component template names must match
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function componentTemplates(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_cat/component_templates/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_cat/component_templates';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cat.component_templates');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a document count
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-count
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     project_routing?: string, // A Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function count(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/_cat/count/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cat/count';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','h','help','project_routing','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cat.count');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get field data cache information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-fielddata
	 *
	 * @param array{
	 *     fields?: string|array<string>, // A comma-separated list of fields to return the fielddata size
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes?: string, // The unit in which to display byte values
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     time?: string, // The unit in which to display time values
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
	public function fielddata(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['fields'])) {
			$url = '/_cat/fielddata/' . $this->encode($this->convertValue($params['fields']));
			$method = 'GET';
		} else {
			$url = '/_cat/fielddata';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','bytes','h','help','s','v','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['fields'], $request, 'cat.fielddata');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get the cluster health status
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-health
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     ts?: bool, // Set to false to disable timestamping
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
		$url = '/_cat/health';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','h','help','s','time','ts','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.health');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get CAT help
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/group/endpoint-cat
	 * @group serverless
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
	public function help(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.help');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-indices
	 * @group serverless
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes?: string, // The unit in which to display byte values
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     health?: string, // A health status ("green", "yellow", or "red" to filter only indices matching the specified health status
	 *     help?: bool, // Return help information
	 *     pri?: bool, // Set to true to return stats only for primary shards
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     include_unloaded_segments?: bool, // If set to true segment stats will include stats for segments that are not currently loaded into memory
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
	public function indices(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/_cat/indices/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cat/indices';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','bytes','master_timeout','h','health','help','pri','s','time','v','include_unloaded_segments','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cat.indices');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get master node information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-master
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function master(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/master';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.master');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data frame analytics jobs
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-ml-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no configs. (This includes `_all` string or when no configs have been specified)
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function mlDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_cat/ml/data_frame/analytics/' . $this->encode($params['id']);
			$method = 'GET';
		} else {
			$url = '/_cat/ml/data_frame/analytics';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','bytes','format','h','help','s','time','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'cat.ml_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get datafeeds
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-ml-datafeeds
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id?: string, // The ID of the datafeeds stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
	public function mlDatafeeds(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['datafeed_id'])) {
			$url = '/_cat/ml/datafeeds/' . $this->encode($params['datafeed_id']);
			$method = 'GET';
		} else {
			$url = '/_cat/ml/datafeeds';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','format','h','help','s','time','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'cat.ml_datafeeds');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection jobs
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-ml-jobs
	 * @group serverless
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the jobs stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function mlJobs(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['job_id'])) {
			$url = '/_cat/ml/anomaly_detectors/' . $this->encode($params['job_id']);
			$method = 'GET';
		} else {
			$url = '/_cat/ml/anomaly_detectors';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','bytes','format','h','help','s','time','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'cat.ml_jobs');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get trained models
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-ml-trained-models
	 * @group serverless
	 *
	 * @param array{
	 *     model_id?: string, // The ID of the trained models stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     from?: int, // skips a number of trained models
	 *     size?: int, // specifies a max number of trained models to get
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function mlTrainedModels(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['model_id'])) {
			$url = '/_cat/ml/trained_models/' . $this->encode($params['model_id']);
			$method = 'GET';
		} else {
			$url = '/_cat/ml/trained_models';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','from','size','bytes','format','h','help','s','time','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'cat.ml_trained_models');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get node attribute information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-nodeattrs
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function nodeattrs(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/nodeattrs';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.nodeattrs');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get node information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-nodes
	 *
	 * @param array{
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     full_id?: bool, // Return the full node ID instead of the shortened version (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function nodes(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/nodes';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['bytes','format','full_id','master_timeout','h','help','s','time','v','include_unloaded_segments','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.nodes');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get pending task information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-pending-tasks
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
		$url = '/_cat/pending_tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','time','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.pending_tasks');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get plugin information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-plugins
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     include_bootstrap?: bool, // Include bootstrap plugins in the response
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function plugins(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/plugins';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','include_bootstrap','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.plugins');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get shard recovery information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-recovery
	 *
	 * @param array{
	 *     index?: string|array<string>, // Comma-separated list or wildcard expression of index names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     active_only?: bool, // If `true`, the response only includes ongoing shard recoveries
	 *     bytes?: string, // The unit in which to display byte values
	 *     detailed?: bool, // If `true`, the response includes detailed information about shard recoveries
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
			$url = '/_cat/recovery/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cat/recovery';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','active_only','bytes','detailed','h','help','s','time','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cat.recovery');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get snapshot repository information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-repositories
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function repositories(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/repositories';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.repositories');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get segment information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-segments
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     bytes?: string, // The unit in which to display byte values
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     time?: string, // The unit in which to display time values
	 *     ignore_unavailable?: bool, // Whether specified concrete indices should be ignored when unavailable (missing or closed). Only allowed when providing an index expression.
	 *     ignore_throttled?: bool, // Whether specified concrete, expanded or aliased indices should be ignored when throttled. Only allowed when providing an index expression.
	 *     allow_no_indices?: bool, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified). Only allowed when providing an index expression.
	 *     expand_wildcards?: string|array<string>, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     allow_closed?: bool, // If true, allow closed indices to be returned in the response otherwise if false, keep the legacy behaviour of throwing an exception if index pattern matches closed indices
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
			$url = '/_cat/segments/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cat/segments';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','bytes','h','help','s','v','time','ignore_unavailable','ignore_throttled','allow_no_indices','expand_wildcards','allow_closed','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cat.segments');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get shard information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-shards
	 *
	 * @param array{
	 *     index?: string|array<string>, // A comma-separated list of index names to limit the returned information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     bytes?: string, // The unit in which to display byte values
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
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
	public function shards(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['index'])) {
			$url = '/_cat/shards/' . $this->encode($this->convertValue($params['index']));
			$method = 'GET';
		} else {
			$url = '/_cat/shards';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','bytes','master_timeout','h','help','s','time','v','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'cat.shards');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get snapshot information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-snapshots
	 *
	 * @param array{
	 *     repository?: string|array<string>, // Name of repository from which to fetch the snapshot information
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     ignore_unavailable?: bool, // Set to true to ignore unavailable snapshots
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
	public function snapshots(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['repository'])) {
			$url = '/_cat/snapshots/' . $this->encode($this->convertValue($params['repository']));
			$method = 'GET';
		} else {
			$url = '/_cat/snapshots';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','ignore_unavailable','master_timeout','h','help','s','time','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['repository'], $request, 'cat.snapshots');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get task information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-tasks
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     nodes?: string|array<string>, // A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 *     actions?: string|array<string>, // A comma-separated list of actions that should be returned. Leave empty to return all.
	 *     detailed?: bool, // Return detailed task information (default: false)
	 *     parent_task_id?: string, // Return tasks with specified parent task id (node_id:task_number). Set to -1 to return all.
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error.
	 *     wait_for_completion?: bool, // If `true`, the request blocks until the task has completed.
	 *     bytes?: string, // The unit in which to display byte values
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
	public function tasks(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_cat/tasks';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['format','nodes','actions','detailed','parent_task_id','h','help','s','time','v','timeout','wait_for_completion','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'cat.tasks');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get index template information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-templates
	 *
	 * @param array{
	 *     name?: string, // A pattern that returned template names must match
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
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
	public function templates(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_cat/templates/' . $this->encode($params['name']);
			$method = 'GET';
		} else {
			$url = '/_cat/templates';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','local','master_timeout','h','help','s','v','bytes','time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'cat.templates');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get thread pool statistics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-thread-pool
	 *
	 * @param array{
	 *     thread_pool_patterns?: string|array<string>, // A comma-separated list of regular-expressions to filter the thread pools in the output
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
	public function threadPool(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['thread_pool_patterns'])) {
			$url = '/_cat/thread_pool/' . $this->encode($this->convertValue($params['thread_pool_patterns']));
			$method = 'GET';
		} else {
			$url = '/_cat/thread_pool';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['format','time','local','master_timeout','h','help','s','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['thread_pool_patterns'], $request, 'cat.thread_pool');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get transform information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-cat-transforms
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id?: string, // The id of the transform for which to get stats. '_all' or '*' implies all transforms
	 *     from?: int, // skips a number of transform configs, defaults to 0
	 *     size?: int, // specifies a max number of transforms to get, defaults to 100
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml
	 *     h?: string|array<string>, // Comma-separated list of column names to display
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases to sort by
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     bytes?: string, // The unit in which to display byte values
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
	public function transforms(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['transform_id'])) {
			$url = '/_cat/transforms/' . $this->encode($params['transform_id']);
			$method = 'GET';
		} else {
			$url = '/_cat/transforms';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['from','size','allow_no_match','format','h','help','s','time','v','bytes','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/plain,application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'cat.transforms');
		return $this->client->sendRequest($request);
	}
}
