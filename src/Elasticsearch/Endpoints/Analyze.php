<?php
namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions;

/**
 * Class Analyze
 *
 * @package Elasticsearch\Endpoints
 * @author Fenton Ma <mfdboy@163.com>
 */
class Analyze extends AbstractEndpoint
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

        $this->body = $body;

        return $this;
    }

    /**
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        if (!empty($this->index)) {
            return "/" . $this->index . "/_analyze";
        }
        return "/_analyze";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
        ];
    }
    
    /**
     * @return string
     */
    public function getMethod()
    {
        return 'GET';
    }

}
