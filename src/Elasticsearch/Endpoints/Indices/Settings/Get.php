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

namespace Elasticsearch\Endpoints\Indices\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 */
class Get extends AbstractEndpoint
{
    /**
     * The name of the settings that should be included
     *
     * @var string
     */
    private $name;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $name = $this->name;
        $uri   = "/_settings";

        if (isset($index) === true && isset($name) === true) {
            $uri = "/$index/_settings/$name";
        } elseif (isset($name) === true) {
            $uri = "/_settings/$name";
        } elseif (isset($index) === true) {
            $uri = "/$index/_settings";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'flat_settings',
            'local',
            'include_defaults'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
