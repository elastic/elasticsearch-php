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
class Transform extends AbstractEndpoint
{
	/**
	 * Delete a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-delete-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to delete
	 *     force?: bool, // If this value is false, the transform must be stopped before it can be deleted. If true, the transform is deleted regardless of its current state.
	 *     delete_dest_index?: bool, // If this value is true, the destination index is deleted together with the transform. If false, the destination index will not be deleted
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function deleteTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['force','delete_dest_index','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.delete_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves transform usage information for transform nodes
	 *
	 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform-node-stats.html
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
	public function getNodeStats(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_transform/_node_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'transform.get_node_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get transforms
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-get-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id?: string|array<string>, // Comma-separated list of transform identifiers or wildcard expressions. You can get information for all transforms by using `_all`, by specifying `*` as the `<transform_id>`, or by omitting the `<transform_id>`.
	 *     from?: int, // Skips the specified number of transforms.
	 *     size?: int, // Specifies the maximum number of transforms to obtain. (DEFAULT: 100)
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no transforms that match. 2. Contains the _all string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  If this parameter is false, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     exclude_generated?: bool, // Excludes fields that were automatically added when creating the transform. This allows the configuration to be in an acceptable format to be retrieved and then added to another cluster.
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
	public function getTransform(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['transform_id'])) {
			$url = '/_transform/' . $this->encode($this->convertValue($params['transform_id']));
			$method = 'GET';
		} else {
			$url = '/_transform';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['from','size','allow_no_match','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.get_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get transform stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-get-transform-stats
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string|array<string>, // (REQUIRED) Comma-separated list of transform identifiers or wildcard expressions. You can get information for all transforms by using `_all`, by specifying `*` as the `<transform_id>`, or by omitting the `<transform_id>`.
	 *     from?: int, // Skips the specified number of transforms.
	 *     size?: int, // Specifies the maximum number of transforms to obtain. (DEFAULT: 100)
	 *     timeout?: int|string, // Controls the time to wait for the stats (DEFAULT: 30s)
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no transforms that match. 2. Contains the _all string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  If this parameter is false, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
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
	public function getTransformStats(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($this->convertValue($params['transform_id'])) . '/_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','timeout','allow_no_match','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.get_transform_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Preview a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-preview-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id?: string, // The id of the transform to preview.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The definition for the transform to preview. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function previewTransform(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['transform_id'])) {
			$url = '/_transform/' . $this->encode($params['transform_id']) . '/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_transform/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.preview_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-put-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the new transform.
	 *     defer_validation?: bool, // When the transform is created, a series of validations occur to ensure its success. For example, there is a check for the existence of the source indices and a check that the destination index is not part of the source index pattern. You can use this parameter to skip the checks, for example when the source index does not exist until after the transform is created. The validations are always run when you start the transform, however, with the exception of privilege checks.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The transform definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id','body'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['defer_validation','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.put_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reset a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-reset-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to reset
	 *     force?: bool, // If this value is `true`, the transform is reset regardless of its current state. If it's `false`, the transform must be stopped before it can be reset.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function resetTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_reset';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['force','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.reset_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Schedule a transform to start now
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-schedule-now-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform.
	 *     timeout?: int|string, // Controls the time to wait for the scheduling to take place (DEFAULT: 30s)
	 *     defer?: bool, // When true, defers the scheduling by the transform's configured sync delay instead of triggering immediately. The transform will process new data after the delay elapses rather than right away.
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
	public function scheduleNowTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_schedule_now';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','defer','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.schedule_now_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Set upgrade_mode for transform indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-set-upgrade-mode
	 *
	 * @param array{
	 *     enabled?: bool, // When `true`, it enables `upgrade_mode` which temporarily halts all transform tasks and prohibits new transform tasks from starting.
	 *     timeout?: int|string, // The time to wait for the request to be completed. (DEFAULT: 30s)
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
	public function setUpgradeMode(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_transform/set_upgrade_mode';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['enabled','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'transform.set_upgrade_mode');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-start-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to start
	 *     from?: string, // Restricts the set of transformed entities to those changed after this time. Relative times like now-30d are supported. Only applicable for continuous transforms.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function startTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['from','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.start_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop transforms
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-stop-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to stop
	 *     force?: bool, // If it is true, the API forcefully stops the transforms.
	 *     wait_for_completion?: bool, // If it is true, the API blocks until the indexer state completely stops. If it is false, the API returns immediately and the indexer is stopped asynchronously in the background.
	 *     timeout?: int|string, // Period to wait for a response when `wait_for_completion` is `true`. If no response is received before the timeout expires, the request returns a timeout exception. However, the request continues processing and eventually moves the transform to a STOPPED state. (DEFAULT: 30s)
	 *     allow_no_match?: bool, // Specifies what to do when the request: contains wildcard expressions and there are no transforms that match; contains the `_all` string or no identifiers and there are no matches; contains wildcard expressions and there are only partial matches.  If it is true, the API returns a successful acknowledgement message when there are no matches. When there are only partial matches, the API stops the appropriate transforms.  If it is false, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     wait_for_checkpoint?: bool, // If it is true, the transform does not completely stop until the current checkpoint is completed. If it is false, the transform stops as soon as possible.
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
	public function stopTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['force','wait_for_completion','timeout','allow_no_match','wait_for_checkpoint','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.stop_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a transform
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-update-transform
	 * @group serverless
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform.
	 *     defer_validation?: bool, // When true, deferrable validations are not run. This behavior may be desired if the source index does not exist until after the transform is created.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The update transform definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateTransform(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['transform_id','body'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['defer_validation','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.update_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Upgrade all transforms
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-transform-upgrade-transforms
	 *
	 * @param array{
	 *     dry_run?: bool, // When true, the request checks for updates but does not run them.
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
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
	public function upgradeTransforms(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_transform/_upgrade';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'transform.upgrade_transforms');
		return $this->client->sendRequest($request);
	}
}
