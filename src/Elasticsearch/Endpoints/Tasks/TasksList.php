<?php

namespace Iprice\Elasticsearch\Endpoints\Tasks;

use Iprice\Elasticsearch\Common\Exceptions;
use Iprice\Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class TasksLists
 *
 * @category Elasticsearch
 * @package  Iprice\Elasticsearch\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TasksList extends AbstractEndpoint
{

    /**
     * @throws \Iprice\Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        return "/_tasks";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'wait_for_completion',
            'group_by',
            'task_id'
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
