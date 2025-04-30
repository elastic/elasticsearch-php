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
class Ingest extends AbstractEndpoint
{
	/**
	 * Deletes a geoip database configuration
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-geoip-database-api.html
	 *
	 * @param array{
	 *     id: string|array<string>, // (REQUIRED) A comma-separated list of geoip database configurations to delete
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
	public function deleteGeoipDatabase(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ingest/geoip/database/' . $this->encode($this->convertValue($params['id']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.delete_geoip_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes an ip location database configuration
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-ip-location-database-api.html
	 *
	 * @param array{
	 *     id: string|array<string>, // (REQUIRED) A comma-separated list of ip location database configurations to delete
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
	public function deleteIpLocationDatabase(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ingest/ip_location/database/' . $this->encode($this->convertValue($params['id']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.delete_ip_location_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Pipeline ID
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
	public function deletePipeline(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ingest/pipeline/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.delete_pipeline');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns statistical information about geoip databases
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/geoip-stats-api.html
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
	public function geoIpStats(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ingest/geoip/stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ingest.geo_ip_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns geoip database configuration.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-geoip-database-api.html
	 *
	 * @param array{
	 *     id?: string|array<string>, // A comma-separated list of geoip database configurations to get; use `*` to get all geoip database configurations
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
	public function getGeoipDatabase(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ingest/geoip/database/' . $this->encode($this->convertValue($params['id']));
			$method = 'GET';
		} else {
			$url = '/_ingest/geoip/database';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.get_geoip_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns the specified ip location database configuration
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-ip-location-database-api.html
	 *
	 * @param array{
	 *     id?: string|array<string>, // A comma-separated list of ip location database configurations to get; use `*` to get all ip location database configurations
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
	public function getIpLocationDatabase(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ingest/ip_location/database/' . $this->encode($this->convertValue($params['id']));
			$method = 'GET';
		} else {
			$url = '/_ingest/ip_location/database';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.get_ip_location_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-pipeline-api.html
	 *
	 * @param array{
	 *     id?: string, // Comma separated list of pipeline ids. Wildcards supported
	 *     summary?: bool, // Return pipelines without their definitions (default: false)
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
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
	public function getPipeline(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ingest/pipeline/' . $this->encode($params['id']);
			$method = 'GET';
		} else {
			$url = '/_ingest/pipeline';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['summary','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.get_pipeline');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns a list of the built-in patterns.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/grok-processor.html#grok-processor-rest-get
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
	public function processorGrok(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ingest/processor/grok';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ingest.processor_grok');
		return $this->client->sendRequest($request);
	}


	/**
	 * Puts the configuration for a geoip database to be downloaded
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-geoip-database-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The id of the database configuration
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The database configuration definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putGeoipDatabase(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_ingest/geoip/database/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.put_geoip_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Puts the configuration for a ip location database to be downloaded
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-ip-location-database-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The id of the database configuration
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The database configuration definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putIpLocationDatabase(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_ingest/ip_location/database/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.put_ip_location_database');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or updates a pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-pipeline-api.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) Pipeline ID
	 *     if_version?: int, // Required version for optimistic concurrency control for pipeline updates
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The ingest definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putPipeline(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_ingest/pipeline/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['if_version','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.put_pipeline');
		return $this->client->sendRequest($request);
	}


	/**
	 * Allows to simulate a pipeline with example documents.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/simulate-pipeline-api.html
	 *
	 * @param array{
	 *     id?: string, // Pipeline ID
	 *     verbose?: bool, // Verbose mode. Display data output for each processor in executed pipeline
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The simulate definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function simulate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['id'])) {
			$url = '/_ingest/pipeline/' . $this->encode($params['id']) . '/_simulate';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ingest/pipeline/_simulate';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ingest.simulate');
		return $this->client->sendRequest($request);
	}
}
