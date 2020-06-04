<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Sql;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Query
 * Elasticsearch API name sql.query
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Sql
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Query extends AbstractEndpoint
{

    public function getURI(): string
    {

        return "/_sql";
    }

    public function getParamWhitelist(): array
    {
        return [
            'format'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): Query
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
