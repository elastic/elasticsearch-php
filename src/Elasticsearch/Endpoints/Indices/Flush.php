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

/**
 * Class Flush
 *
 */
class Flush extends AbstractEndpoint
{
    protected $synced = false;

    public function setSynced($synced)
    {
        $this->synced = $synced;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_flush";

        if (isset($index) === true) {
            $uri = "/$index/_flush";
        }

        if ($this->synced === true) {
            $uri .= "/synced";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'force',
            'full',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'wait_if_ongoing'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
