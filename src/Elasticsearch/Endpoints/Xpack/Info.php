<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Xpack;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Info
 * Elasticsearch API name xpack.info
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Xpack
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Info extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_xpack";
    }

    public function getParamWhitelist(): array
    {
        return [
            'categories'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }
}
