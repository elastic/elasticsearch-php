<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\DanglingIndices;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class DeleteDanglingIndex
 * Elasticsearch API name dangling_indices.delete_dangling_index
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\DanglingIndices
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class DeleteDanglingIndex extends AbstractEndpoint
{
    protected $index_uuid;

    public function getURI(): string
    {
        $index_uuid = $this->index_uuid ?? null;

        if (isset($index_uuid)) {
            return "/_dangling/$index_uuid";
        }
        throw new RuntimeException('Missing parameter for the endpoint dangling_indices.delete_dangling_index');
    }

    public function getParamWhitelist(): array
    {
        return [
            'accept_data_loss',
            'timeout',
            'master_timeout'
        ];
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function setIndexUuid($index_uuid): DeleteDanglingIndex
    {
        if (isset($index_uuid) !== true) {
            return $this;
        }
        $this->index_uuid = $index_uuid;

        return $this;
    }
}
