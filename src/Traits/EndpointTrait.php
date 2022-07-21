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
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Traits;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ContentTypeException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Transport\Serializer\JsonSerializer;
use Elastic\Transport\Serializer\NDJsonSerializer;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\RequestInterface;

use function http_build_query;
use function strpos;
use function sprintf;

trait EndpointTrait
{
    /**
     * Check if an array containts nested array
     */
    private function isNestedArray(array $a): bool
    {
        foreach ($a as $v) {
            if (is_array($v)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if an array is associative, i.e. has a string as key
     */
    protected function isAssociativeArray(array $array): bool
    {
        foreach ($array as $k => $v) {
            if (is_string($k)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Converts array to comma-separated list;
     * Converts boolean value to true', 'false' string
     * 
     * @param mixed $value
     */
    private function convertValue($value): string
    {
        // Convert a boolean value in 'true' or 'false' string
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        // Convert to comma-separated list if array
        } elseif (is_array($value) && $this->isNestedArray($value) === false) {
            return implode(',', $value);
        }
        return (string) $value;
    }

    /**
     * Encode a value for a valid URL
     * 
     * @param mixed $value
     */
    protected function encode($value): string
    {
        return urlencode($this->convertValue($value));
    }

    /**
     * Returns the URL with the query string from $params
     * extracting the array keys specified in $keys
     */
    protected function addQueryString(string $url, array $params, array $keys): string
    {
        $queryParams = [];
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                $queryParams[$k] = $this->convertValue($params[$k]);
            }
        }
        if (empty($queryParams)) {
            return $url;
        }
        return $url . '?' . http_build_query($queryParams);
    }

    /**
     * Serialize the body using the Content-Type
     * 
     * @param mixed $body
     */
    protected function bodySerialize($body, string $contentType): string
    {
        if (strpos($contentType, 'application/x-ndjson') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+x-ndjson') !== false) {
            return NDJsonSerializer::serialize($body, ['remove_null' => false]);
        }
        if (strpos($contentType, 'application/json') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+json') !== false) {
            return JsonSerializer::serialize($body, ['remove_null' => false]);
        }
        throw new ContentTypeException(sprintf(
            "The Content-Type %s is not managed by Elasticsearch serializer",
            $contentType
        ));
    }

    /**
     * Create a PSR-7 request
     * 
     * @param array|string $body
     */
    protected function createRequest(string $method, string $url, array $headers, $body = null): RequestInterface
    {
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        $request = $requestFactory->createRequest($method, $url);
        // Body request
        if (!empty($body)) {
            if (!isset($headers['Content-Type'])) {
                throw new ContentTypeException(sprintf(
                    "The Content-Type is missing for %s %s", 
                    $method, 
                    $url
                ));
            }
            $content = is_string($body) ? $body : $this->bodySerialize($body, $headers['Content-Type']);
            $request = $request->withBody($streamFactory->createStream($content));
        }
        $headers = $this->buildCompatibilityHeaders($headers);

        // Headers
        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }
        return $request;
    }

    /**
     * Build the API compatibility headers
     * transfrom Content-Type and Accept adding vnd.elasticsearch+ and compatible-with
     * 
     * @see https://github.com/elastic/elasticsearch-php/pull/1142
     */
    protected function buildCompatibilityHeaders(array $headers): array
    {
        if (isset($headers['Content-Type'])) {
            if (preg_match('/application\/([^,]+)$/', $headers['Content-Type'], $matches)) {
                $headers['Content-Type'] = sprintf(Client::API_COMPATIBILITY_HEADER, 'application', $matches[1]);
            }
        }
        if (isset($headers['Accept'])) {
            $values = explode(',', $headers['Accept']);
            foreach ($values as &$value) {
                if (preg_match('/(application|text)\/([^,]+)/', $value, $matches)) { 
                    $value = sprintf(Client::API_COMPATIBILITY_HEADER, $matches[1], $matches[2]);
                }
            }
            $headers['Accept'] = implode(',', $values);
        }
        return $headers;
    }

    /**
     * Check if the $required parameters are present in $params
     * @throws MissingParameterException
     */
    protected function checkRequiredParameters(array $required, array $params): void
    {
        foreach ($required as $req) {
            if (!isset($params[$req])) {
                throw new MissingParameterException(sprintf(
                    'The parameter %s is required',
                    $req
                ));
            }
        }
    }
}