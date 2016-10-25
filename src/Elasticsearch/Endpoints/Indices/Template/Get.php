<?php

namespace Elasticsearch\Endpoints\Indices\Template;

use Elasticsearch\Common\Exceptions;

/**
 * Class Get
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Template
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class Get extends AbstractTemplateEndpoint
{
    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        $name = $this->name;
        $uri   = "/_template";

        if (isset($name) === true) {
            $uri = "/_template/$name";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return array(
            'flat_settings',
            'local',
            'master_timeout'
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
