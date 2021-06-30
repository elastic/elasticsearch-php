<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Nodes
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Nodes extends AbstractEndpoint
{
   /**
    * @return string
    */
    public function getURI(): string
    {
        $uri   = "/_cat/nodes";

        return $uri;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's',
            'full_id',
            'format',
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
