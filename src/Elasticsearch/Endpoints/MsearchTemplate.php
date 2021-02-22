<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

/**
 * Class MsearchTemplate
 *
 */
class MsearchTemplate extends AbstractEndpoint
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array|string $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        if (is_array($body) === true) {
            $bulkBody = "";
            foreach ($body as $item) {
                $bulkBody .= $this->serializer->serialize($item)."\n";
            }
            $body = $bulkBody;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $type = $this->type;
        $uri   = "/_msearch/template";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_msearch/template";
        } elseif (isset($index) === true) {
            $uri = "/$index/_msearch/template";
        } elseif (isset($type) === true) {
            $uri = "/_all/$type/_msearch/template";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'search_type',
            'typed_keys',
            'max_concurrent_searches'
        );
    }

    /**
     * @return array
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Body is required for MSearch');
        }

        return $this->body;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
