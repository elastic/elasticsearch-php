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

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Stats
 *
 */
class Stats extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to,
     * leave empty to get information from all nodes
     *
     * @var string
     */
    private $nodeID;

    /**
     * @param string $node_id
     *
     * @return $this
     */
    public function setNodeID($node_id)
    {
        if (isset($node_id) !== true) {
            return $this;
        }

        $this->nodeID = $node_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $node_id = $this->nodeID;
        $uri   = "/_cluster/stats";

        if (isset($node_id) === true) {
            $uri = "/_cluster/stats/nodes/$node_id";
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
