<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Recovery
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Recovery extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_cat/recovery";

        if (isset($index) === true) {
            $uri = "/_cat/recovery/$index";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'bytes',
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
