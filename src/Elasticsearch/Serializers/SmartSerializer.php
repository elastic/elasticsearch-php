<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:00 PM
 */

namespace Elasticsearch\Serializers;

/**
 * Class SmartSerializer
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Serializers\JSONSerializer
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class SmartSerializer implements SerializerInterface
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
        if (is_string($data) === true) {
            return $data;
        } else {
            $data = json_encode($data);
            if ($data === '[]') {
                return '{}';
            } else {
                return $data;
            }
        }


    }


    /**
     * Deserialize by introspecting content_type.  Tries to deserialize JSON,
     * otherwise returns string
     *
     * @param string $data JSON encoded string
     * @param array  $headers Response Headers
     *
     * @return array
     */
    public function deserialize($data, $headers)
    {
        if (isset($headers['content_type']) === true) {
            if (strpos($headers['content_type'], 'json') !== false) {
                return json_decode($data, true);
            } else {
                //Not json, return as string
                return $data;
            }

        } else {
            //No content headers, assume json
            return json_decode($data, true);
        }


    }
}