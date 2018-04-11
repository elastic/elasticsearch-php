<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Segments
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Segments extends AbstractEndpoint
{
    /**
     * @return string
     */
    public function getURI()
    {
        $index = $this->index;
        $uri   = "/_segments";

        if (isset($index) === true) {
            $uri = "/$index/_segments";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'ignore_unavailable',
            'allow_no_indices',
            'expand_wildcards',
            'human',
            'operation_threading',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }
}
