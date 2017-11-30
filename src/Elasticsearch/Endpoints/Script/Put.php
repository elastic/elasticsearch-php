<?php

namespace Elasticsearch\Endpoints\Script;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Put
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Script
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Put extends AbstractEndpoint
{
    /**
     * @param array $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }

        $this->body = $body;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->id) !== true) {
            throw new Exceptions\RuntimeException(
                'id is required for put'
            );
        }
        $id   = $this->id;
        $uri  = "/_scripts/$id";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'version_type',
            'version',
            'op_type'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'PUT';
    }
}
