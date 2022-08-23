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

namespace Elastic\Elasticsearch;

use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    public function getTransport(): Transport;
    public function getLogger(): LoggerInterface;
    public function setAsync(bool $async): self;
    public function getAsync(): bool;
    public function setElasticMetaHeader(bool $active): self;
    public function getElasticMetaHeader(): bool;
    public function setResponseException(bool $active): self;
    public function getResponseException(): bool;
    /**
     * Send the HTTP request using the Elastic Transport.
     * It manages syncronous and asyncronus requests using Client::getAsync()
     * 
     * @return Elasticsearch|Promise
     */
    public function sendRequest(RequestInterface $request);

}