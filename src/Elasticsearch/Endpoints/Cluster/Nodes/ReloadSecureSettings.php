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
    public function getURI(): string
    {
        $nodeId = $this->nodeID ?? null;
        if (isset($nodeId)) {
            return "/_nodes/$nodeId/reload_secure_settings";
        }
        return "/_nodes/reload_secure_settings";
    }

    public function getParamWhitelist(): array
    {
        return [
            'timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
