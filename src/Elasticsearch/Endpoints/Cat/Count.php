<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Count
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Count extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cat/count";

        if (isset($index) === true) {
            $uri = "/_cat/count/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'local',
            'master_timeout',
            'h',
            'help',
            'v',
            's',
            'format',
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
