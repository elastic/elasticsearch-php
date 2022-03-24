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

namespace Elastic\Elasticsearch\Transport;

final class RequestOptions
{
    /**
     * Enable or sidable the SSL verification
     */
    public const SSL_VERIFY = 'ssl_verify';

    /**
     * SSL certificate
     */
    public const SSL_CERT = 'ssl_cert';

    /**
     * SSL key
     */
    public const SSL_KEY = 'ssl_key';

    /**
     * SSL Certificate Authority (CA) bundle 
     */
    public const SSL_CA = 'ssl_ca';
}