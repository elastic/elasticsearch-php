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

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractNodesEndpoint
 *
 */
abstract class AbstractNodesEndpoint extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to,
     * leave empty to get information from all nodes
     *
     * @var string
     */
    protected $nodeID;

    /**
     * @param string|string[] $nodeID
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return $this
     */
    public function setNodeID($nodeID)
    {
        if (isset($nodeID) !== true) {
            return $this;
        }

        if (!(is_array($nodeID) === true || is_string($nodeID) === true)) {
            throw new InvalidArgumentException("invalid node_id");
        }

        if (is_array($nodeID) === true) {
            $nodeID = implode(',', $nodeID);
        }

        $this->nodeID = $nodeID;

        return $this;
    }
}
