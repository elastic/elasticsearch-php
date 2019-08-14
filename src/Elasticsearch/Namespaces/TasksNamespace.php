<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Endpoints\Tasks\Cancel;
use Elasticsearch\Endpoints\Tasks\Get;

/**
 * Class TasksNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\TasksNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TasksNamespace extends AbstractNamespace
{
    /**
     * Endpoint: tasks.get
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
     *
     * $params[
     *   'task_id'             => '(string) Return the task with specified id (node_id:task_number) (Required)',
     *   'wait_for_completion' => '(boolean) Wait for the matching tasks to complete (default: false)',
     *   'timeout'             => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'task_id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var Get $endpoint
*/
        $endpoint = $endpointBuilder('Tasks\Get');
        $endpoint->setTaskId($id)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: tasks.list
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
     *
     * $params[
     *   'nodes'               => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'actions'             => '(list) A comma-separated list of actions that should be returned. Leave empty to return all.',
     *   'detailed'            => '(boolean) Return detailed task information (default: false)',
     *   'parent_task_id'      => '(string) Return tasks with specified parent task id (node_id:task_number). Set to -1 to return all.',
     *   'wait_for_completion' => '(boolean) Wait for the matching tasks to complete (default: false)',
     *   'group_by'            => '(enum) Group tasks by nodes or parent/child relationships (Options = nodes,parents,none) (Default = nodes)',
     *   'timeout'             => '(time) Explicit operation timeout',
     * ]
     * @return callable|array
     */
    public function tasksList(array $params = [])
    {

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var Get $endpoint
*/
        $endpoint = $endpointBuilder('Tasks\TasksList');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Endpoint: tasks.cancel
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/tasks.html
     *
     * $params[
     *   'task_id'        => '(string) Cancel the task with specified task id (node_id:task_number)',
     *   'nodes'          => '(list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes',
     *   'actions'        => '(list) A comma-separated list of actions that should be cancelled. Leave empty to cancel all.',
     *   'parent_task_id' => '(string) Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to cancel all.',
     * ]
     * @return callable|array
     */
    public function cancel(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var Cancel $endpoint
*/
        $endpoint = $endpointBuilder('Tasks\Cancel');
        $endpoint->setTaskId($id)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }
}
