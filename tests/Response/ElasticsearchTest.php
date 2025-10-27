<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types=1);

namespace Elastic\Elasticsearch\Tests\Response;

use DateTime;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ArrayAccessException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ProductCheckException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Exception\UnknownContentTypeException;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use stdClass;

class ElasticsearchTest extends TestCase
{
    protected Psr17Factory $psr17Factory;
    protected ResponseInterface $elasticsearch;
    protected ResponseInterface $response200;
    protected ResponseInterface $response400;
    protected ResponseInterface $response500;

    public function setUp(): void
    {
        $this->psr17Factory = new Psr17Factory();
        $this->elasticsearch = new Elasticsearch();

        $this->response200 = $this->psr17Factory->createResponse(200)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->response400 = $this->psr17Factory->createResponse(400)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');

        $this->response500 = $this->psr17Factory->createResponse(500)
            ->withHeader('X-Elastic-Product', 'Elasticsearch')
            ->withHeader('Content-Type', 'application/json');
    }

    public function testAsArray(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($array, $this->elasticsearch->asArray());
    }

    public function testAsString(): void
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($json, $this->elasticsearch->asString());
    }

    public function testAsObject(): void
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $obj = $this->elasticsearch->asObject();
        $this->assertIsObject($obj);
        $this->assertEquals('bar', $obj->foo);
    }

    public function testAsBoolIsTrueWith200(): void
    {
        $this->elasticsearch->setResponse($this->response200);
        $this->assertTrue($this->elasticsearch->asBool());
    }

    public function testAsBoolIsFalseWith400(): void
    {
        $this->elasticsearch->setResponse($this->response400, false);
        $this->assertFalse($this->elasticsearch->asBool());
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::__toString()
     */
    public function testSerializeAsString(): void
    {
        $json = json_encode(['foo' => 'bar']);
        $body = $this->psr17Factory->createStream($json);
        $this->elasticsearch->setResponse($this->response200->withBody($body));
        $this->assertEquals($json, (string) $this->elasticsearch);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetResponse(): void
    {
        $this->elasticsearch->setResponse($this->response200);
    }

    public function testSetResponseFromUnknownSourceThrowProductCheckException(): void
    {
        $response = $this->psr17Factory->createResponse(200)
            ->withHeader('Content-Type', 'application/json');

        $this->expectException(ProductCheckException::class);
        $this->elasticsearch->setResponse($response);
    }

    public function testSetResponseWith400ThrowException(): void
    {
        $this->expectException(ClientResponseException::class);
        $this->elasticsearch->setResponse($this->response400);
    }

    public function testSetResponseWith500ThrowException(): void
    {
        $this->expectException(ServerResponseException::class);
        $this->elasticsearch->setResponse($this->response500);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetResponseWith400AndThrowFalseDoesNotThrowException(): void
    {
        $this->elasticsearch->setResponse($this->response400, false);
    }

    /**
    * @doesNotPerformAssertions
    */
    public function testSetResponseWith500AndThrowFalseDoesNotThrowException(): void
    {
        $this->elasticsearch->setResponse($this->response500, false);
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::offsetGet
     */
    public function testAccessAsArray(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertEquals($array['foo'], $this->elasticsearch['foo']);
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::offsetExists
     */
    public function testIsSetArrayAccess(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertTrue(isset($this->elasticsearch['foo']));
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::offsetSet
     */
    public function testSetArrayAccessThrowException(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->expectException(ArrayAccessException::class);
        $this->elasticsearch['foo'] = 'test';
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::offsetSet
     */
    public function testUnsetArrayAccessThrowException(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->expectException(ArrayAccessException::class);
        unset($this->elasticsearch['foo']);
    }

    /**
     * @covers Elastic\Elasticsearch\Response\Elasticsearch::__get()
     */
    public function testAccessAsObject(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->assertEquals($array['foo'], $this->elasticsearch->foo);
    }

    public function testWithStatusForPsr7Version1And2Compatibility(): void
    {
        $this->elasticsearch->setResponse($this->response200);

        $this->elasticsearch = $this->elasticsearch->withStatus(400);
        $this->assertEquals(400, $this->elasticsearch->getStatusCode());
    }

    public function testMapToStdClassAsDefault(): void
    {
        $array = [
            'columns' => [
                ['name' => 'a', 'type' =>  'integer'],
                ['name' => 'b', 'type' =>  'date']
            ],
            'values' => [
                [1, '2023-10-23T12:15:03.360Z'],
                [3, '2023-10-23T13:55:01.543Z']
            ]
        ];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $iterator = $this->elasticsearch->mapTo();
        $this->assertIsArray($iterator);
        $this->assertEquals(stdClass::class, get_class($iterator[0]));
        $this->assertEquals(stdClass::class, get_class($iterator[1]));
        $this->assertEquals('integer', gettype($iterator[0]->a));
        $this->assertEquals(DateTime::class, get_class($iterator[0]->b));
        $this->assertEquals('integer', gettype($iterator[1]->a));
        $this->assertEquals(DateTime::class, get_class($iterator[1]->b));
    }

    public function testMapToStdClass(): void
    {
        $array = [
            'columns' => [
                ['name' => 'a', 'type' =>  'integer'],
                ['name' => 'b', 'type' =>  'date']
            ],
            'values' => [
                [1, '2023-10-23T12:15:03.360Z'],
                [3, '2023-10-23T13:55:01.543Z']
            ]
        ];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $iterator = $this->elasticsearch->mapTo(stdClass::class);
        $this->assertIsArray($iterator);
        $this->assertEquals(stdClass::class, get_class($iterator[0]));
        $this->assertEquals(stdClass::class, get_class($iterator[1]));
    }

    public function testMapToWithoutEsqlResponseWillThrowException(): void
    {
        $array = ['foo' => 'bar'];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $this->expectException(UnknownContentTypeException::class);
        $iterator = $this->elasticsearch->mapTo();
    }

    public function testMapToCustomClass(): void
    {
        $array = [
            'columns' => [
                ['name' => 'a', 'type' =>  'integer'],
                ['name' => 'b', 'type' =>  'date']
            ],
            'values' => [
                [1, '2023-10-23T12:15:03.360Z'],
                [3, '2023-10-23T13:55:01.543Z']
            ]
        ];
        $body = $this->psr17Factory->createStream(json_encode($array));
        $this->elasticsearch->setResponse($this->response200->withBody($body));

        $iterator = $this->elasticsearch->mapTo(TestMapClass::class);

        $this->assertIsArray($iterator);
        $this->assertEquals(TestMapClass::class, get_class($iterator[0]));
        $this->assertEquals('integer', gettype($iterator[0]->a));
        $this->assertEquals(DateTime::class, get_class($iterator[0]->b));
        $this->assertEquals('', $iterator[0]->c);
    }

    public function testIsServerlessFalseByDefault(): void
    {
        $this->assertFalse($this->elasticsearch->isServerless());
    }

    public function testIsServerlessTrueWithServerlessResponse(): void
    {
        $this->elasticsearch->setResponse(
            $this->response200->withHeader(Client::API_VERSION_HEADER, Client::API_VERSION)
        );
        $this->assertTrue($this->elasticsearch->isServerless());
    }

    public function testIsServerlessFalseIfNotServerlessResponse(): void
    {
        $this->elasticsearch->setResponse($this->response200);
        $this->assertFalse($this->elasticsearch->isServerless());
    }

    public function testCacheIsClearedOnSetResponse(): void
    {
        $firstBody = $this->psr17Factory->createStream(json_encode(['foo' => 'bar']));
        $this->elasticsearch->setResponse($this->response200->withBody($firstBody));
        $this->assertSame('bar', $this->elasticsearch->asArray()['foo']);

        $secondBody = $this->psr17Factory->createStream(json_encode(['foo' => 'baz']));
        $this->elasticsearch->setResponse($this->response200->withBody($secondBody));
        $this->assertSame('baz', $this->elasticsearch->asArray()['foo']);
    }
}
