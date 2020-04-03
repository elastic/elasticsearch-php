<?php
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class AutoscalingNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AutoscalingNamespace extends AbstractNamespace
{

    public function getAutoscalingDecision(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Autoscaling\GetAutoscalingDecision');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
