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
	 * Finds the structure of a text file. The text file must contain data that is suitable to be ingested into Elasticsearch.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/find-structure.html
	 *
	 * @param array{
	 *     lines_to_sample: int, // How many lines of the file should be included in the analysis
	 *     line_merge_size_limit: int, // Maximum number of characters permitted in a single message when lines are merged to create messages.
	 *     timeout: time, // Timeout after which the analysis will be aborted
	 *     charset: string, // Optional parameter to specify the character set of the file
	 *     format: enum, // Optional parameter to specify the high level file format
	 *     has_header_row: boolean, // Optional parameter to specify whether a delimited file includes the column names in its first row
	 *     column_names: list, // Optional parameter containing a comma separated list of the column names for a delimited file
	 *     delimiter: string, // Optional parameter to specify the delimiter character for a delimited file - must be a single character
	 *     quote: string, // Optional parameter to specify the quote character for a delimited file - must be a single character
	 *     should_trim_fields: boolean, // Optional parameter to specify whether the values between delimiters in a delimited file should have whitespace trimmed from them
	 *     grok_pattern: string, // Optional parameter to specify the Grok pattern that should be used to extract fields from messages in a semi-structured text file
	 *     ecs_compatibility: string, // Optional parameter to specify the compatibility mode with ECS Grok patterns - may be either 'v1' or 'disabled'
	 *     timestamp_field: string, // Optional parameter to specify the timestamp field in the file
	 *     timestamp_format: string, // Optional parameter to specify the timestamp format in the file - may be either a Joda or Java time format
	 *     explain: boolean, // Whether to include a commentary on how the structure was derived
	 *     pretty: boolean, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human: boolean, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace: boolean, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path: list, // A comma-separated list of filters used to reduce the response.
	 *     body: array, // (REQUIRED) The contents of the file to be analyzed
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function findStructure(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_text_structure/find_structure';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['lines_to_sample','line_merge_size_limit','timeout','charset','format','has_header_row','column_names','delimiter','quote','should_trim_fields','grok_pattern','ecs_compatibility','timestamp_field','timestamp_format','explain','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/x-ndjson',
		];
		return $this->client->sendRequest($this->createRequest($method, $url, $headers, $params['body'] ?? null));
	}
}
