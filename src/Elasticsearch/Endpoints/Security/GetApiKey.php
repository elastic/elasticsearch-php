<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Security;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetApiKey
 * Elasticsearch API name security.get_api_key
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Security
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetApiKey extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_security/api_key";
    }

    public function getParamWhitelist(): array
    {
        return [
            'id',
            'name',
            'username',
            'realm_name',
            'owner'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
