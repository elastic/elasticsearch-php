<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

/**
 * Class Reindex
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Reindex extends AbstractEndpoint
{

    public function getParamWhitelist(): array
    {
        return [
            'refresh',
            'timeout',
            'wait_for_active_shards',
            'wait_for_completion',
            'requests_per_second',
            'scroll',
            'slices'
        ];
    }

    public function getURI(): string
    {
        return '/_reindex';
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setBody($body): Reindex
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }
}
