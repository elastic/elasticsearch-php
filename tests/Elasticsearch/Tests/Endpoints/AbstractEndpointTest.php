<?php

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

class AbstractEndpointTest extends \PHPUnit_Framework_TestCase
{
    private $endpoint;

    public static function invalidParameters()
    {
        return [
            [['invalid' => 10]],
            [['invalid' => 10, 'invalid2' => 'another']],
        ];
    }

    /**
     * @dataProvider invalidParameters
     * @expectedException Elasticsearch\Common\Exceptions\UnexpectedValueException
     */
    public function testInvalidParamsCauseErrorsWhenProvidedToSetParams(array $params)
    {
        $this->endpoint->expects($this->once())
            ->method('getParamWhitelist')
            ->willReturn(['one', 'two']);

        $this->endpoint->setParams($params);
    }

    protected function setUp()
    {
        $this->endpoint = $this->getMockForAbstractClass(AbstractEndpoint::class);
    }
}
