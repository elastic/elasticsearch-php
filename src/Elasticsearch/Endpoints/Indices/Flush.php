<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Flush
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Flush extends AbstractEndpoint
{
    protected $synced = false;

    public function setSynced($synced)
    {
        $this->synced = $synced;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_flush";

        if (isset($index) === true) {
            $uri = "/$index/_flush";
        }

        if ($this->synced === true) {
            $uri .= "/synced";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'force',
            'full',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'wait_if_ongoing'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
