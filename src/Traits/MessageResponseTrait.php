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

use Psr\Http\Message\StreamInterface;

/**
 * Proxy class for Psr\Http\Message\ResponseInterface using
 * $this->response as source object
 */
trait MessageResponseTrait
{
    public function getProtocolVersion(): string
    {
        return $this->response->getProtocolVersion();
    }

    public function withProtocolVersion($version): static
    {
        return $this->response->withProtocolVersion($version);
    }

    public function getHeaders(): array
    {
        return $this->response->getHeaders();
    }

    public function hasHeader($name): bool
    {
        return $this->response->hasHeader($name);
    }

    public function getHeader($name): array
    {
        return $this->response->getHeader($name);
    }

    public function getHeaderLine($name): string
    {
        return $this->response->getHeaderLine($name);
    }

    public function withHeader($name, $value): static
    {
        return $this->response->withHeader($name, $value);
    }

    public function withAddedHeader($name, $value): static
    {
        return $this->response->withAddedHeader($name, $value);
    }

    public function withoutHeader($name): static
    {
        return $this->response->withoutHeader($name);
    }

    public function getBody(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function withBody(StreamInterface $body): static
    {
        return $this->response->withBody($body);
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function withStatus($code, $reasonPhrase = ''): static
    {
        return $this->response->withStatus($code, $reasonPhrase);
    }

    public function getReasonPhrase(): string
    {
        return $this->response->getReasonPhrase();
    }
}