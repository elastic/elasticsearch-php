<?php
/**
 * User: zach
 * Date: 01/20/2014
 * Time: 14:34:49 pm
 */

namespace Elasticsearch\Endpoints\Indices\Template;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Delete
 *
 * @category Elasticsearch
 * @package Elasticsearch\Endpoints\Indices\Template
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */

class Delete extends AbstractEndpoint
{
    // The name of the template
    private $name;


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


    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    protected function getURI()
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for Delete'
            );
        }
        $name = $this->name;
        $uri   = "/_template/$name";

        if (isset($name) === true) {
            $uri = "/_template/$name";
        }

        return $uri;
    }


    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'timeout',
            'master_timeout',
        );
    }


    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'DELETE';
    }
}