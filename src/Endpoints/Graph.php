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
class Graph extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Explore extracted and summarized information about the documents and terms in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/graph-explore-api.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
	 *     routing: string, // Specific routing value
	 *     timeout: time, // Explicit operation timeout
	 *     body: array, //  Graph Query DSL
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function explore(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = '/' . urlencode((string) $params['index']) . '/_graph/explore';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['routing','timeout']);
		$headers = array (
		  'Accept' => 'application/json',
		  'Content-Type' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
