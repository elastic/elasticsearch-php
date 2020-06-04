<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\SearchableSnapshots;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ClearCache
 * Elasticsearch API name searchable_snapshots.clear_cache
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\SearchableSnapshots
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
            return "/$index/_searchable_snapshots/cache/clear";
        }
        return "/_searchable_snapshots/cache/clear";
    }

    public function getParamWhitelist(): array
    {
        return [
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'index'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}
