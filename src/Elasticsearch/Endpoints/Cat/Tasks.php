<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Tasks
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Tasks extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getURI()
    {
        return "/_cat/tasks";
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'format',
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'h',
            'help',
            'v'
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}
