<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Serializers\EverythingToJSONSerializer;
use PHPUnit_Framework_TestCase;
use Mockery as m;

/**
 * Class EverythingToJSONSerializerTest
 * @package Elasticsearch\Tests\Serializers
 */
class EverythingToJSONSerializerTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testSerializeArray()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = ['value' => 'field'];

        $ret = $serializer->serialize($body);

        $body = json_encode($body, JSON_PRESERVE_ZERO_FRACTION);
        $this->assertSame($body, $ret);
    }

    public function testSerializeString()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = 'abc';

        $ret = $serializer->serialize($body);

        $body = '"abc"';
        $this->assertSame($body, $ret);
    }

    public function testDeserializeJSON()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = '{"field":"value"}';

        $ret = $serializer->deserialize($body, []);

        $body = json_decode($body, true);
        $this->assertSame($body, $ret);
    }
}
