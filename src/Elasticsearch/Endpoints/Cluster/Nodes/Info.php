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

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class Info
 *
 */
class Info extends AbstractNodesEndpoint
{
    /**
     * A comma-separated list of metrics you wish returned. Leave empty to return all.
     *
     * @var string
     */
    private $metric;

    /**
     * @param string|string[] $metric
     *
     * @return $this
     */
    public function setMetric($metric)
    {
        if (isset($metric) !== true) {
            return $this;
        }

        if (is_array($metric) === true) {
            $metric = implode(",", $metric);
        }

        $this->metric = $metric;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $node_id = $this->nodeID;
        $metric = $this->metric;
        $uri   = "/_nodes";

        if (isset($node_id) === true && isset($metric) === true) {
            $uri = "/_nodes/$node_id/$metric";
        } elseif (isset($metric) === true) {
            $uri = "/_nodes/$metric";
        } elseif (isset($node_id) === true) {
            $uri = "/_nodes/$node_id";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'flat_settings',
            'human',
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
