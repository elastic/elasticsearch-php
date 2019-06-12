<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Render
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class RenderSearchTemplate extends AbstractEndpoint
{
    /**
     * @return $this
     */
    public function setBody($body): RenderSearchTemplate
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;
        return $this;
    }

    public function getURI(): string
    {
        $id = $this->id ?? null;

        if (isset($id)) {
            return "/_render/template/$id";
        }
        return "/_render/template";
    }

    public function getParamWhitelist(): array
    {
        return [];
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }
}
