<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Eql;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Get
 * Elasticsearch API name eql.get
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Eql
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
            return "/_eql/search/$id";
        }
        throw new RuntimeException('Missing parameter for the endpoint eql.get');
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_completion_timeout',
            'keep_alive'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
