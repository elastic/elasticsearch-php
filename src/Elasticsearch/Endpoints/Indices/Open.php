<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Open
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Open extends AbstractEndpoint
{
   /**
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Open'
            );
        }
        $index = $this->index;
        $uri   = "/$index/_open";

        if (isset($index) === true) {
            $uri = "/$index/_open";
        }

        return $uri;
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'wait_for_active_shards',
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'POST';
    }
}
