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

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Rollover
 *
 */
class Rollover extends AbstractEndpoint
{
    private $alias;
    private $newIndex;

    /**
     * @param string $alias
     *
     * @return $this
     */
    public function setAlias($alias)
    {
        if ($alias === null) {
            return $this;
        }

        $this->alias = urlencode($alias);
        return $this;
    }

    /**
     * @param string $newIndex
     *
     * @return $this
     */
    public function setNewIndex($newIndex)
    {
        if ($newIndex === null) {
            return $this;
        }

        $this->newIndex = urlencode($newIndex);
        return $this;
    }

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
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->alias) !== true) {
            throw new Exceptions\RuntimeException(
                'alias name is required for Rollover'
            );
        }

        $uri = "/{$this->alias}/_rollover";

        if (isset($this->newIndex) === true) {
            $uri .= "/{$this->newIndex}";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'timeout',
            'master_timeout',
            'wait_for_active_shards',
            'include_type_name'
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
