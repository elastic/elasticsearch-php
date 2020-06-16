<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\License;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Post
 * Elasticsearch API name license.post
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\License
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Post extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_license";
    }

    public function getParamWhitelist(): array
    {
        return [
            'acknowledge'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setBody($body): Post
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
