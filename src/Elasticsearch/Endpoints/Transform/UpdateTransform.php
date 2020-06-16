<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Transform;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class UpdateTransform
 * Elasticsearch API name transform.update_transform
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Transform
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class UpdateTransform extends AbstractEndpoint
{
    protected $transform_id;

    public function getURI(): string
    {
        $transform_id = $this->transform_id ?? null;

        if (isset($transform_id)) {
            return "/_transform/$transform_id/_update";
        }
        throw new RuntimeException('Missing parameter for the endpoint transform.update_transform');
    }

    public function getParamWhitelist(): array
    {
        return [
            'defer_validation'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setBody($body): UpdateTransform
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setTransformId($transform_id): UpdateTransform
    {
        if (isset($transform_id) !== true) {
            return $this;
        }
        $this->transform_id = $transform_id;

        return $this;
    }
}
