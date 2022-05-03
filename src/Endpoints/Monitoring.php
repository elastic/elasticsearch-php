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
class Monitoring extends AbstractEndpoint
{
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
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The operation definition and data (action-data pairs), separated by newlines
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function bulk(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['type'])) {
			$url = '/_monitoring/' . $this->encode($params['type']) . '/bulk';
			$method = 'POST';
		} else {
			$url = '/_monitoring/bulk';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['system_id','system_api_version','interval','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
