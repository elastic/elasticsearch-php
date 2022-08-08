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

use Elastic\Elasticsearch\Transport\RequestOptions;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpClient\HttpClient;

class Symfony implements AdapterInterface
{
    public function setConfig(ClientInterface $client, array $config, array $clientOptions): ClientInterface
    {
        $symfonyConfig = [];
        foreach ($config as $key => $value) {
            switch ($key) {
                case RequestOptions::SSL_CERT:
                    $symfonyConfig['local_cert'] = $value;
                    break;
                case RequestOptions::SSL_KEY:
                    $symfonyConfig['local_pk'] = $value;
                    break;
                case RequestOptions::SSL_VERIFY:
                    $symfonyConfig['verify_host'] = $value;
                    $symfonyConfig['verify_peer'] = $value;
                    break;
                case RequestOptions::SSL_CA:
                    $symfonyConfig['cafile'] = $value;
            }
        }
        $class = get_class($client);
        $httpClient = HttpClient::create(array_merge($clientOptions, $symfonyConfig));
        return new $class($httpClient);
    }
}