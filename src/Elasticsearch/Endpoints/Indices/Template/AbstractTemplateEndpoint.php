<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 2:51 PM
 */

namespace Elasticsearch\Endpoints\Indices\Template;


use Elasticsearch\Endpoints\AbstractEndpoint;

abstract class AbstractTemplateEndpoint extends AbstractEndpoint
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