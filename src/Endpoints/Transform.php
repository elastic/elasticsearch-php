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
class Transform extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes an existing transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to delete
	 *     force: boolean, // When `true`, the transform is deleted regardless of its current state. The default value is `false`, meaning that the transform must be `stopped` before it can be deleted.
	 *     timeout: time, // Controls the time to wait for the transform deletion
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['force','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getTransform(array $params = [])
	{
		if (isset($params['transform_id'])) {
			$url = '/_transform/' . urlencode((string) $params['transform_id']);
			$method = 'GET';
		} else {
			$url = '/_transform';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['from','size','allow_no_match','exclude_generated']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getTransformStats(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']) . '/_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','allow_no_match']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Previews a transform.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/preview-transform.html
	 *
	 * @param array{
	 *     transform_id: string, //  The id of the transform to preview.
	 *     timeout: time, // Controls the time to wait for the preview
	 *     body: array, //  The definition for the transform to preview
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function previewTransform(array $params = [])
	{
		if (isset($params['transform_id'])) {
			$url = '/_transform/' . urlencode((string) $params['transform_id']) . '/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_transform/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 *     body: array, // (REQUIRED) The transform definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['defer_validation','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Starts one or more transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-transform.html
	 *
	 * @param array{
	 *     transform_id: string, // (REQUIRED) The id of the transform to start
	 *     timeout: time, // Controls the time to wait for the transform to start
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function startTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']) . '/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stopTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']) . '/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['force','wait_for_completion','timeout','allow_no_match','wait_for_checkpoint']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
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
	 *     body: array, // (REQUIRED) The update transform definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateTransform(array $params = [])
	{
		$this->checkRequiredParameters(['transform_id'], $params);
		$url = '/_transform/' . urlencode((string) $params['transform_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['defer_validation','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Upgrades all transforms.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/upgrade-transforms.html
	 *
	 * @param array{
	 *     dry_run: boolean, // Whether to only check for updates but don't execute
	 *     timeout: time, // Controls the time to wait for the upgrade
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function upgradeTransforms(array $params = [])
	{
		$url = '/_transform/_upgrade';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['dry_run','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
