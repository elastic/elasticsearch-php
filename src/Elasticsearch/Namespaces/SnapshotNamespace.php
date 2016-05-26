<?php

namespace Elasticsearch\Namespaces;

/**
 * Class SnapshotNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\SnapshotNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class SnapshotNamespace extends AbstractNamespace
{
    /**
     * $params['repository']          = (string) A repository name (Required)
     *        ['snapshot']            = (string) A snapshot name (Required)
     *        ['master_timeout']      = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before
     * returning (default: false)
     *        ['body']                = The snapshot definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function create($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Create $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Create');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params)
                 ->setBody($body);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (string) A repository name (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout']        = (time) Explicit operation timeout
     *        ['verify']         = (boolean) Whether to verify the repository after creation
     *        ['body']           = The repository definition
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function createRepository($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Create $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Create');
        $endpoint->setRepository($repository)
                 ->setBody($body)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (string) A repository name (Required)
     *        ['snapshot']       = (string) A snapshot name (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Delete $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Delete');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (list) A comma-separated list of repository names (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout']        = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteRepository($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Delete $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Delete');
        $endpoint->setRepository($repository)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (string) A repository name (Required)
     *        ['snapshot']       = (list) A comma-separated list of snapshot names (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Get $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Get');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (list) A comma-separated list of repository names
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['local']          = (boolean) Return local information, do not retrieve the state from master node
     * (default: false)
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getRepository($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Get $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Get');
        $endpoint->setRepository($repository)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']          = (string) A repository name (Required)
     *        ['snapshot']            = (string) A snapshot name (Required)
     *        ['master_timeout']      = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before
     * returning (default: false)
     *        ['body']                = Details of what to restore
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function restore($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Restore $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Restore');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params)
                 ->setBody($body);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (string) A repository name
     *        ['snapshot']       = (list) A comma-separated list of snapshot names
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function status($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Status $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Status');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }

    /**
     * $params['repository']     = (string) A repository name (Required)
     *        ['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout']        = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function verifyRepository($params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->endpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\VerifyRepository $endpoint */
        $endpoint = $endpointBuilder('Snapshot\VerifyRepository');
        $endpoint->setRepository($repository)
                 ->setParams($params);
        $response = $endpoint->performRequest();

        return $endpoint->resultOrFuture($response);
    }
}
