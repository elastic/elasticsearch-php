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

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Allocation
 *
 */
class Allocation extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information
     *
     * @var string
     */
    private $node_id;

    /**
     * @param string $node_id
     *
     * @return $this
     */
    public function setNodeId($node_id)
    {
        if (isset($node_id) !== true) {
            return $this;
        }

        $this->node_id = $node_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $node_id = $this->node_id;
        $uri   = "/_cat/allocation";

        if (isset($node_id) === true) {
            $uri = "/_cat/allocation/$node_id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's',
            'format',
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
