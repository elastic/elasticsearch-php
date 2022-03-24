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

namespace Elastic\Elasticsearch\Transport\Adapter;

use Elastic\Elasticsearch\Exception\HttpClientException;
use Elastic\Elasticsearch\Transport\RequestOptions as Options;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Client\ClientInterface;

class Guzzle implements AdapterInterface
{
    public function setConfig(ClientInterface $client, array $config, array $clientOptions): ClientInterface
    {
        $guzzleConfig = [];
        foreach ($config as $key => $value) {
            switch ($key) {
                case Options::SSL_CERT:
                    $guzzleConfig[RequestOptions::CERT] = $value;
                    break;
                case Options::SSL_KEY:
                    $guzzleConfig[RequestOptions::SSL_KEY] = $value;
                    break;
                case Options::SSL_VERIFY:
                    $guzzleConfig[RequestOptions::VERIFY] = $value;
                    break;
                case Options::SSL_CA:
                    $guzzleConfig[RequestOptions::VERIFY] = $value;
            }
        }
        $class = get_class($client);
        return new $class(array_merge($clientOptions, $guzzleConfig));
    }
}