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
use Elastic\Elasticsearch\Traits\ClientEndpointsTrait;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Elastic\Elasticsearch\Traits\NamespaceTrait;
use Elastic\Elasticsearch\Transport\AsyncOnSuccess;
use Elastic\Elasticsearch\Transport\AsyncOnSuccessNoException;
use Elastic\Transport\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

final class Client implements ClientInterface
{
    const CLIENT_NAME = 'es';
    const VERSION = '9.0.0';
    const API_COMPATIBILITY_HEADER = '%s/vnd.elasticsearch+%s; compatible-with=9';
    const API_VERSION_HEADER = 'elastic-api-version';
    const API_VERSION = '2023-10-31';
    
    const SEARCH_ENDPOINTS = [
        'search',
        'async_search.submit',
        'msearch',
        'eql.search',
        'terms_enum',
        'search_template',
        'msearch_template',
        'render_search_template',
        'esql.query',
        'knnSearch'
    ];
    
    use ClientEndpointsTrait;
    use EndpointTrait;
    use NamespaceTrait;
    
    protected Transport $transport;
    protected LoggerInterface $logger;
    protected bool $serverless = false;

    /**
     * Specify is the request is asyncronous
     */
    protected bool $async = false;
    
    /**
     * Enable or disable the x-elastic-meta-header
     */
    protected bool $elasticMetaHeader = true;

    /**
     * Enable or disable the response Exception
     */
    protected bool $responseException = true;

    /**
     * The endpoint namespace storage 
     */
    protected array $namespace;

    public function __construct(
        Transport $transport, 
        LoggerInterface $logger
    ) {
        $this->transport = $transport;
        $this->logger = $logger;       
        
        $this->defaultTransportSettings($this->transport);
    }

    /**
     * @inheritdoc
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

    /**
     * @inheritdoc
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Set the default settings for Elasticsearch
     */
    protected function defaultTransportSettings(Transport $transport): void
    {
        $transport->setUserAgent('elasticsearch-php', self::VERSION);
    }

    /**
     * @inheritdoc
     */
    public function setAsync(bool $async): self
    {
        $this->async = $async;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAsync(): bool
    {
        return $this->async;
    }

    /**
     * @inheritdoc
     */
    public function setElasticMetaHeader(bool $active): self
    {
        $this->elasticMetaHeader = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getElasticMetaHeader(): bool
    {
        return $this->elasticMetaHeader;
    }

    /**
     * @inheritdoc
     */
    public function setResponseException(bool $active): self
    {
        $this->responseException = $active;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getResponseException(): bool
    {
        return $this->responseException;
    }

    /**
     * @inheritdoc
     */
    public function setServerless(bool $value): self
    {
        $this->serverless = $value;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getServerless(): bool
    {
        return $this->serverless;
    }

    /**
     * @inheritdoc
     */
    public function sendRequest(RequestInterface $request)
    {   
        // If async returns a Promise
        if ($this->getAsync()) {
            if ($this->getElasticMetaHeader()) {
                $this->transport->setElasticMetaHeader(Client::CLIENT_NAME, Client::VERSION, true);
            }
            $this->transport->setAsyncOnSuccess(
                $request->getMethod() === 'HEAD'
                    ? new AsyncOnSuccessNoException($this)
                    : ($this->getResponseException() ? new AsyncOnSuccess($this) : new AsyncOnSuccessNoException($this))
            );
            return $this->transport->sendAsyncRequest($request);
        }     

        if ($this->getElasticMetaHeader()) {
            $this->transport->setElasticMetaHeader(Client::CLIENT_NAME, Client::VERSION, false);
        }
        $start = microtime(true);
        $response = $this->transport->sendRequest($request);
        $this->logger->info(sprintf("Response time in %.3f sec", microtime(true) - $start));       

        $result = new Elasticsearch;
        $result->setResponse($response, $request->getMethod() === 'HEAD' ? false : $this->getResponseException());
        $this->serverless = $result->isServerless();
        return $result;
    }
}