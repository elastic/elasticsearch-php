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
class SearchableSnapshots extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Retrieve node-level cache statistics about searchable snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/searchable-snapshots-apis.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     node_id: list, //  A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function cacheStats(array $params = [])
	{
		if (isset($params['node_id'])) {
			$url = "/_searchable_snapshots/{$params['node_id']}/cache/stats";
			$method = 'GET';
		} else {
			$url = "/_searchable_snapshots/cache/stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Clear the cache of searchable snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/searchable-snapshots-apis.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names
	 *     ignore_unavailable: boolean, // Whether specified concrete indices should be ignored when unavailable (missing or closed)
	 *     allow_no_indices: boolean, // Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
	 *     expand_wildcards: enum, // Whether to expand wildcard expression to concrete indices that are open, closed or both.
	 *     index: list, // A comma-separated list of index name to limit the operation
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function clearCache(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/{$params['index']}/_searchable_snapshots/cache/clear";
			$method = 'POST';
		} else {
			$url = "/_searchable_snapshots/cache/clear";
			$method = 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Mount a snapshot as a searchable index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/searchable-snapshots-api-mount-snapshot.html
	 *
	 * @param array{
	 *     repository: string, // (REQUIRED) The name of the repository containing the snapshot of the index to mount
	 *     snapshot: string, // (REQUIRED) The name of the snapshot of the index to mount
	 *     master_timeout: time, // Explicit operation timeout for connection to master node
	 *     wait_for_completion: boolean, // Should this request wait until the operation has completed before returning
	 *     storage: string, // Selects the kind of local storage used to accelerate searches. Experimental, and defaults to `full_copy`
	 *     body: array, // (REQUIRED) The restore configuration for mounting the snapshot as searchable
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function mount(array $params = [])
	{
		$this->checkRequiredParameters(['repository','snapshot','body'], $params);
		$url = "/_snapshot/{$params['repository']}/{$params['snapshot']}/_mount";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieve shard-level statistics about searchable snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/searchable-snapshots-apis.html
	 *
	 * @param array{
	 *     index: list, //  A comma-separated list of index names
	 *     level: enum, // Return stats aggregated at cluster, index or shard level
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stats(array $params = [])
	{
		if (isset($params['index'])) {
			$url = "/{$params['index']}/_searchable_snapshots/stats";
			$method = 'GET';
		} else {
			$url = "/_searchable_snapshots/stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
