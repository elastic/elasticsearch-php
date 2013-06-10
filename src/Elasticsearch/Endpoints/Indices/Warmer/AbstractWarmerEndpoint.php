<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 3:58 PM
 */

namespace Elasticsearch\Endpoints\Indices\Warmer;


use Elasticsearch\Endpoints\AbstractEndpoint;

abstract class AbstractWarmerEndpoint extends AbstractEndpoint
{
    /** @var  string */
    protected $name;


    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}