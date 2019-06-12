<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Fielddata
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Fielddata extends AbstractEndpoint
{
    private $fields;

    public function setFields(?string $fields): Fielddata
    {
        if (isset($fields) !== true) {
            return $this;
        }

        $this->fields = $fields;

        return $this;
    }

    public function getURI(): string
    {
        $fields = $this->fields ?? null;

        if (isset($fields)) {
            return "/_cat/fielddata/$fields";
        }

        return "/_cat/fielddata";
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
            'v',
            'fields'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
