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
class Features extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Gets a list of features which can be included in snapshots using the feature_states field when creating a snapshot
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-features-api.html
	 *
	 * @param array{
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getFeatures(array $params = [])
	{
		$url = '/_features';
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Resets the internal state of features, usually by deleting system indices
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 */
	public function resetFeatures(array $params = [])
	{
		$url = '/_features/_reset';
		$method = 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
