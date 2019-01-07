<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cluster\Nodes;

/**
 * Class ReloadSecureSettings
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ReloadSecureSettings extends AbstractNodesEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $nodeId = $this->nodeID;
        $uri   = "/_nodes/reload_secure_settings";

        if (isset($nodeId) === true) {
            $uri = "/_nodes/$nodeId/reload_secure_settings";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
