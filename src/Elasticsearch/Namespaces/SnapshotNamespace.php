<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

/**
 * Class SnapshotNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\SnapshotNamespace
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class SnapshotNamespace extends AbstractNamespace
{
    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (bool) Should this request wait until the operation has completed before returning
     *
     * @return callable|array
     */
    public function create(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Create $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Create');
        $endpoint->setRepository($repository)
            ->setSnapshot($snapshot)
            ->setParams($params)
            ->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function createRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Repository\Create $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Repository\Create');
        $endpoint->setRepository($repository)
            ->setBody($body)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @return callable|array
     */
    public function delete(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Delete $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Delete');
        $endpoint->setRepository($repository)
            ->setSnapshot($snapshot)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function deleteRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Repository\Delete $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Repository\Delete');
        $endpoint->setRepository($repository)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @return callable|array
     */
    public function get(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Get $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Get');
        $endpoint->setRepository($repository)
            ->setSnapshot($snapshot)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function getRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Repository\Get $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Repository\Get');
        $endpoint->setRepository($repository)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (bool) Should this request wait until the operation has completed before returning
     *
     * @return callable|array
     */
    public function restore(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Restore $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Restore');
        $endpoint->setRepository($repository)
            ->setSnapshot($snapshot)
            ->setParams($params)
            ->setBody($body);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @return callable|array
     */
    public function status(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Status $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Status');
        $endpoint->setRepository($repository)
            ->setSnapshot($snapshot)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @return callable|array
     */
    public function verifyRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /**
 * @var callable $endpointBuilder
*/
        $endpointBuilder = $this->endpoints;

        /**
 * @var \Elasticsearch\Endpoints\Snapshot\Repository\Verify $endpoint
*/
        $endpoint = $endpointBuilder('Snapshot\Repository\Verify');
        $endpoint->setRepository($repository)
            ->setParams($params);

        return $this->performRequest($endpoint);
    }
}
