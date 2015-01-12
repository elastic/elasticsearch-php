<?php
/**
 * User: zach
 * Date: 6/20/13
 * Time: 9:15 AM
 */

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Serializers\EverythingToJSONSerializer;
use PHPUnit_Framework_TestCase;

/**
 * Class EverythingToJSONSerializerTest
 * @package Elasticsearch\Tests\Serializers
 */
class EverythingToJSONSerializerTest extends PHPUnit_Framework_TestCase
{
    public function testSerializeArray()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = array('value' => 'field');

        $ret = $serializer->serialize($body);

        $body = json_encode($body);
        $this->assertEquals($body, $ret);
    }

    public function testSerializeEmptyArrayReturnsEmptyJsonObject()
    {
        $serializer = new EverythingToJSONSerializer();

        $ret = $serializer->serialize(array());

        $this->assertEquals('{}', $ret);
    }

    public function testSerializeString()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = 'abc';

        $ret = $serializer->serialize($body);

        $body = '"abc"';
        $this->assertEquals($body, $ret);
    }

    /**
     * @expectedException Elasticsearch\Common\Exceptions\Serializer\JsonSerializationError
     */
    public function testSerializeArrayWithInvalidUtf8ThrowsException()
    {
        $serializer = new EverythingToJSONSerializer();

        $body = array("value" => "\xB1\x31"); // invalid UTF-8 byte sequence

        $serializer->serialize($body);
    }

    public function testDeserializeJSON()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = '{"field":"value"}';

        $ret = $serializer->deserialize($body, array());

        $body = json_decode($body, true);
        $this->assertEquals($body, $ret);
    }

    /**
     * @expectedException Elasticsearch\Common\Exceptions\Serializer\JsonDeserializationError
     */
    public function testDeserializeWithInvalidJsonThrowsException()
    {
        $serializer = new EverythingToJSONSerializer();
        $body = '{"field":}';

        $serializer->deserialize($body, array());
    }
}
