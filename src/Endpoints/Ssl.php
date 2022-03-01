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
class Ssl extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Retrieves information about the X.509 certificates used to encrypt communications in the cluster.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/security-api-ssl.html
	 */
	public function certificates(array $params = [])
	{
		$url = "/_ssl/certificates";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
