<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Migration;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Deprecations
 * Elasticsearch API name migration.deprecations
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Migration
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Deprecations extends AbstractEndpoint
{

    public function getURI(): string
    {
        $index = $this->index ?? null;

        if (isset($index)) {
            return "/$index/_migration/deprecations";
        }
        return "/_migration/deprecations";
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
