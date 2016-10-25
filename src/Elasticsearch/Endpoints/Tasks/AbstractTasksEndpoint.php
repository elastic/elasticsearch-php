<?php

namespace Elasticsearch\Endpoints\Tasks;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractTasksEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Tasks
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractTasksEndpoint extends AbstractEndpoint
{
    protected $taskId;

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

        $this->taskId = urlencode($taskId);

        return $this;
    }

}