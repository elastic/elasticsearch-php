<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Help
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Help extends AbstractEndpoint
{
    public function getURI(): string
    {
        return "/_cat";
    }

    public function getParamWhitelist(): array
    {
        return [
            'help',
            's'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
