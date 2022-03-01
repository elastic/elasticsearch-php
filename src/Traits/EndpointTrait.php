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

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Transport\Serializer\JsonSerializer;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\RequestInterface;

trait EndpointTrait
{
    /**
     * Create a PSR-7 request
     */
    protected function createRequest(string $method, string $url, array $body = []): RequestInterface
    {
        $request = Psr17FactoryDiscovery::findRequestFactory();
        $stream = Psr17FactoryDiscovery::findStreamFactory();

        if (empty($body)) {
            return $request->createRequest($method, $url);
        }
        $content = JsonSerializer::serialize($body);
        return $request->createRequest($method, $url)->withBody($stream->createStream($content));
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