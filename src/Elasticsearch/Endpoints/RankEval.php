<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

/**
 * Class Reindex
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class RankEval extends AbstractEndpoint
{

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        if (isset($index)) {
            return "/$index/_rank_eval";
        }
        return '/_rank_eval';
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
