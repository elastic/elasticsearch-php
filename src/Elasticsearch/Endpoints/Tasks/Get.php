<?php

declare(strict_types = 1);

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
    * @return string
    * @throws Exceptions\RuntimeException
    */
    public function getURI(): string
    {
        if (isset($this->taskId) === true) {
            return "/_tasks/{$this->taskId}";
        }

        return "/_tasks";
    }

   /**
    * @return string[]
    */
    public function getParamWhitelist(): array
    {
        return array(
            'wait_for_completion'
        );
    }

   /**
    * @return string
    */
    public function getMethod(): string
    {
        return 'GET';
    }
}
