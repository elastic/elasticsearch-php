<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Templates
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Templates extends AbstractEndpoint
{
    private $name;

    public function setName(?string $name): Templates
    {
        $this->name = $name;
        return $this;
    }

    public function getURI(): string
    {
        $name = $this->name ?? null;
        if (isset($name)) {
            return "/_cat/templates/$name";
        }
        return "/_cat/templates";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist(): array
    {
        return [
            'format',
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
