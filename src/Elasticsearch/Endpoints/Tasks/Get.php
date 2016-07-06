<?php

namespace Elasticsearch\Endpoints\Tasks;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Tasks
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{
    private $taskId;

    /**
     * @param string $taskId
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setTaskId($taskId)
    {
        if (isset($taskId) !== true) {
            return $this;
        }

        $this->taskId = $taskId;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->id) === true) {
            return "/_tasks/{$this->taskId}";
        }

        return "/_tasks";
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
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
    protected function getMethod()
    {
        return 'GET';
    }
}
