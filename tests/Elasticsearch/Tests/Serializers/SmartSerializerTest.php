<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Common\Exceptions\Serializer\JsonErrorException;
use Elasticsearch\Serializers\SmartSerializer;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class SmartSerializerTest
 *
 * @package Elasticsearch\Tests\Serializers
 */
class SmartSerializerTest extends TestCase
{
    public function setUp(): void
    {
        $this->serializer = new SmartSerializer();
    }

    /**
     * @requires PHP 7.3
     * @see https://github.com/elastic/elasticsearch-php/issues/1012
     */
    public function testThrowJsonErrorException()
    {
        $this->expectException(JsonErrorException::class);
        $this->expectExceptionCode(JSON_ERROR_SYNTAX);

        $result = $this->serializer->deserialize('{ "foo" : bar" }', []);
    }
}
