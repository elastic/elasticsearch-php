<?php

namespace Elasticsearch\Endpoints\Indices\Alias;

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
    /** @var null|string : the name of alias */
    protected $name = null;

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = urlencode($name);

        return $this;
    }
}
