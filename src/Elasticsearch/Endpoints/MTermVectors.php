<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class MTermVectors
 * Elasticsearch API name mtermvectors
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class MTermVectors extends AbstractEndpoint
{

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $type = $this->type ?? null;
        if (isset($type)) {
            @trigger_error('Specifying types in urls has been deprecated', E_USER_DEPRECATED);
        }

        if (isset($index) && isset($type)) {
            return "/$index/$type/_mtermvectors";
        }
        if (isset($index)) {
            return "/$index/_mtermvectors";
        }
        return "/_mtermvectors";
    }

    public function getParamWhitelist(): array
    {
        return [
            'ids',
            'term_statistics',
            'field_statistics',
            'fields',
            'offsets',
            'positions',
            'payloads',
            'preference',
            'routing',
            'realtime',
            'version',
            'version_type'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): MTermVectors
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
