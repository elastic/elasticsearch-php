<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Transforms
 * Elasticsearch API name cat.transforms
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Transforms extends AbstractEndpoint
{
    protected $transform_id;

    public function getURI(): string
    {
        $transform_id = $this->transform_id ?? null;

        if (isset($transform_id)) {
            return "/_cat/transforms/$transform_id";
        }
        return "/_cat/transforms";
    }

    public function getParamWhitelist(): array
    {
        return [
            'from',
            'size',
            'allow_no_match',
            'format',
            'h',
            'help',
            's',
            'time',
            'v'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setTransformId($transform_id): Transforms
    {
        if (isset($transform_id) !== true) {
            return $this;
        }
        $this->transform_id = $transform_id;

        return $this;
    }
}
