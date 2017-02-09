<?php

namespace Elasticsearch\Serializers;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class EverythingToJSONSerializer
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Serializers
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class EverythingToJSONSerializer implements SerializerInterface
{
    /**
     * Serialize assoc array into JSON string
     *
     * @param string|array $data Assoc array to encode into JSON
     *
     * @return string
     */
    public function serialize($data)
    {
        $data = json_encode($data, JSON_PRESERVE_ZERO_FRACTION);
        if ($data === false) {
            throw new RuntimeException("Failed to JSON encode: ".json_last_error());
        }
        if ($data === '[]') {
            return '{}';
        } else {
            return $data;
        }
    }

    /**
     * Deserialize JSON into an assoc array
     *
     * @param string $data JSON encoded string
     * @param array  $headers Response headers
     *
     * @return array
     */
    public function deserialize($data, $headers)
    {
        return json_decode($data, true);
    }
}
