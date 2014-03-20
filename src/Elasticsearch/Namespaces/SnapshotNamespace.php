<?php
/**
 * User: zach
 * Date: 1/20/14
 * Time: 4:11 PM
 */

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
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (bool) Should this request wait until the operation has completed before returning
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function create($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        

        $snapshot = $this->extractArgument($params, 'snapshot');

        $body = $this->extractArgument($params, 'body');

        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Create $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Create');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setBody($body)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function createRepository($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        

        $body = $this->extractArgument($params, 'body');



        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Create $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Create');
        $endpoint->setRepository($repository)
                 ->setBody($body)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function delete($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        

        $snapshot = $this->extractArgument($params, 'snapshot');
        


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Delete $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Delete');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function deleteRepository($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Delete $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Delete');
        $endpoint->setRepository($repository)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function get($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        

        $snapshot = $this->extractArgument($params, 'snapshot');
        


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Get $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Get');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['timeout'] = (time) Explicit operation timeout
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function getRepository($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Repository\Get $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Repository\Get');
        $endpoint->setRepository($repository)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


    /**
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *        ['wait_for_completion'] = (bool) Should this request wait until the operation has completed before returning
     *
     * @param $params array Associative array of parameters
     *
     * @return array
     */
    public function restore($params = array())
    {
        $repository = $this->extractArgument($params, 'repository');
        

        $snapshot = $this->extractArgument($params, 'snapshot');

        $body = $this->extractArgument($params, 'body');


        /** @var callback $endpointBuilder */
        $endpointBuilder = $this->dicEndpoints;

        /** @var \Elasticsearch\Endpoints\Snapshot\Restore $endpoint */
        $endpoint = $endpointBuilder('Snapshot\Restore');
        $endpoint->setRepository($repository)
                 ->setSnapshot($snapshot)
                 ->setBody($body)
                 ->setParams($params);
        $response = $endpoint->performRequest();
        return $response['data'];
    }


}