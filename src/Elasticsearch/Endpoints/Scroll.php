<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 2:41 PM
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Scroll
 * @package Elasticsearch\Endpoints
 */
class Scroll extends AbstractEndpoint
{

    protected $scrollID;

    /**
     * @param string $query
     *
     * @return $this
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     */
    public function setBody($query)
    {
        if (isset($query) !== true) {
            return $this;
        }

        if (is_string($query) !== true) {
            throw new InvalidArgumentException(
                'body must be a string'
            );
        }
        $this->body = $query;
        return $this;
    }


    /**
     * @param string $scrollID
     *
     * @return $this
     */
    public function setScrollID($scrollID)
    {
        $this->scrollID = $scrollID;
        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {
        $uri      = '/_search/scroll/';
        $scrollID = $this->scrollID;

        if (isset($scrollID) === true) {
            $uri = "/_search/scroll/$scrollID";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'scroll',
            'scroll_id',
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