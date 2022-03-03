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
class Migration extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Retrieves information about different cluster, node, and index level settings that use deprecated features that will be removed or changed in the next major version.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/migration-api-deprecation.html
	 *
	 * @param array{
	 *     index: string, //  Index pattern
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deprecations(array $params = [])
	{
		if (isset($params['index'])) {
			$url = '/' . urlencode((string) $params['index']) . '/_migration/deprecations';
			$method = 'GET';
		} else {
			$url = '/_migration/deprecations';
			$method = 'GET';
		}
		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Find out whether system features need to be upgraded or not
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/migration-api-feature-upgrade.html
	 */
	public function getFeatureUpgradeStatus(array $params = [])
	{
		$url = '/_migration/system_features';
		$method = 'GET';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}


	/**
	 * Begin upgrades for system features
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/migration-api-feature-upgrade.html
	 */
	public function postFeatureUpgrade(array $params = [])
	{
		$url = '/_migration/system_features';
		$method = 'POST';

		$headers = array (
		  'Accept' => 'application/json',
		);
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? []));
	}
}
