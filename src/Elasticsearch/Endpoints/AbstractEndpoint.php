<?php

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\UnexpectedValueException;

/**
 * Class AbstractEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class AbstractEndpoint
{
    /** @var array  */
    protected $params = array();

    /** @var  string */
    protected $index = null;

    /** @var  string */
    protected $type = null;

    /** @var  string|int */
    protected $id = null;

    /** @var  string */
    protected $method = null;

    /** @var  array */
    protected $body = null;

    /**
     * @return string[]
     */
    abstract protected function getParamWhitelist();

    /**
     * @return string
     */
    abstract protected function getEndpointURI();

    /**
     * Return the full url (url + query params) for this endpoint
     *
     * @return string
     */
    public function getURI()
    {
        $uri = $this->getEndpointURI();

        if (!empty($this->params)) {
            $uri .= '?'.http_build_query($this->params);
        }

        return $uri;
    }

    /**
     * @return string
     */
    abstract public function getMethod();

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set the parameters for this endpoint
     *
     * @param string[] $params Array of parameters
     * @return $this
     */
    public function setParams($params)
    {
        if (is_object($params) === true) {
            $params = (array) $params;
        }

        $this->checkUserParams($params);
        $params = $this->convertCustom($params);
        $this->params = $this->convertArraysToStrings($params);

        return $this;
    }

    /**
     * @param string $index
     *
     * @return $this
     */
    public function setIndex($index)
    {
        if ($index === null) {
            return $this;
        }

        if (is_array($index) === true) {
            $index = array_map('trim', $index);
            $index = implode(",", $index);
        }

        $this->index = urlencode($index);

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        if ($type === null) {
            return $this;
        }

        if (is_array($type) === true) {
            $type = array_map('trim', $type);
            $type = implode(",", $type);
        }

        $this->type = urlencode($type);

        return $this;
    }

    /**
     * @param int|string $docID
     *
     * @return $this
     */
    public function setID($docID)
    {
        if ($docID === null) {
            return $this;
        }

        $this->id = urlencode($docID);

        return $this;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $endpoint
     *
     * @return string
     */
    protected function getOptionalURI($endpoint)
    {
        $uri = array();
        $uri[] = $this->getOptionalIndex();
        $uri[] = $this->getOptionalType();
        $uri[] = $endpoint;
        $uri =  array_filter($uri);

        return '/' . implode('/', $uri);
    }

    /**
     * @return string
     */
    private function getOptionalIndex()
    {
        if (isset($this->index) === true) {
            return $this->index;
        } else {
            return '_all';
        }
    }

    /**
     * @return string
     */
    private function getOptionalType()
    {
        if (isset($this->type) === true) {
            return $this->type;
        } else {
            return '';
        }
    }

    /**
     * @param array $params
     *
     * @throws \Elasticsearch\Common\Exceptions\UnexpectedValueException
     */
    private function checkUserParams($params)
    {
        if (isset($params) !== true) {
            return; //no params, just return.
        }

        $whitelist = array_merge($this->getParamWhitelist(), array('client', 'custom', 'filter_path'));

        foreach ($params as $key => $value) {
            if (array_search($key, $whitelist) === false) {
                throw new UnexpectedValueException(sprintf(
                    '"%s" is not a valid parameter. Allowed parameters are: "%s"',
                    $key,
                    implode('", "', $whitelist)
                ));
            }
        }
    }

    private function convertCustom($params)
    {
        if (isset($params['custom']) === true) {
            foreach ($params['custom'] as $k => $v) {
                $params[$k] = $v;
            }
            unset($params['custom']);
        }

        return $params;
    }

    private function convertArraysToStrings($params)
    {
        foreach ($params as $key => &$value) {
            if (!($key === 'client' || $key == 'custom') && is_array($value) === true) {
                if ($this->isNestedArray($value) !== true) {
                    $value = implode(",", $value);
                }
            }
        }

        return $params;
    }

    private function isNestedArray($a)
    {
        foreach ($a as $v) {
            if (is_array($v)) {
                return true;
            }
        }

        return false;
    }
}
