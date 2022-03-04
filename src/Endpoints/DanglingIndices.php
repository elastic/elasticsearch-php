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
class DanglingIndices extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes the specified dangling index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 *
	 * @param array{
	 *     index_uuid: string, // (REQUIRED) The UUID of the dangling index
	 *     accept_data_loss: boolean, // Must be set to true in order to delete the dangling index
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteDanglingIndex(array $params = [])
	{
		$this->checkRequiredParameters(['index_uuid'], $params);
		$url = '/_dangling/' . urlencode((string) $params['index_uuid']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['accept_data_loss','timeout','master_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Imports the specified dangling index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 *
	 * @param array{
	 *     index_uuid: string, // (REQUIRED) The UUID of the dangling index
	 *     accept_data_loss: boolean, // Must be set to true in order to import the dangling index
	 *     timeout: time, // Explicit operation timeout
	 *     master_timeout: time, // Specify timeout for connection to master
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function importDanglingIndex(array $params = [])
	{
		$this->checkRequiredParameters(['index_uuid'], $params);
		$url = '/_dangling/' . urlencode((string) $params['index_uuid']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['accept_data_loss','timeout','master_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Returns all dangling indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-gateway-dangling-indices.html
	 */
	public function listDanglingIndices(array $params = [])
	{
		$url = '/_dangling';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, []);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
