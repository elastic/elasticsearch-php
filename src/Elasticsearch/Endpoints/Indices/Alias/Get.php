<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Alias
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    /**
     * A comma-separated list of alias names to return
     *
     * @var string
     */
    private $name;

    public function setName(?string $name): Get
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = $name;

        return $this;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $name = $this->name ?? null;
        if (isset($index) && isset($name)) {
            return "/$index/_alias/$name";
        }
        if (isset($name)) {
            return "/_alias/$name";
        }
        if (isset($index)) {
            return "/$index/_alias";
        }
        return "/_alias";
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'local',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
