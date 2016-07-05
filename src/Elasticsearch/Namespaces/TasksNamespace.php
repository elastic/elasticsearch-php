<?php

namespace Elasticsearch\Namespaces;

/**
 * Class TasksNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\TaskNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class TasksNamespace extends AbstractNamespace
{
    /**
     * $params['task_id']     = (string) Cancel the task with specified task id (node_id:task_number)
     *        ['node_id']     = (list) A comma-separated list of node IDs or names to limit the returned information;
     * use `_local` to return information from the node you're connecting to, leave empty to get information from all
     * nodes
     *        ['actions']     = (list) A comma-separated list of actions that should be cancelled. Leave empty to
     * cancel all.
     *        ['parent_node'] = (string) Cancel tasks with specified parent node.
     *        ['parent_task'] = (string) Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to
     * cancel all.
     *
     * @param array $params
     *
     * @return array
     */
    public function cancel($params = [])
    {
        $taskID = $this->extractArgument($params, 'task_id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Tasks\Cancel $endpoint */
        $endpoint = $endpointBuilder('Tasks\Cancel');
        $endpoint->setTaskId($taskID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['task_id']             = (string) Return the task with specified id (node_id:task_number)
     *        ['node_id']             = (list) A comma-separated list of node IDs or names to limit the returned
     * information; use `_local` to return information from the node you're connecting to, leave empty to get
     * information from all nodes
     *        ['actions']             = (list) A comma-separated list of actions that should be returned. Leave empty
     * to return all.
     *        ['detailed']            = (boolean) Return detailed task information (default: false)
     *        ['parent_node']         = (string) Return tasks with specified parent node.
     *        ['parent_task']         = (string) Return tasks with specified parent task id (node_id:task_number). Set
     * to -1 to return all.
     *        ['wait_for_completion'] = (boolean) Wait for the matching tasks to complete (default: false)
     *
     * @param array $params
     *
     * @return array
     * @deprecated Remove 5.0
     */
    public function show($params = [])
    {
        $taskID = $this->extractArgument($params, 'task_id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Tasks\Get $endpoint */
        $endpoint = $endpointBuilder('Tasks\Get');
        $endpoint->setTaskId($taskID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['task_id']             = (string) Return the task with specified id (node_id:task_number)
     *        ['node_id']             = (list) A comma-separated list of node IDs or names to limit the returned
     * information; use `_local` to return information from the node you're connecting to, leave empty to get
     * information from all nodes
     *        ['actions']             = (list) A comma-separated list of actions that should be returned. Leave empty
     * to return all.
     *        ['detailed']            = (boolean) Return detailed task information (default: false)
     *        ['parent_node']         = (string) Return tasks with specified parent node.
     *        ['parent_task']         = (string) Return tasks with specified parent task id (node_id:task_number). Set
     * to -1 to return all.
     *        ['wait_for_completion'] = (boolean) Wait for the matching tasks to complete (default: false)
     *
     * @param array $params
     *
     * @return array
     */
    public function get($params = [])
    {
        $taskID = $this->extractArgument($params, 'task_id');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Tasks\Get $endpoint */
        $endpoint = $endpointBuilder('Tasks\Get');
        $endpoint->setTaskId($taskID);
        $endpoint->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }
}
