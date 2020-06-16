<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\AsyncSearch;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 * Elasticsearch API name async_search.get
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\AsyncSearch
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractEndpoint
{

    public function getURI(): string
    {
        $id = $this->id ?? null;

        if (isset($id)) {
            return "/_async_search/$id";
        }
        throw new RuntimeException('Missing parameter for the endpoint async_search.get');
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_completion_timeout',
            'keep_alive',
            'typed_keys'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
