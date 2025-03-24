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
	 * Deletes an existing transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to delete
	 *     force: boolean, // When `true`, the transform is deleted regardless of its current state. The default value is `false`, meaning that the transform must be `stopped` before it can be deleted.
	 *     delete_dest_index: boolean, // When `true`, the destination index is deleted together with the transform. The default value is `false`, meaning that the destination index will not be deleted.
	 *     timeout: time, // Controls the time to wait for the transform deletion
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
	public function deleteTransform(array $params = [])
	{
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
	 * Retrieves transform usage information for transform nodes.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform-node-stats.html
	 *
	 * @param array{
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
	public function getNodeStats(array $params = [])
	{
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
	 * Retrieves configuration information for transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform.html
	 *
	 * @param array{
	 *     transform_id: string, //  The id or comma delimited list of id expressions of the transforms to get, '_all' or '*' implies get all transforms
	 *     from: int, // skips a number of transform configs, defaults to 0
	 *     size: int, // specifies a max number of transforms to get, defaults to 100
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 *     exclude_generated: boolean, // Omits fields that are illegal to set on transform PUT
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
	public function getTransform(array $params = [])
	{
		if (isset($params['transform_id'])) {
			$url = '/_transform/' . $this->encode($params['transform_id']);
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
	 * Retrieves usage information for transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform-stats.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform for which to get stats. '_all' or '*' implies all transforms
	 *     from: number, // skips a number of transform stats, defaults to 0
	 *     size: number, // specifies a max number of transform stats to get, defaults to 100
	 *     timeout: time, // Controls the time to wait for the stats
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
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
	public function getTransformStats(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_stats';
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
	 * Previews a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/preview-transform.html
	 *
	 * @param array{
	 *     transform_id: string, //  The id of the transform to preview.
	 *     timeout: time, // Controls the time to wait for the preview
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, //  The definition for the transform to preview
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function previewTransform(array $params = [])
	{
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
	 * Instantiates a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the new transform.
	 *     defer_validation: boolean, // If validations should be deferred until transform starts, defaults to false.
	 *     timeout: time, // Controls the time to wait for the transform to start
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The transform definition
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTransform(array $params = [])
	{
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
	 * Resets an existing transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/reset-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to reset
	 *     force: boolean, // When `true`, the transform is reset regardless of its current state. The default value is `false`, meaning that the transform must be `stopped` before it can be reset.
	 *     timeout: time, // Controls the time to wait for the transform to reset
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
	public function resetTransform(array $params = [])
	{
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
	 * Schedules now a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/schedule-now-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform.
	 *     timeout: time, // Controls the time to wait for the scheduling to take place
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
	public function scheduleNowTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . $this->encode($params['transform_id']) . '/_schedule_now';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['transform_id'], $request, 'transform.schedule_now_transform');
		return $this->client->sendRequest($request);
	}


	/**
	 * Starts one or more transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to start
	 *     from: string, // Restricts the set of transformed entities to those changed after this time
	 *     timeout: time, // Controls the time to wait for the transform to start
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
	public function startTransform(array $params = [])
	{
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
	 * Stops one or more transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to stop
	 *     force: boolean, // Whether to force stop a failed transform or not. Default to false
	 *     wait_for_completion: boolean, // Whether to wait for the transform to fully stop before returning or not. Default to false
	 *     timeout: time, // Controls the time to wait until the transform has stopped. Default to 30 seconds
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 *     wait_for_checkpoint: boolean, // Whether to wait for the transform to reach a checkpoint before stopping. Default to false
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
	public function stopTransform(array $params = [])
	{
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
	 * Updates certain properties of a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform.
	 *     defer_validation: boolean, // If validations should be deferred until transform starts, defaults to false.
	 *     timeout: time, // Controls the time to wait for the update
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The update transform definition
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateTransform(array $params = [])
	{
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
	 * Upgrades all transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/upgrade-transforms.html
	 *
	 * @param array{
	 *     dry_run: boolean, // Whether to only check for updates but don't execute
	 *     timeout: time, // Controls the time to wait for the upgrade
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
	public function upgradeTransforms(array $params = [])
	{
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
