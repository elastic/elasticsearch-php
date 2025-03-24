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
class Inference extends AbstractEndpoint
{
	/**
	 * Delete an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-inference-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type: string, //  The task type
	 *     dry_run: boolean, // If true the endpoint will not be deleted and a list of ingest processors which reference this endpoint will be returned.
	 *     force: boolean, // If true the endpoint will be forcefully stopped (regardless of whether or not it is referenced by any ingest processors or semantic text fields).
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
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'DELETE';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['dry_run','force','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-inference-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     inference_id: string, //  The inference Id
	 *     task_type: string, //  The task type
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
	public function get(array $params = [])
	{
		if (isset($params['task_type']) && isset($params['inference_id'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'GET';
		} elseif (isset($params['inference_id'])) {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'GET';
		} else {
			$url = '/_inference';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type: string, //  The task type
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The inference payload
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function inference(array $params = [])
	{
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'POST';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.inference');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an inference endpoint for use in the Inference API
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-inference-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type: string, //  The task type
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The inference endpoint's task and service settings
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function put(array $params = [])
	{
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'PUT';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.put');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform streaming inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-stream-inference-api.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type: string, //  The task type
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The inference payload
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function streamInference(array $params = [])
	{
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']) . '/_stream';
			$method = 'POST';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']) . '/_stream';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/event-stream',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.stream_inference');
		return $this->client->sendRequest($request);
	}
}
