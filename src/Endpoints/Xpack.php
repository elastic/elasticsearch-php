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
class Xpack extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Retrieves information about the installed X-Pack features.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/info-api.html
	 *
	 * @param array{
	 *     categories: list, // Comma-separated list of info categories. Can be any of: build, license, features
	 *     accept_enterprise: boolean, // If this param is used it must be set to true
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function info(array $params = [])
	{
		$url = '/_xpack';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['categories','accept_enterprise']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Retrieves usage information about the installed X-Pack features.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/usage-api.html
	 *
	 * @param array{
	 *     master_timeout: time, // Specify timeout for watch write operation
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function usage(array $params = [])
	{
		$url = '/_xpack/usage';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
