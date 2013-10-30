<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Mget
 * @package Elasticsearch\Endpoints
 */
class Mget extends AbstractEndpoint
{

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

        if (is_array($body) !== true) {
            throw new Exceptions\InvalidArgumentException(
                'Body must be an array'
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
        $uri = array();
        $uri[] = $this->index;
        $uri[] = $this->type;
        $uri[] = '_mget';
        $uri =  array_filter($uri);

        return '/' . implode('/', $uri);
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
            '_source',
            '_source_include',
            '_source_exclude'
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }

}