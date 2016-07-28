<?php

namespace Elasticsearch\Endpoints\Cat;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Help
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Cat
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Help extends AbstractEndpoint
{
    /**
     * @return string
     */
    protected function getEndpointURI()
    {
        $uri   = "/_cat";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'help',
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
