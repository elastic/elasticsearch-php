<?php

namespace Iprice\Elasticsearch\Tests;

use Iprice\Elasticsearch\ClientBuilder;
use Iprice\Elasticsearch\Serializers\SerializerInterface;
use Iprice\Elasticsearch\Transport;
use Mockery as m;

/**
 * Class RegisteredNamespaceTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class RegisteredNamespaceTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testRegisteringNamespace()
    {
        $builder = new FooNamespaceBuilder();
        $client = ClientBuilder::create()->registerNamespace($builder)->build();
        $this->assertEquals("123", $client->foo()->fooMethod());
    }

    /**
     * @expectedException \Iprice\Elasticsearch\Common\Exceptions\BadMethodCallException
     */
    public function testNonExistingNamespace()
    {
        $builder = new FooNamespaceBuilder();
        $client = ClientBuilder::create()->registerNamespace($builder)->build();
        $this->assertEquals("123", $client->bar()->fooMethod());
    }
}

class FooNamespaceBuilder implements \Iprice\Elasticsearch\Namespaces\NamespaceBuilderInterface
{
    public function getName()
    {
        return "foo";
    }

    public function getObject(Transport $transport, SerializerInterface $serializer)
    {
        return new FooNamespace();
    }
}

class FooNamespace
{
    public function fooMethod()
    {
        return "123";
    }
}