<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AddBlock
 * Elasticsearch API name indices.add_block
 * Generated running $ php util/GenerateEndpoints.php 7.9
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class AddBlock extends AbstractEndpoint
{
    protected $block;

    public function getURI(): string
    {
        $index = $this->index ?? null;
        $block = $this->block ?? null;

        if (isset($index) && isset($block)) {
            return "/$index/_block/$block";
        }
        throw new RuntimeException('Missing parameter for the endpoint indices.add_block');
    }

    public function getParamWhitelist(): array
    {
        return [
            'timeout',
            'master_timeout',
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards'
        ];
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function setBlock($block): AddBlock
    {
        if (isset($block) !== true) {
            return $this;
        }
        $this->block = $block;

        return $this;
    }
}
