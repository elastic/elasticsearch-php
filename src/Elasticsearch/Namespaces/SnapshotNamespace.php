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
     * Endpoint: snapshot.create
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'body'                => '(string) The snapshot definition',
     *   'repository'          => '(string) A repository name (Required)',
     *   'snapshot'            => '(string) A snapshot name (Required)',
     *   'master_timeout'      => '(time) Explicit operation timeout for connection to master node',
     *   'wait_for_completion' => '(boolean) Should this request wait until the operation has completed before returning (Default = false)',
     * ]
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
     * Endpoint: snapshot.create_repository
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'body'           => '(string) The repository definition (Required)',
     *   'repository'     => '(string) A repository name (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'        => '(time) Explicit operation timeout',
     *   'verify'         => '(boolean) Whether to verify the repository after creation',
     * ]
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
     * Endpoint: snapshot.delete
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'     => '(string) A repository name (Required)',
     *   'snapshot'       => '(string) A snapshot name (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     * ]
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
     * Endpoint: snapshot.delete_repository
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'     => '(list) A comma-separated list of repository names (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'        => '(time) Explicit operation timeout',
     * ]
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
     * Endpoint: snapshot.get
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'         => '(string) A repository name (Required)',
     *   'snapshot'           => '(list) A comma-separated list of snapshot names (Required)',
     *   'master_timeout'     => '(time) Explicit operation timeout for connection to master node',
     *   'ignore_unavailable' => '(boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown',
     *   'verbose'            => '(boolean) Whether to show verbose snapshot info or only show the basic info found in the repository index blob',
     * ]
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
     * Endpoint: snapshot.get_repository
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'     => '(list) A comma-separated list of repository names',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'local'          => '(boolean) Return local information, do not retrieve the state from master node (default: false)',
     * ]
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
     * Endpoint: snapshot.restore
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'body'                => '(string) Details of what to restore',
     *   'repository'          => '(string) A repository name (Required)',
     *   'snapshot'            => '(string) A snapshot name (Required)',
     *   'master_timeout'      => '(time) Explicit operation timeout for connection to master node',
     *   'wait_for_completion' => '(boolean) Should this request wait until the operation has completed before returning (Default = false)',
     * ]
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
     * Endpoint: snapshot.status
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'         => '(string) A repository name',
     *   'snapshot'           => '(list) A comma-separated list of snapshot names',
     *   'master_timeout'     => '(time) Explicit operation timeout for connection to master node',
     *   'ignore_unavailable' => '(boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown',
     * ]
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
     * Endpoint: snapshot.verify_repository
     *
     * @see http://www.elastic.co/guide/en/elasticsearch/reference/master/modules-snapshots.html
     *
     * $params[
     *   'repository'     => '(string) A repository name (Required)',
     *   'master_timeout' => '(time) Explicit operation timeout for connection to master node',
     *   'timeout'        => '(time) Explicit operation timeout',
     * ]
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
