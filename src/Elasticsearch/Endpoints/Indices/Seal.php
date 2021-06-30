<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Seal
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Seal extends AbstractEndpoint
{
   /**
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        $index = $this->index;
        $uri   = "/_seal";

        if (isset($index) === true) {
            $uri = "/$index/_seal";
        }

        return $uri;
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
        return 'POST';
    }
}
