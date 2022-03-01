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
class Shutdown extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Removes a node from the shutdown list. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id: string, // (REQUIRED) The node id of node to be removed from the shutdown state
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteNode(array $params = [])
	{
		$this->checkRequiredParameters(['node_id'], $params);
		$url = "/_nodes/{$params['node_id']}/shutdown";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieve status of a node or nodes that are currently marked as shutting down. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id: string, //  Which node for which to retrieve the shutdown status
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getNode(array $params = [])
	{
		if (isset($params['node_id'])) {
			$url = "/_nodes/{$params['node_id']}/shutdown";
			$method = 'GET';
		} else {
			$url = "/_nodes/shutdown";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Adds a node to be shut down. Designed for indirect use by ECE/ESS and ECK. Direct use is not supported.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current
	 *
	 * @param array{
	 *     node_id: string, // (REQUIRED) The node id of node to be shut down
	 *     body: array, // (REQUIRED) The shutdown type definition to register
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putNode(array $params = [])
	{
		$this->checkRequiredParameters(['node_id','body'], $params);
		$url = "/_nodes/{$params['node_id']}/shutdown";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
