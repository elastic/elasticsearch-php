<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Autoscaling;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetAutoscalingDecision
 * Elasticsearch API name autoscaling.get_autoscaling_decision
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Autoscaling
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetAutoscalingDecision extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_autoscaling/decision";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
