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
class TextStructure extends AbstractEndpoint
{
	/**
	 * Finds the structure of a text field in an index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/find-field-structure.html
	 *
	 * @param array{
	 *     index?: string, // The index containing the analyzed field
	 *     field?: string, // The field that should be analyzed
	 *     documents_to_sample?: int, // How many documents should be included in the analysis
	 *     timeout?: int|string, // Timeout after which the analysis will be aborted
	 *     format?: string, // Optional parameter to specify the high level file format
	 *     column_names?: string|array<string>, // Optional parameter containing a comma separated list of the column names for a delimited file
	 *     delimiter?: string, // Optional parameter to specify the delimiter character for a delimited file - must be a single character
	 *     quote?: string, // Optional parameter to specify the quote character for a delimited file - must be a single character
	 *     should_trim_fields?: bool, // Optional parameter to specify whether the values between delimiters in a delimited file should have whitespace trimmed from them
	 *     grok_pattern?: string, // Optional parameter to specify the Grok pattern that should be used to extract fields from messages in a semi-structured text file
	 *     ecs_compatibility?: string, // Optional parameter to specify the compatibility mode with ECS Grok patterns - may be either 'v1' or 'disabled'
	 *     timestamp_field?: string, // Optional parameter to specify the timestamp field in the file
	 *     timestamp_format?: string, // Optional parameter to specify the timestamp format in the file - may be either a Joda or Java time format
	 *     explain?: bool, // Whether to include a commentary on how the structure was derived
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
	public function findFieldStructure(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['index','field'], $params);
		$url = '/_text_structure/find_field_structure';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['index','field','documents_to_sample','timeout','format','column_names','delimiter','quote','should_trim_fields','grok_pattern','ecs_compatibility','timestamp_field','timestamp_format','explain','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'text_structure.find_field_structure');
		return $this->client->sendRequest($request);
	}


	/**
	 * Finds the structure of a list of messages. The messages must contain data that is suitable to be ingested into Elasticsearch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/find-message-structure.html
	 *
	 * @param array{
	 *     timeout?: int|string, // Timeout after which the analysis will be aborted
	 *     format?: string, // Optional parameter to specify the high level file format
	 *     column_names?: string|array<string>, // Optional parameter containing a comma separated list of the column names for a delimited file
	 *     delimiter?: string, // Optional parameter to specify the delimiter character for a delimited file - must be a single character
	 *     quote?: string, // Optional parameter to specify the quote character for a delimited file - must be a single character
	 *     should_trim_fields?: bool, // Optional parameter to specify whether the values between delimiters in a delimited file should have whitespace trimmed from them
	 *     grok_pattern?: string, // Optional parameter to specify the Grok pattern that should be used to extract fields from messages in a semi-structured text file
	 *     ecs_compatibility?: string, // Optional parameter to specify the compatibility mode with ECS Grok patterns - may be either 'v1' or 'disabled'
	 *     timestamp_field?: string, // Optional parameter to specify the timestamp field in the file
	 *     timestamp_format?: string, // Optional parameter to specify the timestamp format in the file - may be either a Joda or Java time format
	 *     explain?: bool, // Whether to include a commentary on how the structure was derived
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) JSON object with one field [messages], containing an array of messages to be analyzed. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function findMessageStructure(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_text_structure/find_message_structure';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','format','column_names','delimiter','quote','should_trim_fields','grok_pattern','ecs_compatibility','timestamp_field','timestamp_format','explain','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'text_structure.find_message_structure');
		return $this->client->sendRequest($request);
	}


	/**
	 * Finds the structure of a text file. The text file must contain data that is suitable to be ingested into Elasticsearch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/find-structure.html
	 *
	 * @param array{
	 *     lines_to_sample?: int, // How many lines of the file should be included in the analysis
	 *     line_merge_size_limit?: int, // Maximum number of characters permitted in a single message when lines are merged to create messages.
	 *     timeout?: int|string, // Timeout after which the analysis will be aborted
	 *     charset?: string, // Optional parameter to specify the character set of the file
	 *     format?: string, // Optional parameter to specify the high level file format
	 *     has_header_row?: bool, // Optional parameter to specify whether a delimited file includes the column names in its first row
	 *     column_names?: string|array<string>, // Optional parameter containing a comma separated list of the column names for a delimited file
	 *     delimiter?: string, // Optional parameter to specify the delimiter character for a delimited file - must be a single character
	 *     quote?: string, // Optional parameter to specify the quote character for a delimited file - must be a single character
	 *     should_trim_fields?: bool, // Optional parameter to specify whether the values between delimiters in a delimited file should have whitespace trimmed from them
	 *     grok_pattern?: string, // Optional parameter to specify the Grok pattern that should be used to extract fields from messages in a semi-structured text file
	 *     ecs_compatibility?: string, // Optional parameter to specify the compatibility mode with ECS Grok patterns - may be either 'v1' or 'disabled'
	 *     timestamp_field?: string, // Optional parameter to specify the timestamp field in the file
	 *     timestamp_format?: string, // Optional parameter to specify the timestamp format in the file - may be either a Joda or Java time format
	 *     explain?: bool, // Whether to include a commentary on how the structure was derived
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The contents of the file to be analyzed. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function findStructure(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_text_structure/find_structure';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['lines_to_sample','line_merge_size_limit','timeout','charset','format','has_header_row','column_names','delimiter','quote','should_trim_fields','grok_pattern','ecs_compatibility','timestamp_field','timestamp_format','explain','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'text_structure.find_structure');
		return $this->client->sendRequest($request);
	}


	/**
	 * Tests a Grok pattern on some text.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/test-grok-pattern.html
	 *
	 * @param array{
	 *     ecs_compatibility?: string, // Optional parameter to specify the compatibility mode with ECS Grok patterns - may be either 'v1' or 'disabled'
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The Grok pattern and text.. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function testGrokPattern(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_text_structure/test_grok_pattern';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['ecs_compatibility','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'text_structure.test_grok_pattern');
		return $this->client->sendRequest($request);
	}
}
