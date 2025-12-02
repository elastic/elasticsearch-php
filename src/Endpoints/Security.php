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
class Security extends AbstractEndpoint
{
	/**
	 * Activate a user profile
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-activate-user-profile
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The grant type and user's credential. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function activateUserProfile(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/profile/_activate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.activate_user_profile');
		return $this->client->sendRequest($request);
	}


	/**
	 * Authenticate a user
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-authenticate
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function authenticate(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/_authenticate';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.authenticate');
		return $this->client->sendRequest($request);
	}


	/**
	 * Bulk delete roles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-bulk-delete-role
	 *
	 * @param array{
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The roles to delete. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function bulkDeleteRole(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/role';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.bulk_delete_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Bulk create or update roles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-bulk-put-role
	 *
	 * @param array{
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The roles to add. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function bulkPutRole(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/role';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.bulk_put_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Bulk update API keys
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-bulk-update-api-keys
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The API key request to update the attributes of multiple API keys.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function bulkUpdateApiKeys(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/api_key/_bulk_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.bulk_update_api_keys');
		return $this->client->sendRequest($request);
	}


	/**
	 * Change passwords
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-change-password
	 *
	 * @param array{
	 *     username?: string, // The username of the user to change the password for
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) the new password for the user. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function changePassword(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['username'])) {
			$url = '/_security/user/' . $this->encode($params['username']) . '/_password';
			$method = 'PUT';
		} else {
			$url = '/_security/user/_password';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.change_password');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear the API key cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-clear-api-key-cache
	 *
	 * @param array{
	 *     ids: string|array<string>, // (REQUIRED) A comma-separated list of IDs of API keys to clear from the cache
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearApiKeyCache(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ids'], $params);
		$url = '/_security/api_key/' . $this->encode($this->convertValue($params['ids'])) . '/_clear_cache';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ids'], $request, 'security.clear_api_key_cache');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear the privileges cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-clear-cached-privileges
	 *
	 * @param array{
	 *     application: string|array<string>, // (REQUIRED) A comma-separated list of application names
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['application'], $params);
		$url = '/_security/privilege/' . $this->encode($this->convertValue($params['application'])) . '/_clear_cache';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['application'], $request, 'security.clear_cached_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear the user cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-clear-cached-realms
	 *
	 * @param array{
	 *     realms: string|array<string>, // (REQUIRED) Comma-separated list of realms to clear
	 *     usernames?: string|array<string>, // Comma-separated list of usernames to clear from the cache
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedRealms(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['realms'], $params);
		$url = '/_security/realm/' . $this->encode($this->convertValue($params['realms'])) . '/_clear_cache';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['usernames','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['realms'], $request, 'security.clear_cached_realms');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear the roles cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-clear-cached-roles
	 *
	 * @param array{
	 *     name: string|array<string>, // (REQUIRED) Role name
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedRoles(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_security/role/' . $this->encode($this->convertValue($params['name'])) . '/_clear_cache';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.clear_cached_roles');
		return $this->client->sendRequest($request);
	}


	/**
	 * Clear service account token caches
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-clear-cached-service-tokens
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name: string|array<string>, // (REQUIRED) A comma-separated list of service token names
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearCachedServiceTokens(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['namespace','service','name'], $params);
		$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']) . '/credential/token/' . $this->encode($this->convertValue($params['name'])) . '/_clear_cache';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['namespace', 'service', 'name'], $request, 'security.clear_cached_service_tokens');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create an API key
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-create-api-key
	 * @group serverless
	 *
	 * @param array{
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The api key request to create an API key. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function createApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/api_key';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.create_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a cross-cluster API key
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-create-cross-cluster-api-key
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The request to create a cross-cluster API key. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function createCrossClusterApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/cross_cluster/api_key';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.create_cross_cluster_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a service account token
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-create-service-token
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name?: string, // An identifier for the token name
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function createServiceToken(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['namespace','service'], $params);
		if (isset($params['name'])) {
			$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']) . '/credential/token/' . $this->encode($params['name']);
			$method = 'PUT';
		} else {
			$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']) . '/credential/token';
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['namespace', 'service', 'name'], $request, 'security.create_service_token');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delegate PKI authentication
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delegate-pki
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The X509Certificate chain.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function delegatePki(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/delegate_pki';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.delegate_pki');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete application privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delete-privileges
	 *
	 * @param array{
	 *     application: string, // (REQUIRED) Application name
	 *     name: string|array<string>, // (REQUIRED) Comma-separated list of privilege names.
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deletePrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['application','name'], $params);
		$url = '/_security/privilege/' . $this->encode($params['application']) . '/' . $this->encode($this->convertValue($params['name']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['application', 'name'], $request, 'security.delete_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete roles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delete-role
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role name
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteRole(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_security/role/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.delete_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete role mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delete-role-mapping
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role-mapping name
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteRoleMapping(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name'], $params);
		$url = '/_security/role_mapping/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.delete_role_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete service account tokens
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delete-service-token
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     name: string, // (REQUIRED) An identifier for the token name
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteServiceToken(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['namespace','service','name'], $params);
		$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']) . '/credential/token/' . $this->encode($params['name']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['namespace', 'service', 'name'], $request, 'security.delete_service_token');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete users
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-delete-user
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) username
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteUser(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['username'], $params);
		$url = '/_security/user/' . $this->encode($params['username']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.delete_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Disable users
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-disable-user
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the user to disable
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function disableUser(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['username'], $params);
		$url = '/_security/user/' . $this->encode($params['username']) . '/_disable';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.disable_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Disable a user profile
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-disable-user-profile
	 *
	 * @param array{
	 *     uid: string, // (REQUIRED) Unique identifier for the user profile
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function disableUserProfile(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['uid'], $params);
		$url = '/_security/profile/' . $this->encode($params['uid']) . '/_disable';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['uid'], $request, 'security.disable_user_profile');
		return $this->client->sendRequest($request);
	}


	/**
	 * Enable users
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-enable-user
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the user to enable
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function enableUser(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['username'], $params);
		$url = '/_security/user/' . $this->encode($params['username']) . '/_enable';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.enable_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Enable a user profile
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-enable-user-profile
	 *
	 * @param array{
	 *     uid: string, // (REQUIRED) An unique identifier of the user profile
	 *     refresh?: string, // If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` (the default) then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function enableUserProfile(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['uid'], $params);
		$url = '/_security/profile/' . $this->encode($params['uid']) . '/_enable';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['uid'], $request, 'security.enable_user_profile');
		return $this->client->sendRequest($request);
	}


	/**
	 * Enroll Kibana
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-enroll-kibana
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function enrollKibana(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/enroll/kibana';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.enroll_kibana');
		return $this->client->sendRequest($request);
	}


	/**
	 * Enroll a node
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-enroll-node
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function enrollNode(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/enroll/node';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.enroll_node');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get API key information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-api-key
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // API key id of the API key to be retrieved
	 *     name?: string, // API key name of the API key to be retrieved
	 *     username?: string, // user name of the user who created this API key to be retrieved
	 *     realm_name?: string, // realm name of the user who created this API key to be retrieved
	 *     owner?: bool, // flag to query API keys owned by the currently authenticated user
	 *     with_limited_by?: bool, // flag to show the limited-by role descriptors of API Keys
	 *     with_profile_uid?: bool, // flag to also retrieve the API Key's owner profile uid, if it exists
	 *     active_only?: bool, // flag to limit response to only active (not invalidated or expired) API keys
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/api_key';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['id','name','username','realm_name','owner','with_limited_by','with_profile_uid','active_only','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get builtin privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-builtin-privileges
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getBuiltinPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/privilege/_builtin';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_builtin_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get application privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-privileges
	 *
	 * @param array{
	 *     application?: string, // Application name
	 *     name?: string|array<string>, // Comma-separated list of privilege names. If you do not specify this parameter, the API returns information about all privileges for the requested application.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['application']) && isset($params['name'])) {
			$url = '/_security/privilege/' . $this->encode($params['application']) . '/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} elseif (isset($params['application'])) {
			$url = '/_security/privilege/' . $this->encode($params['application']);
			$method = 'GET';
		} else {
			$url = '/_security/privilege';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['application', 'name'], $request, 'security.get_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get roles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-role
	 * @group serverless
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of role names
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getRole(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_security/role/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_security/role';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.get_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get role mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-role-mapping
	 *
	 * @param array{
	 *     name?: string|array<string>, // A comma-separated list of role-mapping names
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getRoleMapping(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['name'])) {
			$url = '/_security/role_mapping/' . $this->encode($this->convertValue($params['name']));
			$method = 'GET';
		} else {
			$url = '/_security/role_mapping';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.get_role_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get service accounts
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-service-accounts
	 *
	 * @param array{
	 *     namespace?: string, // An identifier for the namespace
	 *     service?: string, // An identifier for the service name
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getServiceAccounts(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['namespace']) && isset($params['service'])) {
			$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']);
			$method = 'GET';
		} elseif (isset($params['namespace'])) {
			$url = '/_security/service/' . $this->encode($params['namespace']);
			$method = 'GET';
		} else {
			$url = '/_security/service';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['namespace', 'service'], $request, 'security.get_service_accounts');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get service account credentials
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-service-credentials
	 *
	 * @param array{
	 *     namespace: string, // (REQUIRED) An identifier for the namespace
	 *     service: string, // (REQUIRED) An identifier for the service name
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getServiceCredentials(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['namespace','service'], $params);
		$url = '/_security/service/' . $this->encode($params['namespace']) . '/' . $this->encode($params['service']) . '/credential';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['namespace', 'service'], $request, 'security.get_service_credentials');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get security index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-settings
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Timeout for connection to master
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getSettings(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/settings';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['master_timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get security statistics for all nodes
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-stats
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getStats(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a token
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-token
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The token request to get. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getToken(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/oauth2/token';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_token');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get users
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-user
	 *
	 * @param array{
	 *     username?: string|array<string>, // A comma-separated list of usernames
	 *     with_profile_uid?: bool, // flag to retrieve profile uid (if exists) associated to the user
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getUser(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['username'])) {
			$url = '/_security/user/' . $this->encode($this->convertValue($params['username']));
			$method = 'GET';
		} else {
			$url = '/_security/user';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['with_profile_uid','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.get_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get user privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-user-privileges
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getUserPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/user/_privileges';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.get_user_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get a user profile
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-get-user-profile
	 *
	 * @param array{
	 *     uid: string|array<string>, // (REQUIRED) A comma-separated list of unique identifier for user profiles
	 *     data?: string|array<string>, // A comma-separated list of keys for which the corresponding application data are retrieved.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getUserProfile(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['uid'], $params);
		$url = '/_security/profile/' . $this->encode($this->convertValue($params['uid']));
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['data','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['uid'], $request, 'security.get_user_profile');
		return $this->client->sendRequest($request);
	}


	/**
	 * Grant an API key
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-grant-api-key
	 *
	 * @param array{
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The api key request to create an API key. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function grantApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/api_key/grant';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.grant_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check user privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-has-privileges
	 * @group serverless
	 *
	 * @param array{
	 *     user?: string, // Username
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The privileges to test. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function hasPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		if (isset($params['user'])) {
			$url = '/_security/user/' . $this->encode($params['user']) . '/_has_privileges';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_security/user/_has_privileges';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['user'], $request, 'security.has_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Check user profile privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-has-privileges-user-profile
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The privileges to check and the list of profile IDs. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function hasPrivilegesUserProfile(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/profile/_has_privileges';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.has_privileges_user_profile');
		return $this->client->sendRequest($request);
	}


	/**
	 * Invalidate API keys
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-invalidate-api-key
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The api key request to invalidate API key(s). If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function invalidateApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/api_key';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.invalidate_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Invalidate a token
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-invalidate-token
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The token to invalidate. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function invalidateToken(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/oauth2/token';
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.invalidate_token');
		return $this->client->sendRequest($request);
	}


	/**
	 * Authenticate OpenID Connect
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-oidc-authenticate
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The OpenID Connect response to authenticate. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function oidcAuthenticate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/oidc/authenticate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.oidc_authenticate');
		return $this->client->sendRequest($request);
	}


	/**
	 * Logout of OpenID Connect
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-oidc-logout
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Access token and refresh token to invalidate. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function oidcLogout(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/oidc/logout';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.oidc_logout');
		return $this->client->sendRequest($request);
	}


	/**
	 * Prepare OpenID connect authentication
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-oidc-prepare-authentication
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The OpenID Connect authentication realm configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function oidcPrepareAuthentication(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/oidc/prepare';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.oidc_prepare_authentication');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update application privileges
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-put-privileges
	 *
	 * @param array{
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The privilege(s) to add. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putPrivileges(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/privilege';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.put_privileges');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update roles
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-put-role
	 * @group serverless
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role name
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The role to add. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putRole(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_security/role/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.put_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update role mappings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-put-role-mapping
	 *
	 * @param array{
	 *     name: string, // (REQUIRED) Role-mapping name
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The role mapping to add. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putRoleMapping(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['name','body'], $params);
		$url = '/_security/role_mapping/' . $this->encode($params['name']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['name'], $request, 'security.put_role_mapping');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update users
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-put-user
	 *
	 * @param array{
	 *     username: string, // (REQUIRED) The username of the User
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The user to add. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putUser(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['username','body'], $params);
		$url = '/_security/user/' . $this->encode($params['username']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['username'], $request, 'security.put_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Find API keys with a query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-query-api-keys
	 * @group serverless
	 *
	 * @param array{
	 *     with_limited_by?: bool, // flag to show the limited-by role descriptors of API Keys
	 *     with_profile_uid?: bool, // flag to also retrieve the API Key's owner profile uid, if it exists
	 *     typed_keys?: bool, // flag to prefix aggregation names by their respective types in the response
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // From, size, query, sort and search_after. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function queryApiKeys(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/_query/api_key';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['with_limited_by','with_profile_uid','typed_keys','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.query_api_keys');
		return $this->client->sendRequest($request);
	}


	/**
	 * Find roles with a query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-query-role
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // From, size, query, sort and search_after. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function queryRole(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/_query/role';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.query_role');
		return $this->client->sendRequest($request);
	}


	/**
	 * Find users with a query
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-query-user
	 *
	 * @param array{
	 *     with_profile_uid?: bool, // flag to retrieve profile uid (if exists) associated with the user
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // From, size, query, sort and search_after. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function queryUser(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/_query/user';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['with_profile_uid','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.query_user');
		return $this->client->sendRequest($request);
	}


	/**
	 * Authenticate SAML
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-authenticate
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The SAML response to authenticate. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlAuthenticate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/saml/authenticate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.saml_authenticate');
		return $this->client->sendRequest($request);
	}


	/**
	 * Logout of SAML completely
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-complete-logout
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The logout response to verify. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlCompleteLogout(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/saml/complete_logout';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.saml_complete_logout');
		return $this->client->sendRequest($request);
	}


	/**
	 * Invalidate SAML
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-invalidate
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The LogoutRequest message. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlInvalidate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/saml/invalidate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.saml_invalidate');
		return $this->client->sendRequest($request);
	}


	/**
	 * Logout of SAML
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-logout
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The tokens to invalidate. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlLogout(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/saml/logout';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.saml_logout');
		return $this->client->sendRequest($request);
	}


	/**
	 * Prepare SAML authentication
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-prepare-authentication
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The realm for which to create the authentication request, identified by either its name or the ACS URL. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlPrepareAuthentication(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/saml/prepare';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.saml_prepare_authentication');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create SAML service provider metadata
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-saml-service-provider-metadata
	 *
	 * @param array{
	 *     realm_name: string, // (REQUIRED) The name of the SAML realm to get the metadata for
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function samlServiceProviderMetadata(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['realm_name'], $params);
		$url = '/_security/saml/metadata/' . $this->encode($params['realm_name']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['realm_name'], $request, 'security.saml_service_provider_metadata');
		return $this->client->sendRequest($request);
	}


	/**
	 * Suggest a user profile
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-suggest-user-profiles
	 *
	 * @param array{
	 *     data?: string|array<string>, // A comma-separated list of keys for which the corresponding application data are retrieved.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The suggestion definition for user profiles. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function suggestUserProfiles(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_security/profile/_suggest';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['data','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.suggest_user_profiles');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update an API key
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-update-api-key
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the API key to update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The API key request to update attributes of an API key.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_security/api_key/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'security.update_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a cross-cluster API key
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-update-cross-cluster-api-key
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the cross-cluster API key to update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The request to update attributes of a cross-cluster API key.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateCrossClusterApiKey(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_security/cross_cluster/api_key/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'security.update_cross_cluster_api_key');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update security index settings
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-update-settings
	 *
	 * @param array{
	 *     master_timeout?: int|string, // Timeout for connection to master
	 *     timeout?: int|string, // Timeout for acknowledgements from all nodes
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) An object with the new settings for each index, if any. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateSettings(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_security/settings';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'security.update_settings');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update user profile data
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-security-update-user-profile-data
	 *
	 * @param array{
	 *     uid: string, // (REQUIRED) An unique identifier of the user profile
	 *     if_seq_no?: int, // only perform the update operation if the last operation that has changed the document has the specified sequence number
	 *     if_primary_term?: int, // only perform the update operation if the last operation that has changed the document has the specified primary term
	 *     refresh?: string, // If `true` (the default) then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` then do nothing with refreshes.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The application data to update. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateUserProfileData(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['uid','body'], $params);
		$url = '/_security/profile/' . $this->encode($params['uid']) . '/_data';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['if_seq_no','if_primary_term','refresh','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['uid'], $request, 'security.update_user_profile_data');
		return $this->client->sendRequest($request);
	}
}
