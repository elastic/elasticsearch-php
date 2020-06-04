<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\DataFrameTransformDeprecated;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class StopTransform
 * Elasticsearch API name data_frame_transform_deprecated.stop_transform
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\DataFrameTransformDeprecated
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class StopTransform extends AbstractEndpoint
{
    protected $transform_id;

    public function getURI(): string
    {
        $transform_id = $this->transform_id ?? null;

        if (isset($transform_id)) {
            return "/_data_frame/transforms/$transform_id/_stop";
        }
        throw new RuntimeException('Missing parameter for the endpoint data_frame_transform_deprecated.stop_transform');
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_completion',
            'timeout',
            'allow_no_match'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setTransformId($transform_id): StopTransform
    {
        if (isset($transform_id) !== true) {
            return $this;
        }
        $this->transform_id = $transform_id;

        return $this;
    }
}
