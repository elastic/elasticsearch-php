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
class Ilm extends AbstractEndpoint
{
	/**
	 * Deletes the specified lifecycle policy definition. A currently used policy cannot be deleted.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-delete-lifecycle.html
	 *
	 * @param array{
	 *     policy: string, // (REQUIRED) The name of the index lifecycle policy
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
	public function deleteLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['policy'], $params);
		$url = '/_ilm/policy/' . $this->encode($params['policy']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['policy'], $request, 'ilm.delete_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves information about the index's current lifecycle state, such as the currently executing phase, action, and step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-explain-lifecycle.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to explain
	 *     only_managed?: bool, // filters the indices included in the response to ones managed by ILM
	 *     only_errors?: bool, // filters the indices included in the response to ones in an ILM error state, implies only_managed
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
	public function explainLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_ilm/explain';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['only_managed','only_errors','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'ilm.explain_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns the specified policy definition. Includes the policy version and last modified date.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-get-lifecycle.html
	 *
	 * @param array{
	 *     policy?: string, // The name of the index lifecycle policy
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
	public function getLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['policy'])) {
			$url = '/_ilm/policy/' . $this->encode($params['policy']);
			$method = 'GET';
		} else {
			$url = '/_ilm/policy';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['policy'], $request, 'ilm.get_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves the current index lifecycle management (ILM) status.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-get-status.html
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
	public function getStatus(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ilm/status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ilm.get_status');
		return $this->client->sendRequest($request);
	}


	/**
	 * Migrates the indices and ILM policies away from custom node attribute allocation routing to data tiers routing
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-migrate-to-data-tiers.html
	 *
	 * @param array{
	 *     dry_run?: bool, // If set to true it will simulate the migration, providing a way to retrieve the ILM policies and indices that need to be migrated. The default is false
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Optionally specify a legacy index template name to delete and optionally specify a node attribute name used for index shard routing (defaults to "data"). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function migrateToDataTiers(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ilm/migrate_to_data_tiers';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ilm.migrate_to_data_tiers');
		return $this->client->sendRequest($request);
	}


	/**
	 * Manually moves an index into the specified step and executes that step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-move-to-step.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index whose lifecycle step is to change
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The new lifecycle step to move to. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function moveToStep(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/_ilm/move/' . $this->encode($params['index']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'ilm.move_to_step');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates a lifecycle policy
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-put-lifecycle.html
	 *
	 * @param array{
	 *     policy: string, // (REQUIRED) The name of the index lifecycle policy
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The lifecycle policy definition to register. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putLifecycle(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['policy'], $params);
		$url = '/_ilm/policy/' . $this->encode($params['policy']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['policy'], $request, 'ilm.put_lifecycle');
		return $this->client->sendRequest($request);
	}


	/**
	 * Removes the assigned lifecycle policy and stops managing the specified index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-remove-policy.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to remove policy on
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
	public function removePolicy(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_ilm/remove';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'ilm.remove_policy');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retries executing the policy for an index that is in the ERROR step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-retry-policy.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the indices (comma-separated) whose failed lifecycle step is to be retry
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
	public function retry(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . $this->encode($params['index']) . '/_ilm/retry';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['index'], $request, 'ilm.retry');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start the index lifecycle management (ILM) plugin.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-start.html
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
	public function start(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ilm/start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ilm.start');
		return $this->client->sendRequest($request);
	}


	/**
	 * Halts all lifecycle management operations and stops the index lifecycle management (ILM) plugin
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-stop.html
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
	public function stop(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ilm/stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ilm.stop');
		return $this->client->sendRequest($request);
	}
}
