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
 * Class Count
 * @package Elasticsearch\Endpoints
 */
class Count extends AbstractEndpoint
{
    /**
     * @param $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    protected function getURI()
    {

        $uri = array();
        $uri[] = $this->getIndex();
        $uri[] = $this->getType();
        $uri[] = '_count';
        $uri =  array_filter($uri);

        $uri =  '/' . implode('/', $uri);

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'ignore_indices',
            'min_score',
            'operation_threading',
            'preference',
            'routing',
            'source',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }

    private function getIndex()
    {
        if (isset($this->index) === true){
            return $this->index;
        } else {
            return '_all';
        }
    }

    private function getType()
    {
        if (isset($this->type) === true){
            return $this->type;
        } else {
            return '';
        }
    }

}