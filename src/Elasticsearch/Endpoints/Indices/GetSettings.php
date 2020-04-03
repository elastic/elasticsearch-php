<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetSettings
 * Elasticsearch API name indices.get_settings
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetSettings extends AbstractEndpoint
{
    protected $name;

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $name = $this->name ?? null;

        if (isset($index) && isset($name)) {
            return "/$index/_settings/$name";
        }
        if (isset($index)) {
            return "/$index/_settings";
        }
        if (isset($name)) {
            return "/_settings/$name";
        }
        return "/_settings";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'flat_settings',
            'local',
            'include_defaults'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setName($name): GetSettings
    {
        if (isset($name) !== true) {
            return $this;
        }
        if (is_array($name) === true) {
            $name = implode(",", $name);
        }
        $this->name = $name;

        return $this;
    }
}
