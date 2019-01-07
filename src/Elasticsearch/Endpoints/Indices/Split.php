<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Split
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Split extends AbstractEndpoint
{

    private $target;

    /**
     * @param array|object $body
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
     * @param string $target
     *
     * @return $this
     */
    public function setTarget($target)
    {
        if ($target === null) {
            return $this;
        }
        $this->target = $target;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (isset($this->index) !== true) {
            throw new Exceptions\RuntimeException(
                'index is required for Split'
            );
        }

        if (isset($this->target) !== true) {
            throw new Exceptions\RuntimeException(
                'target is required for Split'
            );
        }

        $uri   = "/{$this->index}/_split/{$this->target}";

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'copy_settings',
            'timeout',
            'master_timeout',
            'wait_for_active_shards'
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
