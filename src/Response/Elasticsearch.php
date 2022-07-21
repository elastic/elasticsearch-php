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

namespace Elastic\Elasticsearch\Response;

use ArrayAccess;
use Elastic\Elasticsearch\Exception\ArrayAccessException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Traits\MessageResponseTrait;
use Elastic\Elasticsearch\Traits\ProductCheckTrait;
use Elastic\Transport\Exception\UnknownContentTypeException;
use Elastic\Transport\Serializer\CsvSerializer;
use Elastic\Transport\Serializer\JsonSerializer;
use Elastic\Transport\Serializer\NDJsonSerializer;
use Elastic\Transport\Serializer\XmlSerializer;
use Psr\Http\Message\ResponseInterface;

/**
 * Wraps a PSR-7 ResponseInterface offering helpers to deserialize the body response
 */
class Elasticsearch implements ElasticsearchInterface, ResponseInterface, ArrayAccess
{
    const HEADER_CHECK = 'X-Elastic-Product';
    const PRODUCT_NAME = 'Elasticsearch';

    use ProductCheckTrait;
    use MessageResponseTrait;

    protected array $asArray;
    protected object $asObject;
    protected string $asString;

    /**
     * The PSR-7 response
     */
    protected ResponseInterface $response;

    /**
     * Enable or disable the response Exception
     */
    protected bool $responseException;

    /**
     * @throws ClientResponseException if status code 4xx
     * @throws ServerResponseException if status code 5xx
     */
    public function setResponse(ResponseInterface $response, bool $throwException = true): void
    {
        $this->productCheck($response);
        $this->response = $response;
        $status = $response->getStatusCode();
        if ($throwException && $status > 399 && $status < 500) {
            $error = new ClientResponseException(
                sprintf("%s %s: %s", $status, $response->getReasonPhrase(), (string) $response->getBody()),
                $status
            );
            throw $error->setResponse($response);
        } elseif ($throwException && $status > 499 && $status < 600) {
            $error = new ServerResponseException(
                sprintf("%s %s: %s", $status, $response->getReasonPhrase(), (string) $response->getBody()),
                $status
            );
            throw $error->setResponse($response);
        }
    }

    /**
     * Return true if status code is 2xx
     */
    public function asBool(): bool
    {
        return $this->response->getStatusCode() >=200 && $this->response->getStatusCode() < 300;
    }

    /**
     * Converts the body content to array, if possible.
     * Otherwise, it throws an UnknownContentTypeException
     * if Content-Type is not specified or unknown.
     * 
     * @throws UnknownContentTypeException
     */
    public function asArray(): array
    {
        if (isset($this->asArray)) {
            return $this->asArray;
        }
        if (!$this->response->hasHeader('Content-Type')) {
            throw new UnknownContentTypeException('No Content-Type specified in the response');
        }
        $contentType = $this->response->getHeaderLine('Content-Type');
        if (strpos($contentType, 'application/json') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+json') !== false) {
            $this->asArray = JsonSerializer::unserialize($this->asString());
            return $this->asArray;
        }
        if (strpos($contentType, 'application/x-ndjson') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+x-ndjson') !== false) {
            $this->asArray = NDJsonSerializer::unserialize($this->asString());
            return $this->asArray;
        }
        if (strpos($contentType, 'text/csv') !== false) {
            $this->asArray = CsvSerializer::unserialize($this->asString());
            return $this->asArray;
        }
        throw new UnknownContentTypeException(sprintf(
            "Cannot deserialize the reponse as array with Content-Type: %s",
            $contentType
        ));
    }

    /**
     * Converts the body content to object, if possible.
     * Otherwise, it throws an UnknownContentTypeException
     * if Content-Type is not specified or unknown.
     * 
     * @throws UnknownContentTypeException
     */
    public function asObject(): object
    {
        if (isset($this->asObject)) {
            return $this->asObject;
        }
        $contentType = $this->response->getHeaderLine('Content-Type');
        if (strpos($contentType, 'application/json') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+json') !== false) {
            $this->asObject = JsonSerializer::unserialize($this->asString(), ['type' => 'object']);
            return $this->asObject;
        }
        if (strpos($contentType, 'application/x-ndjson') !== false ||
            strpos($contentType, 'application/vnd.elasticsearch+x-ndjson') !== false) {
            $this->asObject = NDJsonSerializer::unserialize($this->asString(), ['type' => 'object']);
            return $this->asObject;
        }
        if (strpos($contentType, 'text/xml') !== false || strpos($contentType, 'application/xml') !== false) {
            $this->asObject = XmlSerializer::unserialize($this->asString());
            return $this->asObject;
        }
        throw new UnknownContentTypeException(sprintf(
            "Cannot deserialize the reponse as object with Content-Type: %s",
            $contentType
        ));
    }

    /**
     * Converts the body content to string
     */
    public function asString(): string
    {
        if (empty($this->asString)) {
            $this->asString = (string) $this->response->getBody();
        }
        return $this->asString;
    }

    /**
     * Converts the body content to string
     */
    public function __toString(): string
    {
        return $this->asString();
    }

    /**
     * Access the body content as object properties
     * 
     * @see https://www.php.net/manual/en/language.oop5.overloading.php#object.get
     */
    public function __get($name)
    {
        return $this->asObject()->$name ?? null;
    }

    /**
     * ArrayAccess interface
     * 
     * @see https://www.php.net/manual/en/class.arrayaccess.php
     */
    public function offsetExists($offset): bool
    {
        return isset($this->asArray()[$offset]);
    }
 
    /**
     * ArrayAccess interface
     * 
     * @see https://www.php.net/manual/en/class.arrayaccess.php
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->asArray()[$offset];
    }

    /**
     * ArrayAccess interface
     * 
     * @see https://www.php.net/manual/en/class.arrayaccess.php
     */
    public function offsetSet($offset, $value): void
    {
        throw new ArrayAccessException('The array is reading only');
    }

    /**
     * ArrayAccess interface
     * 
     * @see https://www.php.net/manual/en/class.arrayaccess.php
     */
    public function offsetUnset($offset): void
    {
        throw new ArrayAccessException('The array is reading only');
    }
}