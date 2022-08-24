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
    /**
     * Get the Elastic\Transport\Transport
     */
    public function getTransport(): Transport;

    /**
     * Get the PSR-3 logger
     */
    public function getLogger(): LoggerInterface;

     /**
     * Set the asyncronous HTTP request
     */
    public function setAsync(bool $async): self;

    /**
     * Get the asyncronous HTTP request setting
     */
    public function getAsync(): bool;

    /**
     * Enable or disable the x-elastic-client-meta header
     */
    public function setElasticMetaHeader(bool $active): self;

    /**
     * Get the status of x-elastic-client-meta header
     */
    public function getElasticMetaHeader(): bool;

     /**
     * Enable or disable the response Exception
     */
    public function setResponseException(bool $active): self;

     /**
     * Get the status of response Exception
     */
    public function getResponseException(): bool;

    /**
     * Send the HTTP request using the Elastic Transport.
     * It manages syncronous and asyncronus requests using Client::getAsync()
     * 
     * @return Elasticsearch|Promise
     */
    public function sendRequest(RequestInterface $request);
}