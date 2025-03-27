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
class License extends AbstractEndpoint
{
	/**
	 * Deletes licensing information for the cluster
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-license.html
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Timeout for processing on master node
	 *     timeout?: int|string, // Timeout for acknowledgement of update from all nodes in cluster
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
	public function delete(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves licensing information for the cluster
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-license.html
	 *
	 * @param array{
	 *     local?: bool, // Return local information, do not retrieve the state from master node (default: false)
	 *     accept_enterprise?: bool, // Supported for backwards compatibility with 7.x. If this param is used it must be set to true
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
	public function get(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['local','accept_enterprise','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves information about the status of the basic license.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-basic-status.html
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
	public function getBasicStatus(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license/basic_status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.get_basic_status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves information about the status of the trial license.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-trial-status.html
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
	public function getTrialStatus(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license/trial_status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.get_trial_status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Updates the license for the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/update-license.html
	 *
	 * @param array{
	 *     acknowledge?: bool, // whether the user has acknowledged acknowledge messages (default: false)
	 *     master_timeout?: int|string, // Timeout for processing on master node
	 *     timeout?: int|string, // Timeout for acknowledgement of update from all nodes in cluster
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // licenses to be installed. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function post(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['acknowledge','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.post');
		return $this->client->sendRequest($request);
	}


	/**
	 * Starts an indefinite basic license.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-basic.html
	 *
	 * @param array{
	 *     acknowledge?: bool, // whether the user has acknowledged acknowledge messages (default: false)
	 *     master_timeout?: int|string, // Timeout for processing on master node
	 *     timeout?: int|string, // Timeout for acknowledgement of update from all nodes in cluster
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
	public function postStartBasic(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license/start_basic';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['acknowledge','master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.post_start_basic');
		return $this->client->sendRequest($request);
	}


	/**
	 * starts a limited time trial license.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-trial.html
	 *
	 * @param array{
	 *     type?: string, // The type of trial license to generate (default: "trial")
	 *     acknowledge?: bool, // whether the user has acknowledged acknowledge messages (default: false)
	 *     master_timeout?: int|string, // Timeout for processing on master node
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
	public function postStartTrial(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_license/start_trial';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['type','acknowledge','master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'license.post_start_trial');
		return $this->client->sendRequest($request);
	}
}
