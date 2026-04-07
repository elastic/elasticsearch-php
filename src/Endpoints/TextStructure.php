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
	 * Find the structure of a text field
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/group/endpoint-text_structure
	 *
	 * @param array{
	 *     index?: string, // The name of the index that contains the analyzed field.
	 *     field?: string, // The field that should be analyzed.
	 *     documents_to_sample?: int, // The number of documents to include in the structural analysis. The minimum value is 2. (DEFAULT: 1000)
	 *     timeout?: int|string, // The maximum amount of time that the structure analysis can take. If the analysis is still running when the timeout expires, it will be stopped. (DEFAULT: 25s)
	 *     format?: string, // The high level structure of the text. By default, the API chooses the format. In this default scenario, all rows must have the same number of fields for a delimited format to be detected. If the format is set to delimited and the delimiter is not set, however, the API tolerates up to 5% of rows that have a different number of columns than the first row.
	 *     column_names?: string|array<string>, // If `format` is set to `delimited`, you can specify the column names in a comma-separated list. If this parameter is not specified, the structure finder uses the column names from the header row of the text. If the text does not have a header row, columns are named "column1", "column2", "column3", for example.
	 *     delimiter?: string, // If you have set `format` to `delimited`, you can specify the character used to delimit the values in each row. Only a single character is supported; the delimiter cannot have multiple characters. By default, the API considers the following possibilities: comma, tab, semi-colon, and pipe (`|`). In this default scenario, all rows must have the same number of fields for the delimited format to be detected. If you specify a delimiter, up to 10% of the rows can have a different number of columns than the first row.
	 *     quote?: string, // If the format is `delimited`, you can specify the character used to quote the values in each row if they contain newlines or the delimiter character. Only a single character is supported. If this parameter is not specified, the default value is a double quote (`"`). If your delimited text format does not use quoting, a workaround is to set this argument to a character that does not appear anywhere in the sample.
	 *     should_trim_fields?: bool, // If the format is `delimited`, you can specify whether values between delimiters should have whitespace trimmed from them. If this parameter is not specified and the delimiter is pipe (`|`), the default value is true. Otherwise, the default value is `false`.
	 *     grok_pattern?: string, // If the format is `semi_structured_text`, you can specify a Grok pattern that is used to extract fields from every message in the text. The name of the timestamp field in the Grok pattern must match what is specified in the `timestamp_field` parameter. If that parameter is not specified, the name of the timestamp field in the Grok pattern must match "timestamp". If `grok_pattern` is not specified, the structure finder creates a Grok pattern.
	 *     ecs_compatibility?: string, // The mode of compatibility with ECS compliant Grok patterns. Use this parameter to specify whether to use ECS Grok patterns instead of legacy ones when the structure finder creates a Grok pattern. This setting primarily has an impact when a whole message Grok pattern such as `%{CATALINALOG}` matches the input. If the structure finder identifies a common structure but has no idea of the meaning then generic field names such as `path`, `ipaddress`, `field1`, and `field2` are used in the `grok_pattern` output. The intention in that situation is that a user who knows the meanings will rename the fields before using them. (DEFAULT: disabled)
	 *     timestamp_field?: string, // The name of the field that contains the primary timestamp of each record in the text. In particular, if the text was ingested into an index, this is the field that would be used to populate the `@timestamp` field.  If the format is `semi_structured_text`, this field must match the name of the appropriate extraction in the `grok_pattern`. Therefore, for semi-structured text, it is best not to specify this parameter unless `grok_pattern` is also specified.  For structured text, if you specify this parameter, the field must exist within the text.  If this parameter is not specified, the structure finder makes a decision about which field (if any) is the primary timestamp field. For structured text, it is not compulsory to have a timestamp in the text.
	 *     timestamp_format?: string, // The Java time format of the timestamp field in the text. Only a subset of Java time format letter groups are supported:  * `a` * `d` * `dd` * `EEE` * `EEEE` * `H` * `HH` * `h` * `M` * `MM` * `MMM` * `MMMM` * `mm` * `ss` * `XX` * `XXX` * `yy` * `yyyy` * `zzz`  Additionally `S` letter groups (fractional seconds) of length one to nine are supported providing they occur after `ss` and are separated from the `ss` by a period (`.`), comma (`,`), or colon (`:`). Spacing and punctuation is also permitted with the exception a question mark (`?`), newline, and carriage return, together with literal text enclosed in single quotes. For example, `MM/dd HH.mm.ss,SSSSSS 'in' yyyy` is a valid override format.  One valuable use case for this parameter is when the format is semi-structured text, there are multiple timestamp formats in the text, and you know which format corresponds to the primary timestamp, but you do not want to specify the full `grok_pattern`. Another is when the timestamp format is one that the structure finder does not consider by default.  If this parameter is not specified, the structure finder chooses the best format from a built-in set.  If the special value `null` is specified, the structure finder will not look for a primary timestamp in the text. When the format is semi-structured text, this will result in the structure finder treating the text as single-line messages.
	 *     explain?: bool, // If `true`, the response includes a field named `explanation`, which is an array of strings that indicate how the structure finder produced its result.
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
	 * Find the structure of text messages
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-text-structure-find-message-structure
	 *
	 * @param array{
	 *     timeout?: int|string, // The maximum amount of time that the structure analysis can take. If the analysis is still running when the timeout expires, it will be stopped. (DEFAULT: 25s)
	 *     format?: string, // The high level structure of the text. By default, the API chooses the format. In this default scenario, all rows must have the same number of fields for a delimited format to be detected. If the format is `delimited` and the delimiter is not set, however, the API tolerates up to 5% of rows that have a different number of columns than the first row.
	 *     column_names?: string|array<string>, // If the format is `delimited`, you can specify the column names in a comma-separated list. If this parameter is not specified, the structure finder uses the column names from the header row of the text. If the text does not have a header role, columns are named "column1", "column2", "column3", for example.
	 *     delimiter?: string, // If you the format is `delimited`, you can specify the character used to delimit the values in each row. Only a single character is supported; the delimiter cannot have multiple characters. By default, the API considers the following possibilities: comma, tab, semi-colon, and pipe (`|`). In this default scenario, all rows must have the same number of fields for the delimited format to be detected. If you specify a delimiter, up to 10% of the rows can have a different number of columns than the first row.
	 *     quote?: string, // If the format is `delimited`, you can specify the character used to quote the values in each row if they contain newlines or the delimiter character. Only a single character is supported. If this parameter is not specified, the default value is a double quote (`"`). If your delimited text format does not use quoting, a workaround is to set this argument to a character that does not appear anywhere in the sample.
	 *     should_trim_fields?: bool, // If the format is `delimited`, you can specify whether values between delimiters should have whitespace trimmed from them. If this parameter is not specified and the delimiter is pipe (`|`), the default value is true. Otherwise, the default value is `false`.
	 *     grok_pattern?: string, // If the format is `semi_structured_text`, you can specify a Grok pattern that is used to extract fields from every message in the text. The name of the timestamp field in the Grok pattern must match what is specified in the `timestamp_field` parameter. If that parameter is not specified, the name of the timestamp field in the Grok pattern must match "timestamp". If `grok_pattern` is not specified, the structure finder creates a Grok pattern.
	 *     ecs_compatibility?: string, // The mode of compatibility with ECS compliant Grok patterns. Use this parameter to specify whether to use ECS Grok patterns instead of legacy ones when the structure finder creates a Grok pattern. This setting primarily has an impact when a whole message Grok pattern such as `%{CATALINALOG}` matches the input. If the structure finder identifies a common structure but has no idea of meaning then generic field names such as `path`, `ipaddress`, `field1`, and `field2` are used in the `grok_pattern` output, with the intention that a user who knows the meanings rename these fields before using it. (DEFAULT: disabled)
	 *     timestamp_field?: string, // The name of the field that contains the primary timestamp of each record in the text. In particular, if the text was ingested into an index, this is the field that would be used to populate the `@timestamp` field.  If the format is `semi_structured_text`, this field must match the name of the appropriate extraction in the `grok_pattern`. Therefore, for semi-structured text, it is best not to specify this parameter unless `grok_pattern` is also specified.  For structured text, if you specify this parameter, the field must exist within the text.  If this parameter is not specified, the structure finder makes a decision about which field (if any) is the primary timestamp field. For structured text, it is not compulsory to have a timestamp in the text.
	 *     timestamp_format?: string, // The Java time format of the timestamp field in the text. Only a subset of Java time format letter groups are supported:  * `a` * `d` * `dd` * `EEE` * `EEEE` * `H` * `HH` * `h` * `M` * `MM` * `MMM` * `MMMM` * `mm` * `ss` * `XX` * `XXX` * `yy` * `yyyy` * `zzz`  Additionally `S` letter groups (fractional seconds) of length one to nine are supported providing they occur after `ss` and are separated from the `ss` by a period (`.`), comma (`,`), or colon (`:`). Spacing and punctuation is also permitted with the exception a question mark (`?`), newline, and carriage return, together with literal text enclosed in single quotes. For example, `MM/dd HH.mm.ss,SSSSSS 'in' yyyy` is a valid override format.  One valuable use case for this parameter is when the format is semi-structured text, there are multiple timestamp formats in the text, and you know which format corresponds to the primary timestamp, but you do not want to specify the full `grok_pattern`. Another is when the timestamp format is one that the structure finder does not consider by default.  If this parameter is not specified, the structure finder chooses the best format from a built-in set.  If the special value `null` is specified, the structure finder will not look for a primary timestamp in the text. When the format is semi-structured text, this will result in the structure finder treating the text as single-line messages.
	 *     explain?: bool, // If this parameter is set to true, the response includes a field named `explanation`, which is an array of strings that indicate how the structure finder produced its result.
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
	 * Find the structure of a text file
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-text-structure-find-structure
	 *
	 * @param array{
	 *     lines_to_sample?: int, // The number of lines to include in the structural analysis, starting from the beginning of the text. The minimum is 2. If the value of this parameter is greater than the number of lines in the text, the analysis proceeds (as long as there are at least two lines in the text) for all of the lines.  NOTE: The number of lines and the variation of the lines affects the speed of the analysis. For example, if you upload text where the first 1000 lines are all variations on the same message, the analysis will find more commonality than would be seen with a bigger sample. If possible, however, it is more efficient to upload sample text with more variety in the first 1000 lines than to request analysis of 100000 lines to achieve some variety. (DEFAULT: 1000)
	 *     line_merge_size_limit?: int, // The maximum number of characters in a message when lines are merged to form messages while analyzing semi-structured text. If you have extremely long messages you may need to increase this, but be aware that this may lead to very long processing times if the way to group lines into messages is misdetected. (DEFAULT: 10000)
	 *     timeout?: int|string, // The maximum amount of time that the structure analysis can take. If the analysis is still running when the timeout expires then it will be stopped. (DEFAULT: 25s)
	 *     charset?: string, // The text's character set. It must be a character set that is supported by the JVM that Elasticsearch uses. For example, `UTF-8`, `UTF-16LE`, `windows-1252`, or `EUC-JP`. If this parameter is not specified, the structure finder chooses an appropriate character set.
	 *     format?: string, // The high level structure of the text. Valid values are `ndjson`, `xml`, `delimited`, and `semi_structured_text`. By default, the API chooses the format. In this default scenario, all rows must have the same number of fields for a delimited format to be detected. If the format is set to `delimited` and the delimiter is not set, however, the API tolerates up to 5% of rows that have a different number of columns than the first row.
	 *     has_header_row?: bool, // If you have set `format` to `delimited`, you can use this parameter to indicate whether the column names are in the first row of the text. If this parameter is not specified, the structure finder guesses based on the similarity of the first row of the text to other rows.
	 *     column_names?: string|array<string>, // If you have set format to `delimited`, you can specify the column names in a comma-separated list. If this parameter is not specified, the structure finder uses the column names from the header row of the text. If the text does not have a header role, columns are named "column1", "column2", "column3", for example.
	 *     delimiter?: string, // If you have set `format` to `delimited`, you can specify the character used to delimit the values in each row. Only a single character is supported; the delimiter cannot have multiple characters. By default, the API considers the following possibilities: comma, tab, semi-colon, and pipe (`|`). In this default scenario, all rows must have the same number of fields for the delimited format to be detected. If you specify a delimiter, up to 10% of the rows can have a different number of columns than the first row.
	 *     quote?: string, // If you have set `format` to `delimited`, you can specify the character used to quote the values in each row if they contain newlines or the delimiter character. Only a single character is supported. If this parameter is not specified, the default value is a double quote (`"`). If your delimited text format does not use quoting, a workaround is to set this argument to a character that does not appear anywhere in the sample.
	 *     should_trim_fields?: bool, // If you have set `format` to `delimited`, you can specify whether values between delimiters should have whitespace trimmed from them. If this parameter is not specified and the delimiter is pipe (`|`), the default value is `true`. Otherwise, the default value is `false`.
	 *     grok_pattern?: string, // If you have set `format` to `semi_structured_text`, you can specify a Grok pattern that is used to extract fields from every message in the text. The name of the timestamp field in the Grok pattern must match what is specified in the `timestamp_field` parameter. If that parameter is not specified, the name of the timestamp field in the Grok pattern must match "timestamp". If `grok_pattern` is not specified, the structure finder creates a Grok pattern.
	 *     ecs_compatibility?: string, // The mode of compatibility with ECS compliant Grok patterns. Use this parameter to specify whether to use ECS Grok patterns instead of legacy ones when the structure finder creates a Grok pattern. Valid values are `disabled` and `v1`. This setting primarily has an impact when a whole message Grok pattern such as `%{CATALINALOG}` matches the input. If the structure finder identifies a common structure but has no idea of meaning then generic field names such as `path`, `ipaddress`, `field1`, and `field2` are used in the `grok_pattern` output, with the intention that a user who knows the meanings rename these fields before using it. (DEFAULT: disabled)
	 *     timestamp_field?: string, // The name of the field that contains the primary timestamp of each record in the text. In particular, if the text were ingested into an index, this is the field that would be used to populate the `@timestamp` field.  If the `format` is `semi_structured_text`, this field must match the name of the appropriate extraction in the `grok_pattern`. Therefore, for semi-structured text, it is best not to specify this parameter unless `grok_pattern` is also specified.  For structured text, if you specify this parameter, the field must exist within the text.  If this parameter is not specified, the structure finder makes a decision about which field (if any) is the primary timestamp field. For structured text, it is not compulsory to have a timestamp in the text.
	 *     timestamp_format?: string, // The Java time format of the timestamp field in the text.  Only a subset of Java time format letter groups are supported:  * `a` * `d` * `dd` * `EEE` * `EEEE` * `H` * `HH` * `h` * `M` * `MM` * `MMM` * `MMMM` * `mm` * `ss` * `XX` * `XXX` * `yy` * `yyyy` * `zzz`  Additionally `S` letter groups (fractional seconds) of length one to nine are supported providing they occur after `ss` and separated from the `ss` by a `.`, `,` or `:`. Spacing and punctuation is also permitted with the exception of `?`, newline and carriage return, together with literal text enclosed in single quotes. For example, `MM/dd HH.mm.ss,SSSSSS 'in' yyyy` is a valid override format.  One valuable use case for this parameter is when the format is semi-structured text, there are multiple timestamp formats in the text, and you know which format corresponds to the primary timestamp, but you do not want to specify the full `grok_pattern`. Another is when the timestamp format is one that the structure finder does not consider by default.  If this parameter is not specified, the structure finder chooses the best format from a built-in set.  If the special value `null` is specified the structure finder will not look for a primary timestamp in the text. When the format is semi-structured text this will result in the structure finder treating the text as single-line messages.
	 *     explain?: bool, // If this parameter is set to `true`, the response includes a field named explanation, which is an array of strings that indicate how the structure finder produced its result. If the structure finder produces unexpected results for some text, use this query parameter to help you determine why the returned structure was chosen.
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
	 * Test a Grok pattern
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-text-structure-test-grok-pattern
	 *
	 * @param array{
	 *     ecs_compatibility?: string, // The mode of compatibility with ECS compliant Grok patterns. Use this parameter to specify whether to use ECS Grok patterns instead of legacy ones when the structure finder creates a Grok pattern. Valid values are `disabled` and `v1`. (DEFAULT: disabled)
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
