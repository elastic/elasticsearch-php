<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Rollover
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Rollover extends AbstractEndpoint
{
    private $alias;
    private $newIndex;

    /**
     * @param string $alias
     *
     * @return $this
     */
    public function setAlias($alias)
    {
        if ($alias === null) {
            return $this;
        }

        $this->alias = urlencode($alias);
        return $this;
    }

    /**
     * @param string $newIndex
     *
     * @return $this
     */
    public function setNewIndex($newIndex)
    {
        if ($newIndex === null) {
            return $this;
        }

        $this->newIndex = urlencode($newIndex);
        return $this;
    }

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
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
        if (isset($this->alias) !== true) {
            throw new Exceptions\RuntimeException(
                'alias name is required for Rollover'
            );
        }

        $uri = "/{$this->alias}/_rollover";

        if (isset($this->newIndex) === true) {
            $uri .= "/{$this->newIndex}";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'timeout',
            'master_timeout',
            'wait_for_active_shards',
            'include_type_name'
        );
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return 'POST';
    }
}
