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
class Ccr extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Deletes auto-follow patterns.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-delete-auto-follow-pattern.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the auto follow pattern.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteAutoFollowPattern(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_ccr/auto_follow/{$params['name']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a new follower index configured to follow the referenced leader index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-put-follow.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the follower index
	 *     wait_for_active_shards: string, // Sets the number of shard copies that must be active before returning. Defaults to 0. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
	 *     body: array, // (REQUIRED) The name of the leader index and other optional ccr related parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function follow(array $params = [])
	{
		$this->checkRequiredParameters(['index','body'], $params);
		$url = "/{$params['index']}/_ccr/follow";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about all follower indices, including parameters and status for each follower index
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-get-follow-info.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index patterns; use `_all` to perform the operation on all indices
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function followInfo(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_ccr/info";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves follower stats. return shard-level stats about the following tasks associated with each shard for the specified indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-get-follow-stats.html
	 *
	 * @param array{
	 *     index: list, // (REQUIRED) A comma-separated list of index patterns; use `_all` to perform the operation on all indices
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function followStats(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_ccr/stats";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Removes the follower retention leases from the leader.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-post-forget-follower.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) the name of the leader index for which specified follower retention leases should be removed
	 *     body: array, // (REQUIRED) the name and UUID of the follower index, the name of the cluster containing the follower index, and the alias from the perspective of that cluster for the remote cluster containing the leader index
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function forgetFollower(array $params = [])
	{
		$this->checkRequiredParameters(['index','body'], $params);
		$url = "/{$params['index']}/_ccr/forget_follower";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets configured auto-follow patterns. Returns the specified auto-follow pattern collection.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-get-auto-follow-pattern.html
	 *
	 * @param array{
	 *     name: string, //  The name of the auto follow pattern.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getAutoFollowPattern(array $params = [])
	{
		if (isset($params['name'])) {
			$url = "/_ccr/auto_follow/{$params['name']}";
			$method = 'GET';
		} else {
			$url = "/_ccr/auto_follow";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Pauses an auto-follow pattern
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-pause-auto-follow-pattern.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the auto follow pattern that should pause discovering new indices to follow.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function pauseAutoFollowPattern(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_ccr/auto_follow/{$params['name']}/pause";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Pauses a follower index. The follower index will not fetch any additional operations from the leader index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-post-pause-follow.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the follower index that should pause following its leader index.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function pauseFollow(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_ccr/pause_follow";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a new named collection of auto-follow patterns against a specified remote cluster. Newly created indices on the remote cluster matching any of the specified patterns will be automatically configured as follower indices.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-put-auto-follow-pattern.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the auto follow pattern.
	 *     body: array, // (REQUIRED) The specification of the auto follow pattern
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putAutoFollowPattern(array $params = [])
	{
		$this->checkRequiredParameters(['name','body'], $params);
		$url = "/_ccr/auto_follow/{$params['name']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Resumes an auto-follow pattern that has been paused
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-resume-auto-follow-pattern.html
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) The name of the auto follow pattern to resume discovering new indices to follow.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function resumeAutoFollowPattern(array $params = [])
	{
		$this->checkRequiredParameters(['name'], $params);
		$url = "/_ccr/auto_follow/{$params['name']}/resume";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Resumes a follower index that has been paused
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-post-resume-follow.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the follow index to resume following.
	 *     body: array, //  The name of the leader index and other optional ccr related parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function resumeFollow(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_ccr/resume_follow";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets all stats related to cross-cluster replication.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-get-stats.html
	 */
	public function stats(array $params = [])
	{
		$url = "/_ccr/stats";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Stops the following task associated with a follower index and removes index metadata and settings associated with cross-cluster replication.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ccr-post-unfollow.html
	 *
	 * @param array{
	 *     index: string, // (REQUIRED) The name of the follower index that should be turned into a regular index.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function unfollow(array $params = [])
	{
		$this->checkRequiredParameters(['index'], $params);
		$url = "/{$params['index']}/_ccr/unfollow";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
