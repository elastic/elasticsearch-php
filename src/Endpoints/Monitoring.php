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
class Monitoring extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Used by the monitoring features to send monitoring data.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/monitor-elasticsearch-cluster.html
	 *
	 * @param array{
	 *     type: string, //  Default document type for items which don't provide one
	 *     system_id: string, // Identifier of the monitored system
	 *     system_api_version: string, // API Version of the monitored system
	 *     interval: string, // Collection interval (e.g., '10s' or '10000ms') of the payload
	 *     body: array, // (REQUIRED) The operation definition and data (action-data pairs), separated by newlines
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function bulk(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['type'])) {
			$url = "/_monitoring/{$params['type']}/bulk";
			$method = 'POST';
		} else {
			$url = "/_monitoring/bulk";
			$method = 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
