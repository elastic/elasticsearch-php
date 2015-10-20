<?php
namespace Elasticsearch\Tests\Connections;


use Elasticsearch\Connections\Connection;
use Elasticsearch\Serializers\SerializerInterface;
use GuzzleHttp\Ring\Future\CompletedFutureArray;
use Psr\Log\LoggerInterface;

class ConnectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hostPartProvider
     *
     * @param array $hostParts
     */
    public function testStandardPortsAreNotSpecifiedOnHosts(array $hostParts, $isStandard)
    {
        $connection = new Connection(
            function (array $request) use ($isStandard, $hostParts) {
                $expectedHost = $hostParts['host'];
                if (!$isStandard) {
                    $expectedHost .= ":{$hostParts['port']}";
                }

                $this->assertSame($expectedHost, $request['headers']['host'][0]);

                return new CompletedFutureArray([]);
            },
            $hostParts,
            [],
            $this->getMock(SerializerInterface::class),
            $this->getMock(LoggerInterface::class),
            $this->getMock(LoggerInterface::class)
        );

        $connection->performRequest('GET', '/');
    }

    public function hostPartProvider()
    {
        return [
            [
                [
                    'scheme' => 'http',
                    'host' => 'example.com',
                    'port' => 80,
                ],
                true,
            ],
            [
                [
                    'scheme' => 'https',
                    'host' => 'example.com',
                    'port' => 443,
                ],
                true,
            ],
            [
                [
                    'scheme' => 'http',
                    'host' => 'example.com',
                    'port' => 443,
                ],
                false,
            ],
            [
                [
                    'scheme' => 'https',
                    'host' => 'example.com',
                    'port' => 80,
                ],
                false,
            ],
            [
                [
                    'scheme' => 'http',
                    'host' => 'example.com',
                    'port' => 9200,
                ],
                false,
            ],
            [
                [
                    'scheme' => 'https',
                    'host' => 'example.com',
                    'port' => 9200,
                ],
                false,
            ],
        ];
    }
}
