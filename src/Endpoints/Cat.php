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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     v?: bool, // Verbose mode. Display column headers
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. It supports comma-separated values, such as `open,hidden`. (DEFAULT: all)
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. If the master node is not available before the timeout expires, the request fails and returns an error. To indicated that the request should never timeout, you can set it to `-1`. (DEFAULT: 30s)
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     bytes?: string, // The unit in which to display byte values
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     project_routing?: string, // A Lucene query using project metadata tags to limit which projects to search, such as _alias:_origin or _alias:*pr*. Only supported in serverless.
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     bytes?: string, // The unit in which to display byte values
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     time?: string, // The unit in which to display time values
	 *     ts?: bool, // If true, returns `HH:MM:SS` and Unix epoch timestamps. (DEFAULT: 1)
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     bytes?: string, // The unit in which to display byte values
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     health?: string, // The health status used to limit returned indices. By default, the response includes indices of any health status.
	 *     help?: bool, // Return help information
	 *     pri?: bool, // If true, the response only includes information from primary shards.
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     include_unloaded_segments?: bool, // If true, the response includes information from segments that are not loaded into memory.
	 *     expand_wildcards?: string|array<string>, // The type of index that wildcard patterns can match. (DEFAULT: all)
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no configs. (This includes `_all` string or when no configs have been specified.)
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // Comma-separated list of column names to display. (DEFAULT: create_time,id,state,type)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases used to sort the response.
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
	 *     allow_no_match?: bool, // Specifies what to do when the request:  * Contains wildcard expressions and there are no datafeeds that match. * Contains the `_all` string or no identifiers and there are no matches. * Contains wildcard expressions and there are only partial matches.  If `true`, the API returns an empty datafeeds array when there are no matches and the subset of results when there are partial matches. If `false`, the API returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // Comma-separated list of column names to display. (DEFAULT: ['bc', 'id', 'sc', 's'])
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases used to sort the response.
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
	 *     allow_no_match?: bool, // Specifies what to do when the request:  * Contains wildcard expressions and there are no jobs that match. * Contains the `_all` string or no identifiers and there are no matches. * Contains wildcard expressions and there are only partial matches.  If `true`, the API returns an empty jobs array when there are no matches and the subset of results when there are partial matches. If `false`, the API returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // Comma-separated list of column names to display. (DEFAULT: buckets.count,data.processed_records,forecasts.total,id,model.bytes,model.memory_status,state)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases used to sort the response.
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
	 *     allow_no_match?: bool, // Specifies what to do when the request: contains wildcard expressions and there are no models that match; contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and there are only partial matches. If `true`, the API returns an empty array when there are no matches and the subset of results when there are partial matches. If `false`, the API returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     from?: int, // Skips the specified number of transforms.
	 *     size?: int, // The maximum number of transforms to display. (DEFAULT: 100)
	 *     bytes?: string, // The unit in which to display byte values
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // A comma-separated list of column names to display.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases used to sort the response.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     full_id?: bool, // If `true`, return the full node ID. If `false`, return the shortened node ID.
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards. (DEFAULT: ip,hp,rp,r,m,n,cpu,l)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases that determines the sort order. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     include_unloaded_segments?: bool, // If true, the response includes information from segments that are not loaded into memory.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     include_bootstrap?: bool, // Include bootstrap plugins in the response
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     active_only?: bool, // If `true`, the response only includes ongoing shard recoveries.
	 *     bytes?: string, // The unit in which to display byte values
	 *     detailed?: bool, // If `true`, the response includes detailed information about shard recoveries.
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards. (DEFAULT: ip,hp,rp,r,m,n,cpu,l)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases that determines the sort order. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // List of columns to appear in the response. Supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     bytes?: string, // The unit in which to display byte values
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards. (DEFAULT: ip,hp,rp,r,m,n,cpu,l)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases that determines the sort order. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     v?: bool, // Verbose mode. Display column headers
	 *     time?: string, // The unit in which to display time values
	 *     ignore_unavailable?: bool, // If true, missing or closed indices are not included in the response.
	 *     ignore_throttled?: bool, // If true, concrete, expanded or aliased indices are ignored when frozen.
	 *     allow_no_indices?: bool, // If false, the request returns an error if any wildcard expression, index alias, or _all value targets only missing or closed indices. This behavior applies even if the request targets other open indices. For example, a request targeting foo*,bar* returns an error if an index starts with foo but no index starts with bar. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard expressions can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values, such as open,hidden. (DEFAULT: open)
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     bytes?: string, // The unit in which to display byte values
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // List of columns to appear in the response. Supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases that determines the sort order. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     ignore_unavailable?: bool, // If `true`, the response does not include information from unavailable snapshots.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards. (DEFAULT: ip,hp,rp,r,m,n,cpu,l)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     nodes?: string|array<string>, // Unique node identifiers, which are used to limit the response.
	 *     actions?: string|array<string>, // The task action names, which are used to limit the response.
	 *     detailed?: bool, // If `true`, the response includes detailed information about shard recoveries.
	 *     parent_task_id?: string, // The parent task identifier, which is used to limit the response.
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
	 *     time?: string, // The unit in which to display time values
	 *     v?: bool, // Verbose mode. Display column headers
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // A comma-separated list of columns names to display. It supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // List of columns that determine how the table should be sorted. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     time?: string, // The unit in which to display time values
	 *     local?: bool, // If `true`, the request computes the list of selected nodes from the local cluster state. If `false` the list of selected nodes are computed from the cluster state of the master node. In both cases the coordinating node will send requests for further information to each selected node.
	 *     master_timeout?: int|string, // The period to wait for a connection to the master node. (DEFAULT: 30s)
	 *     h?: string|array<string>, // List of columns to appear in the response. Supports simple wildcards.
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // A comma-separated list of column names or aliases that determines the sort order. Sorting defaults to ascending and can be changed by setting `:asc` or `:desc` as a suffix to the column name.
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
	 *     from?: int, // Skips the specified number of transforms.
	 *     size?: int, // The maximum number of transforms to obtain. (DEFAULT: 100)
	 *     allow_no_match?: bool, // Specifies what to do when the request: contains wildcard expressions and there are no transforms that match; contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and there are only partial matches. If `true`, it returns an empty transforms array when there are no matches and the subset of results when there are partial matches. If `false`, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     format?: string, // a short version of the Accept header, e.g. json, yaml (DEFAULT: text)
	 *     h?: string|array<string>, // Comma-separated list of column names to display. (DEFAULT: changes_last_detection_time,checkpoint,checkpoint_progress,documents_processed,id,last_search_time,state)
	 *     help?: bool, // Return help information
	 *     s?: string|array<string>, // Comma-separated list of column names or column aliases used to sort the response.
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
