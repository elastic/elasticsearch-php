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
use DateTime;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ArrayAccessException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Traits\MessageResponseTrait;
use Elastic\Elasticsearch\Traits\ProductCheckTrait;
use Elastic\Elasticsearch\Utility;
use Elastic\Transport\Exception\UnknownContentTypeException;
use Elastic\Transport\Serializer\CsvSerializer;
use Elastic\Transport\Serializer\JsonSerializer;
use Elastic\Transport\Serializer\NDJsonSerializer;
use Elastic\Transport\Serializer\XmlSerializer;
use Psr\Http\Message\ResponseInterface;
use stdClass;

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
    protected bool $serverless = false;

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
        // Check for Serverless response
        $this->serverless = $this->isServerlessResponse($response);
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
     * Check whether the response is from Serverless
     */
    private function isServerlessResponse(ResponseInterface $response): bool
    {
        return !empty($response->getHeader(Client::API_VERSION_HEADER));
    }

    /**
     * Return true if the response is from Serverless
     */
    public function isServerless(): bool
    {
        return $this->serverless;
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
            "Cannot deserialize the response as array with Content-Type: %s",
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
            "Cannot deserialize the response as object with Content-Type: %s",
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
     *
     * @return mixed
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

    /**
     * Map the response body to an object of a specific class
     * by default the class is the PHP standard one (stdClass)
     * 
     * This mapping works only for ES|QL results (with columns and values)
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/esql.html
     * 
     * @return object[] 
     */
    public function mapTo(string $class = stdClass::class): array
    {
        $response = $this->asArray();
        if (!isset($response['columns']) || !isset($response['values'])) {
            throw new UnknownContentTypeException(sprintf(
                "The response is not a valid ES|QL result. I cannot mapTo(\"%s\")",
                $class
            )); 
        }
        $iterator = [];
        $ncol = count($response['columns']);
        foreach ($response['values'] as $value) {
            $obj = new $class;
            for ($i=0; $i < $ncol; $i++) {
                $field = Utility::formatVariableName($response['columns'][$i]['name']);
                if ($class !== stdClass::class && !property_exists($obj, $field)) {
                    continue;
                }
                switch($response['columns'][$i]['type']) {
                    case 'boolean':
                        $obj->{$field} = (bool) $value[$i];
                        break;
                    case 'date':
                        $obj->{$field} = new DateTime($value[$i]);
                        break;
                    case 'alias':
                    case 'text':
                    case 'keyword':
                    case 'ip':
                        $obj->{$field} = (string) $value[$i];
                        break;
                    case 'integer':
                        $obj->{$field} = (int) $value[$i];
                        break;
                    case 'long':
                    case 'double':
                        $obj->{$field} = (float) $value[$i];
                        break;
                    case 'null':
                        $obj->{$field} = null;
                        break;
                    default:
                        $obj->{$field} = $value[$i];
                }
            }
            $iterator[] = $obj;
        }
        return $iterator;
    }
}