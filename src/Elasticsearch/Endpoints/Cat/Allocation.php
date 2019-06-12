<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Allocation
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Allocation extends AbstractEndpoint
{
    /**
     * A comma-separated list of node IDs or names to limit the returned information
     *
     * @var string
     */
    private $node_id;

    public function setNodeId(?string $node_id): Allocation
    {
        if (isset($node_id) !== true) {
            return $this;
        }

        $this->node_id = $node_id;

        return $this;
    }

    public function getURI(): string
    {
        $node_id = $this->node_id ?? null;

        if (isset($node_id)) {
            return "/_cat/allocation/$node_id";
        }

        return "/_cat/allocation";
    }

    public function getParamWhitelist(): array
    {
        return [
            'format',
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            's',
            'v'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
