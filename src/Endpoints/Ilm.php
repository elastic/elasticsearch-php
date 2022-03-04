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

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Ilm extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes the specified lifecycle policy definition. A currently used policy cannot be deleted.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-delete-lifecycle.html
	 *
	 * @param array{
	 *     policy: string, // (REQUIRED) The name of the index lifecycle policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['policy'], $params);
		$url = '/_ilm/policy/' . urlencode((string) $params['policy']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about the index's current lifecycle state, such as the currently executing phase, action, and step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-explain-lifecycle.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to explain
	 *     only_managed: boolean, // filters the indices included in the response to ones managed by ILM
	 *     only_errors: boolean, // filters the indices included in the response to ones in an ILM error state, implies only_managed
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function explainLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_ilm/explain';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['only_managed','only_errors']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns the specified policy definition. Includes the policy version and last modified date.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-get-lifecycle.html
	 *
	 * @param array{
	 *     policy: string, //  The name of the index lifecycle policy
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getLifecycle(array $params = [])
	{
		if (isset($params['policy'])) {
			$url = '/_ilm/policy/' . urlencode((string) $params['policy']);
			$method = 'GET';
		} else {
			$url = '/_ilm/policy';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves the current index lifecycle management (ILM) status.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-get-status.html
	 */
	public function getStatus(array $params = [])
	{
		$url = '/_ilm/status';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Migrates the indices and ILM policies away from custom node attribute allocation routing to data tiers routing
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-migrate-to-data-tiers.html
	 *
	 * @param array{
	 *     dry_run: boolean, // If set to true it will simulate the migration, providing a way to retrieve the ILM policies and indices that need to be migrated. The default is false
	 *     body: array, //  Optionally specify a legacy index template name to delete and optionally specify a node attribute name used for index shard routing (defaults to "data")
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function migrateToDataTiers(array $params = [])
	{
		$url = '/_ilm/migrate_to_data_tiers';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Manually moves an index into the specified step and executes that step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-move-to-step.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index whose lifecycle step is to change
	 *     body: array, //  The new lifecycle step to move to
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function moveToStep(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/_ilm/move/' . urlencode((string) $params['index']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Creates a lifecycle policy
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-put-lifecycle.html
	 *
	 * @param array{
	 *     policy: string, // (REQUIRED) The name of the index lifecycle policy
	 *     body: array, //  The lifecycle policy definition to register
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putLifecycle(array $params = [])
	{
		$this->checkRequiredParameters(['policy'], $params);
		$url = '/_ilm/policy/' . urlencode((string) $params['policy']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Removes the assigned lifecycle policy and stops managing the specified index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-remove-policy.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the index to remove policy on
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function removePolicy(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_ilm/remove';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retries executing the policy for an index that is in the ERROR step.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-retry-policy.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the indices (comma-separated) whose failed lifecycle step is to be retry
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function retry(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_ilm/retry';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Start the index lifecycle management (ILM) plugin.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-start.html
	 */
	public function start(array $params = [])
	{
		$url = '/_ilm/start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Halts all lifecycle management operations and stops the index lifecycle management (ILM) plugin
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ilm-stop.html
	 */
	public function stop(array $params = [])
	{
		$url = '/_ilm/stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
