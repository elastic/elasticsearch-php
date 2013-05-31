<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:00 PM
 */

namespace Elasticsearch\Serializers;

/**
 * Class JSONSerializer
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Serializers\JSONSerializer
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class JSONSerializer implements SerializerInterface
{


    /**
     * Serialize assoc array into JSON string
     *
     * @param array $data Assoc array to encode into JSON
     *
     * @return string
     */
    public function serialize($data)
    {
        return json_encode($data);

    }


    /**
     * Deserialize JSON into an assoc array
     *
     * @param string $data JSON encoded string
     *
     * @return array
     */
    public function deserialize($data)
    {
        return json_decode($data, true);

    }
}