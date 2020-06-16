<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class TermVectors
 * Elasticsearch API name termvectors
 * Generated running $ php util/GenerateEndpoints.php 7.8
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class TermVectors extends AbstractEndpoint
{

    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for termvectors'
            );
        }
        $index = $this->index;
        $id = $this->id ?? null;
        $type = $this->type ?? null;
        if (isset($type)) {
            @trigger_error('Specifying types in urls has been deprecated', E_USER_DEPRECATED);
        }

        if (isset($type) && isset($id)) {
            return "/$index/$type/$id/_termvectors";
        }
        if (isset($type)) {
            return "/$index/$type/_termvectors";
        }
        if (isset($id)) {
            return "/$index/_termvectors/$id";
        }
        return "/$index/_termvectors";
    }

    public function getParamWhitelist(): array
    {
        return [
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

    public function setBody($body): TermVectors
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
