<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ssl;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Certificates
 * Elasticsearch API name ssl.certificates
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ssl
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Certificates extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_ssl/certificates";
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
