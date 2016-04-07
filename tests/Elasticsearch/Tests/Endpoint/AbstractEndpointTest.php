<?php

namespace Elasticsearch\Tests\Endpoint;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Http\Message\MessageFactory\GuzzleMessageFactory;

class AbstractEndpointTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateRequest()
    {
        $endpoint = new AbstractEndpointStub('GET', '/test', []);
        $request = $endpoint->createRequest();

        $this->assertInstanceOf('Psr\Http\Message\RequestInterface', $request);
        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/test', $request->getRequestTarget());
    }
}

class AbstractEndpointStub extends AbstractEndpoint
{
    private $requestMethod;
    private $uri;
    private $paramsWhiteList;

    public function __construct($method, $uri, $paramsWhiteList)
    {
        parent::__construct(null, new GuzzleMessageFactory());

        $this->requestMethod = $method;
        $this->uri = $uri;
        $this->paramsWhiteList = $paramsWhiteList;
    }

    protected function getParamWhitelist()
    {
        return $this->paramsWhiteList;
    }

    protected function getURI()
    {
        return $this->uri;
    }

    protected function getMethod()
    {
        return $this->requestMethod;
    }
}
