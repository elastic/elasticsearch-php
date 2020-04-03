<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Slm;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetStatus
 * Elasticsearch API name slm.get_status
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Slm
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class GetStatus extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_slm/status";
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
