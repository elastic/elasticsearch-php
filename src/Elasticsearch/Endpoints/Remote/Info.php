<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Remote;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Info
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cluster\Nodes
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Info extends AbstractEndpoint
{
   /**
    * @return string
    */
    public function getURI(): string
    {
        return "/_remote/info";
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array();
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
