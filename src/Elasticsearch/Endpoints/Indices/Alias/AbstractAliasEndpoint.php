<?php

declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Indices\Alias;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractAliasEndpoint
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices\Alias
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractAliasEndpoint extends AbstractEndpoint
{
    /** @var null|string */
    protected $name = null;

    /**
     * @param string $name
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     *
     * @return $this
     */
    public function setName($name)
    {
        if (is_string($name) !== true) {
            throw new InvalidArgumentException('Name must be a string');
        }
        $this->name = urlencode($name);

        return $this;
    }
}
