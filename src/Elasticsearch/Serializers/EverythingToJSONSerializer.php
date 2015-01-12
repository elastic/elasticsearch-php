<?php
/**
 * User: zach
 * Date: 6/20/13
 * Time: 9:04 AM
 */

namespace Elasticsearch\Serializers;

/**
 * Class EverythingToJSONSerializer
 * @category Elasticsearch
 * @package Elasticsearch\Serializers
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class EverythingToJSONSerializer extends AbstractJsonSerializer
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
        return $this->jsonEncode($data);
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
        return $this->jsonDecode($data);
    }
}
