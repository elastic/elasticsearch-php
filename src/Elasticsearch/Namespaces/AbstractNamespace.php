<?php

declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Transport;

/**
 * Class AbstractNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractNamespace
{
    /** @var \Elasticsearch\Transport  */
    protected $transport;

    /** @var callable */
    protected $endpoints;

    /**
     * Abstract constructor
     *
     * @param Transport $transport Transport object
     * @param callable $endpoints
     */
    public function __construct($transport, $endpoints)
    {
        $this->transport = $transport;
        $this->endpoints = $endpoints;
    }

    /**
     * @param array $params
     * @param string $arg
     *
     * @return null|mixed
     */
    public function extractArgument(&$params, $arg)
    {
        if (is_object($params) === true) {
            $params = (array) $params;
        }

        if (array_key_exists($arg, $params) === true) {
            $val = $params[$arg];
            unset($params[$arg]);

            return $val;
        } else {
            return null;
        }
    }

    /**
     * @param AbstractEndpoint $endpoint
     *
     * @throws \Exception
     * @return array
     */
    protected function performRequest(AbstractEndpoint $endpoint)
    {
        $response = $this->transport->performRequest(
            $endpoint->getMethod(),
            $endpoint->getURI(),
            $endpoint->getParams(),
            $endpoint->getBody(),
            $endpoint->getOptions()
        );

        return $this->transport->resultOrFuture($response, $endpoint->getOptions());
    }
}
