<?php

namespace Elasticsearch\Endpoints\Tasks;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Tasks *
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Get extends AbstractEndpoint
{
    // Return the task with specified id (node_id:task_number)
    private $task_id;


    /**
     * @param $task_id
     *
     * @return $this
     */
    public function setTaskId($task_id)
    {
        if (isset($task_id) !== true) {
            return $this;
        }

        $this->task_id = $task_id;

        return $this;
    }


    /**
     * @return string
     */
    protected function getURI()
    {
        $task_id = $this->task_id;
        $uri = "/_tasks";
        if (isset($task_id) === true) {
            $uri = "/_tasks/$task_id";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return [
            'node_id',
            'actions',
            'detailed',
            'parent_node',
            'parent_task',
            'wait_for_completion',
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
