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

class ElasticCurl implements AdapterInterface
{
    public function setConfig(ClientInterface $client, array $config, array $clientOptions): ClientInterface
    {
        $curlConfig = [];
        foreach ($config as $key => $value) {
            switch ($key) {
                case RequestOptions::SSL_CERT:
                    $curlConfig[CURLOPT_SSLCERT] = $value;
                    break;
                case RequestOptions::SSL_KEY:
                    $curlConfig[CURLOPT_SSH_PRIVATE_KEYFILE] = $value;
                    break;
                case RequestOptions::SSL_VERIFY:
                    $curlConfig[CURLOPT_SSL_VERIFYPEER] = $value;
                    break;
                case RequestOptions::SSL_CA:
                    $curlConfig[CURLOPT_CAINFO] = $value;
            }
        }
        $class = get_class($client);
        return new $class(array_replace($clientOptions, $curlConfig));
    }
}