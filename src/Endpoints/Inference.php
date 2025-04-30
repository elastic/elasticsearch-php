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
class Inference extends AbstractEndpoint
{
	/**
	 * Perform chat completion inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/chat-completion-inference.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function chatCompletionUnified(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/chat_completion/' . $this->encode($params['inference_id']) . '/_stream';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/event-stream',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.chat_completion_unified');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform completion inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function completion(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/completion/' . $this->encode($params['inference_id']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.completion');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/delete-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type?: string, // The task type
	 *     dry_run?: bool, // If true the endpoint will not be deleted and a list of ingest processors which reference this endpoint will be returned.
	 *     force?: bool, // If true the endpoint will be forcefully stopped (regardless of whether or not it is referenced by any ingest processors or semantic text fields).
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
	public function delete(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'DELETE';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['dry_run','force','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.delete');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get an inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/get-inference-api.html
	 *
	 * @param array{
	 *     inference_id?: string, // The inference Id
	 *     task_type?: string, // The task type
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
	public function get(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['task_type']) && isset($params['inference_id'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'GET';
		} elseif (isset($params['inference_id'])) {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'GET';
		} else {
			$url = '/_inference';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.get');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type?: string, // The task type
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function inference(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'POST';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.inference');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an inference endpoint for use in the Inference API
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/put-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type?: string, // The task type
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function put(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']);
			$method = 'PUT';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']);
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.put');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an AlibabaCloud AI Search inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-alibabacloud-ai-search.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     alibabacloud_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAlibabacloud(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','alibabacloud_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['alibabacloud_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'alibabacloud_inference_id'], $request, 'inference.put_alibabacloud');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an Amazon Bedrock inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-amazon-bedrock.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     amazonbedrock_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAmazonbedrock(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','amazonbedrock_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['amazonbedrock_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'amazonbedrock_inference_id'], $request, 'inference.put_amazonbedrock');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an Anthropic inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-anthropic.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     anthropic_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAnthropic(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','anthropic_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['anthropic_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'anthropic_inference_id'], $request, 'inference.put_anthropic');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an Azure AI Studio inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-azure-ai-studio.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     azureaistudio_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAzureaistudio(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','azureaistudio_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['azureaistudio_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'azureaistudio_inference_id'], $request, 'inference.put_azureaistudio');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an Azure OpenAI inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-azure-openai.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     azureopenai_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putAzureopenai(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','azureopenai_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['azureopenai_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'azureopenai_inference_id'], $request, 'inference.put_azureopenai');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a Cohere inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-cohere.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     cohere_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putCohere(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','cohere_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['cohere_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'cohere_inference_id'], $request, 'inference.put_cohere');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an Elasticsearch inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-elasticsearch.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     elasticsearch_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putElasticsearch(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','elasticsearch_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['elasticsearch_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'elasticsearch_inference_id'], $request, 'inference.put_elasticsearch');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an ELSER inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-elser.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     elser_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putElser(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','elser_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['elser_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'elser_inference_id'], $request, 'inference.put_elser');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a Google AI Studio inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-google-ai-studio.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     googleaistudio_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putGoogleaistudio(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','googleaistudio_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['googleaistudio_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'googleaistudio_inference_id'], $request, 'inference.put_googleaistudio');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a Google Vertex AI inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-google-vertex-ai.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     googlevertexai_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putGooglevertexai(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','googlevertexai_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['googlevertexai_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'googlevertexai_inference_id'], $request, 'inference.put_googlevertexai');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a HuggingFace inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-hugging-face.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     huggingface_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putHuggingFace(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','huggingface_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['huggingface_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'huggingface_inference_id'], $request, 'inference.put_hugging_face');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a JinaAI inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-jinaai.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     jinaai_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putJinaai(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','jinaai_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['jinaai_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'jinaai_inference_id'], $request, 'inference.put_jinaai');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a Mistral inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-mistral.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     mistral_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putMistral(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','mistral_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['mistral_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'mistral_inference_id'], $request, 'inference.put_mistral');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure an OpenAI inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-openai.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     openai_inference_id: string, // (REQUIRED) The inference ID
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putOpenai(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','openai_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['openai_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'openai_inference_id'], $request, 'inference.put_openai');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a VoyageAI inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/inference-apis.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     voyageai_inference_id: string, // (REQUIRED) The inference ID
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putVoyageai(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','voyageai_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['voyageai_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'voyageai_inference_id'], $request, 'inference.put_voyageai');
		return $this->client->sendRequest($request);
	}


	/**
	 * Configure a Watsonx inference endpoint
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/infer-service-watsonx-ai.html
	 *
	 * @param array{
	 *     task_type: string, // (REQUIRED) The task type
	 *     watsonx_inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putWatsonx(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['task_type','watsonx_inference_id'], $params);
		$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['watsonx_inference_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['task_type', 'watsonx_inference_id'], $request, 'inference.put_watsonx');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform reranking inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function rerank(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/rerank/' . $this->encode($params['inference_id']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.rerank');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform sparse embedding inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function sparseEmbedding(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/sparse_embedding/' . $this->encode($params['inference_id']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.sparse_embedding');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform streaming completion inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-stream-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function streamCompletion(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/completion/' . $this->encode($params['inference_id']) . '/_stream';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'text/event-stream',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.stream_completion');
		return $this->client->sendRequest($request);
	}


	/**
	 * Perform text embedding inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/post-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference payload. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function textEmbedding(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		$url = '/_inference/text_embedding/' . $this->encode($params['inference_id']);
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id'], $request, 'inference.text_embedding');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update inference
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/update-inference-api.html
	 *
	 * @param array{
	 *     inference_id: string, // (REQUIRED) The inference Id
	 *     task_type?: string, // The task type
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The inference endpoint's task and service settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function update(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['inference_id'], $params);
		if (isset($params['task_type'])) {
			$url = '/_inference/' . $this->encode($params['task_type']) . '/' . $this->encode($params['inference_id']) . '/_update';
			$method = 'PUT';
		} else {
			$url = '/_inference/' . $this->encode($params['inference_id']) . '/_update';
			$method = 'PUT';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['inference_id', 'task_type'], $request, 'inference.update');
		return $this->client->sendRequest($request);
	}
}
