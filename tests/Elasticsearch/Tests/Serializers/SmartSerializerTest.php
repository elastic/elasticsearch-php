<?php
/**
 * User: zach
 * Date: 6/20/13
 * Time: 9:07 AM
 */

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Serializers\SmartSerializer;
use PHPUnit_Framework_TestCase;

/**
 * Class SmartSerializerTest
 * @package Elasticsearch\Tests\Serializers
 */
class SmartSerializerTest extends PHPUnit_Framework_TestCase
{
    private $serializer;

    public function testDeserializeWithNonJsonContentTypeReturnsRawDataString()
    {
        $body = '<some-tag>content</some-tag>';

        $result = $this->serializer->deserialize($body, array('content_type' => 'application/xml'));

        $this->assertEquals($body, $result);
    }

    public function testDeserializeWithJsonContentTypeReturnsDecodedJson()
    {
        $result = $this->serializer->deserialize('{"one": "two"}', array('content_type' => 'application/json'));

        $this->assertInternalType('array', $result);
        $this->assertArrayHasKeY('one', $result);
    }

    public function testDeserializeWithoutContentTypeReturnsDecodedJson()
    {
        $result = $this->serializer->deserialize('{"one": "two"}', array());

        $this->assertInternalType('array', $result);
        $this->assertArrayHasKeY('one', $result);
    }

    protected function setUp()
    {
        $this->serializer = new SmartSerializer();
    }
}
