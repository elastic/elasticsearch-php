<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Shards
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Shards extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getEndpointURI()
    {
        $index = $this->index;
        $uri   = "/_cat/shards";

        if (isset($index) === true) {
            $uri = "/_cat/shards/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'bytes',
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
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
