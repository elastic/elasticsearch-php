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
     * $params['wait_for_completion'] = (bool) Wait for the matching tasks to complete (default: false)
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function get($params = array())
    {
        $id = $this->extractArgument($params, 'task_id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Get $endpoint */
        $endpoint = $endpointBuilder('Tasks\Get');
        $endpoint->setTaskId($id)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['node_id'] = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['actions'] = (list) A comma-separated list of actions that should be cancelled. Leave empty to cancel all.
     *        ['parent_node'] = (string) Cancel tasks with specified parent node
     *        ['parent_task'] = (string) Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to cancel all.
     *        ['detailed'] = (bool) Return detailed task information (default: false)
     *        ['wait_for_completion'] = (bool) Wait for the matching tasks to complete (default: false)
     *        ['group_by'] = (enum) Group tasks by nodes or parent/child relationships
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function tasksList($params = array())
    {

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Get $endpoint */
        $endpoint = $endpointBuilder('Tasks\TasksList');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['node_id'] = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     *        ['actions'] = (list) A comma-separated list of actions that should be cancelled. Leave empty to cancel all.
     *        ['parent_node'] = (string) Cancel tasks with specified parent node
     *        ['parent_task'] = (string) Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to cancel all.
     *
     * @param array $params Associative array of parameters
     *
     * @return array
     */
    public function cancel($params = array())
    {
        $id = $this->extractArgument($params, 'id');

        /** @var callable $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var Cancel $endpoint */
        $endpoint = $endpointBuilder('Tasks\Cancel');
        $endpoint->setTaskId($id)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }
}
