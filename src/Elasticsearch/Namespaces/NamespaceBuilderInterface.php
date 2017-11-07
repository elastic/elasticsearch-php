<?php
/**
 * Class RegisteredNamespaceInterface
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

namespace Elasticsearch\Namespaces;

use Elasticsearch\Serializers\SerializerInterface;
use Elasticsearch\Transport;

interface NamespaceBuilderInterface
{
    /**
     * Returns the name of the namespace.  This is what users will call, e.g. the name
     * "foo" will be invoked by the user as `$client->foo()`
     * @return string
     */
    public function getName();

    /**
     * Returns the actual namespace object which contains your custom methods. The transport
     * and serializer objects are provided so that your namespace may do whatever custom
     * logic is required.
     *
     * @param Transport $transport
     * @param SerializerInterface $serializer
     * @return Object
     */
    public function getObject(Transport $transport, SerializerInterface $serializer);
}
