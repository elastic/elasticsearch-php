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

/**
 * Class Index
 *
 */
class Index extends AbstractEndpoint
{
    /** @var bool  */
    private $createIfAbsent = false;

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @return $this
     */
    public function createIfAbsent()
    {
        $this->createIfAbsent = true;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Index'
            );
        }

        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Index'
            );
        }

        $id    = $this->id;
        $index = $this->index;
        $type  = $this->type;
        $uri   = "/$index/$type";

        if (isset($id) === true) {
            $uri = "/$index/$type/$id";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'consistency',
            'op_type',
            'parent',
            'percolate',
            'refresh',
            'replication',
            'routing',
            'timeout',
            'timestamp',
            'ttl',
            'version',
            'version_type',
            'pipeline',
            'if_primary_term',
            'if_seq_no',
            'include_type_name'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        if (isset($this->id) === true) {
            return 'PUT';
        } else {
            return 'POST';
        }
    }

    /**
     * @return array
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     */
    public function getBody()
    {
        if (isset($this->body) !== true) {
            throw new Exceptions\RuntimeException('Document body must be set for index request');
        } else {
            return $this->body;
        }
    }
}
