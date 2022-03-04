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
     * Returns the URL with the query string from $params
     * extracting the array keys specified in $keys
     */
    protected function addQueryString(string $url, array $params, array $keys): string
    {
        $queryParams = [];
        foreach ($keys as $k) {
            if (isset($params[$k])) {
                $queryParams[$k] = $params[$k];
            }
        }
        if (empty($queryParams)) {
            return $url;
        }
        return $url . '?' . http_build_query($queryParams);
    }

    /**
     * Serialize the body using the Content-Type
     */
    protected function bodySerialize(array $body, string $contentType): string
    {
        if (strpos($contentType, 'application/x-ndjson') !== false) {
            return NDJsonSerializer::serialize($body, ['remove_null' => false]);
        }
        if (strpos($contentType, 'application/json') !== false) {
            return JsonSerializer::serialize($body, ['remove_null' => false]);
        }
        throw new ContentTypeException(sprintf(
            "The Content-Type %s is not managed by Elasticsearch serializer",
            $contentType
        ));
    }

    /**
     * Create a PSR-7 request
     */
    protected function createRequest(string $method, string $url, array $headers, array $body): RequestInterface
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
            $content = $this->bodySerialize($body, $headers['Content-Type']);
            $request = $request->withBody($streamFactory->createStream($content));
        }
        // Headers
        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }
        return $request;
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