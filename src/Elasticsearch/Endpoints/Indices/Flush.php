<?php

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Flush
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Flush extends AbstractEndpoint
{
    /**
     * @var boolean
     */
    protected $isSynced;

    /**
     * @param boolean $isSynced
     *
     * @return $this
     */
    public function setSynced($isSynced)
    {
        $this->isSynced = $isSynced;

        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $index = $this->index;
        $uri = "/_flush";

        if (isset($index) === true) {
            $uri = "/$index/_flush";
        }

        if ($this->isSynced === true) {
            $uri .= "/synced";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'force',
            'full',
            'wait_if_ongoing',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
        ];
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
