<?php
/**
 * User: zach
 * Date: 5/31/13
 * Time: 9:49 AM
 */

namespace Elasticsearch\Endpoints;


use Elasticsearch\Common\Exceptions\UnexpectedValueException;
use Elasticsearch\Transport;
use Exception;

/**
 * Class AbstractEndpoint
 * @package Elasticsearch\Endpoints
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

    /** @var \Elasticsearch\Transport  */
    private $transport = null;

    /** @var array  */
    private $ignore = [];

    /** @var bool  */
    private $verbose = false;

    /** @var array  */
    private $clientParams = [];


    /**
     * @return string[]
     */
    abstract protected function getParamWhitelist();


    /**
     * @return string
     */
    abstract protected function getURI();


    /**
     * @return string
     */
    abstract protected function getMethod();

    /**
     * @param Transport $transport
     */
    public function __construct($transport)
    {
        $this->transport = $transport;
    }


    /**
     * @throws \Exception
     * @return array
     */
    public function performRequest()
    {

        $promise =  $this->transport->performRequest(
            $this->getMethod(),
            $this->getURI(),
            $this->params,
            $this->getBody(),
            $this->clientParams,
            $this->ignore,
            $this->verbose
        );

        return $promise;

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
            $params = (array)$params;
        }

        $this->checkUserParams($params);
        $params = $this->convertCustom($params);
        $this->extractOptions($params);
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
     * @param $result
     * @return callable|array
     */
    public function resultOrFuture($result)
    {

        $response = null;
        $async = isset($this->clientParams['client']['future']) ? $this->clientParams['client']['future'] : null;
        if (is_null($async) || $async === false) {
            return $result->wait();
        } elseif ($async === true || $async === 'lazy') {
            return $result;
        }
    }


    /**
     * @return array
     */
    protected function getBody()
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
        if (isset($this->index) === true){
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
        if (isset($this->type) === true){
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
        try {
            $this->ifParamsInvalidThrowException($params);
        } catch (UnexpectedValueException $exception) {
            throw $exception;
        }
    }

    /**
     * Check if param is in whitelist
     *
     * @param array $params    Assoc array of parameters
     *
     * @throws \Elasticsearch\Common\Exceptions\UnexpectedValueException
     *
     */
    private function ifParamsInvalidThrowException($params)
    {
        if (isset($params) !== true) {
            return; //no params, just return.
        }

        $whitelist = array_merge($this->getParamWhitelist(), array('client'));

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


    /**
     * @param $params       Note: this is passed by-reference!
     */
    private function extractOptions(&$params)
    {
        $ignore = isset($params['client']['ignore']) ? $params['client']['ignore'] : null;
        if (isset($ignore) === true) {
            if (is_string($ignore)) {
                $this->ignore = explode(",", $ignore);
            } elseif (is_array($ignore)) {
                $this->ignore = $ignore;
            } else {
                $this->ignore = [$ignore];
            }

            unset($params['client']['ignore']);
        }

        if (isset($params['client']['verbose']) === true) {
            $this->verbose = $params['client']['verbose'];
            unset($params['client']['verbose']);
        }

        if (isset($params['client']) === true) {
            $this->clientParams['client'] = $params['client'];
            unset($params['client']);
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
        foreach ($params as &$param) {
            if (is_array($param) === true) {
                if ($this->isNestedArray($param) !== true){
                    $param = implode(",", $param);
                }

            }
        }

        return $params;
    }

    private function isNestedArray($a) {
        foreach ($a as $v) {
            if (is_array($v)) {
                return true;
            }
        }
        return false;
    }

}