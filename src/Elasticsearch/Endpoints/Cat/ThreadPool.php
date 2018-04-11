<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ThreadPool
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class ThreadPool extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $uri   = "/_cat/thread_pool";

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
            'full_id',
            'size',
            'thread_pool_patterns',
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
