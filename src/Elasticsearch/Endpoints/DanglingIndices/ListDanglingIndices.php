<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\DanglingIndices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class ListDanglingIndices
 * Elasticsearch API name dangling_indices.list_dangling_indices
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\DanglingIndices
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ListDanglingIndices extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_dangling";
    }

    public function getParamWhitelist(): array
    {
        return [
            
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
