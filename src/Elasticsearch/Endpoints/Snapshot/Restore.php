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

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Restore
 *
 */
class Restore extends AbstractEndpoint
{
    /**
     * A repository name
     *
     * @var string
     */
    private $repository;

    /**
     * A snapshot name
     *
     * @var string
     */
    private $snapshot;

    /**
     * @param array $body
     *
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
     * @param string $repository
     *
     * @return $this
     */
    public function setRepository($repository)
    {
        if (isset($repository) !== true) {
            return $this;
        }

        $this->repository = $repository;

        return $this;
    }

    /**
     * @param string $snapshot
     *
     * @return $this
     */
    public function setSnapshot($snapshot)
    {
        if (isset($snapshot) !== true) {
            return $this;
        }

        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->repository) !== true) {
            throw new Exceptions\RuntimeException(
                'repository is required for Restore'
            );
        }
        if (isset($this->snapshot) !== true) {
            throw new Exceptions\RuntimeException(
                'snapshot is required for Restore'
            );
        }
        $repository = $this->repository;
        $snapshot = $this->snapshot;
        $uri   = "/_snapshot/$repository/$snapshot/_restore";

        if (isset($repository) === true && isset($snapshot) === true) {
            $uri = "/_snapshot/$repository/$snapshot/_restore";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
            'wait_for_completion',
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
