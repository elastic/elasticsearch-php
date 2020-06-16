<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Allocation
 * Elasticsearch API name cat.allocation
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Allocation extends AbstractEndpoint
{
    protected $node_id;

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

    public function setNodeId($node_id): Allocation
    {
        if (isset($node_id) !== true) {
            return $this;
        }
        if (is_array($node_id) === true) {
            $node_id = implode(",", $node_id);
        }
        $this->node_id = $node_id;

        return $this;
    }
}
