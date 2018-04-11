<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Mapping;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Mapping
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Delete extends AbstractEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Delete'
            );
        }
        if (isset($this->type) !== true) {
            throw new Exceptions\RuntimeException(
                'type is required for Delete'
            );
        }
        $index = $this->index;
        $type = $this->type;
        $uri   = "/$index/$type/_mapping";

        if (isset($index) === true && isset($type) === true) {
            $uri = "/$index/$type/_mapping";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'master_timeout',
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'DELETE';
    }
}
