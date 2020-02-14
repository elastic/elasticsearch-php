<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCache
 * Elasticsearch API name indices.clear_cache
 * Generated running $ php util/GenerateEndpoints.php 7.6.0
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ClearCache extends AbstractEndpoint
{

    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/$index/_cache/clear";
        }
        return "/_cache/clear";
    }

    public function getParamWhitelist(): array
    {
        return [
            'fielddata',
            'fields',
            'query',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'index',
            'request'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
