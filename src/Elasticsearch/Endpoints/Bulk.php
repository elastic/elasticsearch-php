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

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Serializers\SerializerInterface;

/**
 * Class Bulk
 *
 */
class Bulk extends AbstractEndpoint implements BulkEndpointInterface
{
    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string|array|\Traversable $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        if (empty($body)) {
            return $this;
        }

        if (is_array($body) === true || $body instanceof \Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } elseif (is_string($body)) {
            $this->body = $body;
            if (substr($body, -1) != "\n") {
                $this->body .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Bulk body must be an array, traversable object or string");
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        return $this->getOptionalURI('_bulk');
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'consistency',
            'refresh',
            'replication',
            'type',
            'fields',
            'pipeline',
            '_source',
            '_source_include',
            '_source_includes',
            '_source_exclude',
            '_source_excludes',
            'pipeline',
            'seq_no_primary_term'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
