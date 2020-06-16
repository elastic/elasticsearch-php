<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class TransformNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TransformNamespace extends AbstractNamespace
{

    /**
     * $params['transform_id'] = (string) The id of the transform to delete
     * $params['force']        = (boolean) When `true`, the transform is deleted regardless of its current state. The default value is `false`, meaning that the transform must be `stopped` before it can be deleted.
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-transform.html
     */
    public function deleteTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\DeleteTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']   = (string) The id or comma delimited list of id expressions of the transforms to get, '_all' or '*' implies get all transforms
     * $params['from']           = (int) skips a number of transform configs, defaults to 0
     * $params['size']           = (int) specifies a max number of transforms to get, defaults to 100
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform.html
     */
    public function getTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\GetTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']   = (string) The id of the transform for which to get stats. '_all' or '*' implies all transforms
     * $params['from']           = (number) skips a number of transform stats, defaults to 0
     * $params['size']           = (number) specifies a max number of transform stats to get, defaults to 100
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-transform-stats.html
     */
    public function getTransformStats(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\GetTransformStats');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    public function previewTransform(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\PreviewTransform');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']     = (string) The id of the new transform.
     * $params['defer_validation'] = (boolean) If validations should be deferred until transform starts, defaults to false.
     * $params['body']             = (array) The transform definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-transform.html
     */
    public function putTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\PutTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id'] = (string) The id of the transform to start
     * $params['timeout']      = (time) Controls the time to wait for the transform to start
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-transform.html
     */
    public function startTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\StartTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']        = (string) The id of the transform to stop
     * $params['force']               = (boolean) Whether to force stop a failed transform or not. Default to false
     * $params['wait_for_completion'] = (boolean) Whether to wait for the transform to fully stop before returning or not. Default to false
     * $params['timeout']             = (time) Controls the time to wait until the transform has stopped. Default to 30 seconds
     * $params['allow_no_match']      = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     * $params['wait_for_checkpoint'] = (boolean) Whether to wait for the transform to reach a checkpoint before stopping. Default to false
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-transform.html
     */
    public function stopTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\StopTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']     = (string) The id of the transform.
     * $params['defer_validation'] = (boolean) If validations should be deferred until transform starts, defaults to false.
     * $params['body']             = (array) The update transform definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-transform.html
     */
    public function updateTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Transform\UpdateTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
