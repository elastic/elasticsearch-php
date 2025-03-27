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
class Synonyms extends AbstractEndpoint
{
	/**
	 * Deletes a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonyms-set.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The id of the synonyms set to be deleted
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
	public function deleteSynonym(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_synonyms/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'synonyms.delete_synonym');
		return $this->client->sendRequest($request);
	}


	/**
	 * Deletes a synonym rule in a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-synonym-rule.html
	 *
	 * @param array{
	 *     set_id: string, // (REQUIRED) The id of the synonym set to be updated
	 *     rule_id: string, // (REQUIRED) The id of the synonym rule to be deleted
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
	public function deleteSynonymRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['set_id','rule_id'], $params);
		$url = '/_synonyms/' . $this->encode($params['set_id']) . '/' . $this->encode($params['rule_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['set_id', 'rule_id'], $request, 'synonyms.delete_synonym_rule');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonyms-set.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The name of the synonyms set to be retrieved
	 *     from?: int, // Starting offset
	 *     size?: int, // specifies a max number of results to get
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
	public function getSynonym(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_synonyms/' . $this->encode($params['id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'synonyms.get_synonym');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves a synonym rule from a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-synonym-rule.html
	 *
	 * @param array{
	 *     set_id: string, // (REQUIRED) The id of the synonym set to retrieve the synonym rule from
	 *     rule_id: string, // (REQUIRED) The id of the synonym rule to retrieve
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
	public function getSynonymRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['set_id','rule_id'], $params);
		$url = '/_synonyms/' . $this->encode($params['set_id']) . '/' . $this->encode($params['rule_id']);
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['set_id', 'rule_id'], $request, 'synonyms.get_synonym_rule');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves a summary of all defined synonym sets
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/list-synonyms-sets.html
	 *
	 * @param array{
	 *     from?: int, // Starting offset
	 *     size?: int, // specifies a max number of results to get
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
	public function getSynonymsSets(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_synonyms';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'synonyms.get_synonyms_sets');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or updates a synonyms set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonyms-set.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The id of the synonyms set to be created or updated
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Synonyms set rules. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putSynonym(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_synonyms/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'synonyms.put_synonym');
		return $this->client->sendRequest($request);
	}


	/**
	 * Creates or updates a synonym rule in a synonym set
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-synonym-rule.html
	 *
	 * @param array{
	 *     set_id: string, // (REQUIRED) The id of the synonym set to be updated with the synonym rule
	 *     rule_id: string, // (REQUIRED) The id of the synonym rule to be updated or created
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) Synonym rule. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putSynonymRule(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['set_id','rule_id','body'], $params);
		$url = '/_synonyms/' . $this->encode($params['set_id']) . '/' . $this->encode($params['rule_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['set_id', 'rule_id'], $request, 'synonyms.put_synonym_rule');
		return $this->client->sendRequest($request);
	}
}
