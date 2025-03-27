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
class QueryRules extends AbstractEndpoint
{
	/**
	 * Deletes an individual query rule within a ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-query-rule.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset this rule exists in
	 *     rule_id: string, // (REQUIRED) The unique identifier of the rule to delete.
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
	public function deleteRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id','rule_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']) . '/_rule/' . $this->encode($params['rule_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id', 'rule_id'], $request, 'query_rules.delete_rule');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-query-ruleset.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset to delete
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
	public function deleteRuleset(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id'], $request, 'query_rules.delete_ruleset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns the details about an individual query rule within a ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-query-rule.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset the rule exists within
	 *     rule_id: string, // (REQUIRED) The unique identifier of the rule to be retrieved.
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
	public function getRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id','rule_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']) . '/_rule/' . $this->encode($params['rule_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id', 'rule_id'], $request, 'query_rules.get_rule');
		return $this->client->sendRequest($request);
	}


	/**
	 * Returns the details about a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-query-ruleset.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the query ruleset
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
	public function getRuleset(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id'], $request, 'query_rules.get_ruleset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Lists query rulesets.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-query-rulesets.html
	 *
	 * @param array{
	 *     from?: int, // Starting offset (default: 0)
	 *     size?: int, // specifies a max number of results to get (default: 100)
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
	public function listRulesets(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_query_rules';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'query_rules.list_rulesets');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or updates a query rule within a ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-query-rule.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the ruleset this rule should be added to. The ruleset will be created if it does not exist.
	 *     rule_id: string, // (REQUIRED) The unique identifier of the rule to be created or updated.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The query rule configuration, including the type of rule, the criteria to match the rule, and the action that should be taken if the rule matches.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id','rule_id','body'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']) . '/_rule/' . $this->encode($params['rule_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id', 'rule_id'], $request, 'query_rules.put_rule');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or updates a query ruleset.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-query-ruleset.html
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the ruleset to be created or updated.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The query ruleset configuration, including `rules`. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putRuleset(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id','body'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id'], $request, 'query_rules.put_ruleset');
		return $this->client->sendRequest($request);
	}


	/**
	 * Tests a query ruleset to identify the rules that would match input criteria
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/test-query-ruleset.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     ruleset_id: string, // (REQUIRED) The unique identifier of the ruleset to test.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The match criteria to test against the ruleset. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function test(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['ruleset_id','body'], $params);
		$url = '/_query_rules/' . $this->encode($params['ruleset_id']) . '/_test';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['ruleset_id'], $request, 'query_rules.test');
		return $this->client->sendRequest($request);
	}
}
