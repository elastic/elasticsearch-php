<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ingest;

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Simulate
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ingest
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Simulate extends AbstractEndpoint
{
    public function setBody($body): Simulate
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
            return "/_ingest/pipeline/$id/_simulate";
        }
        return "/_ingest/pipeline/_simulate";
    }

    public function getParamWhitelist(): array
    {
        return [
            'verbose',
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
