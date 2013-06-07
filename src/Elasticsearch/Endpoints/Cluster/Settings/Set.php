<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Settings;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Set
 * @package Elasticsearch\Endpoints\Cluster
 */
class Set extends AbstractEndpoint
{

    /**
     * @param array $body
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return $this
     */
    public function setBody($body)
    {
        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body of Settings must be an array'
            );
        }
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = "/_cluster/settings";

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'PUT';

    }
}