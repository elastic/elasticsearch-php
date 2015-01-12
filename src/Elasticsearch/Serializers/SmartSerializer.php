<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 10:00 PM
 */

namespace Elasticsearch\Serializers;

use Elasticsearch\Common\Exceptions\Serializer\JsonErrorException;

/**
 * Class SmartSerializer
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Serializers\JSONSerializer
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class SmartSerializer extends ArrayToJSONSerializer
{
    /**
     * Deserialize by introspecting content_type. Tries to deserialize JSON,
     * otherwise returns string
     *
     * @param string $data JSON encoded string
     * @param array  $headers Response Headers
     *
     * @throws JsonErrorException
     * @return array
     */
    public function deserialize($data, $headers)
    {
        if (isset($headers['content_type']) && strpos($headers['content_type'], 'json') === false) {
            return $data;
        }

        return $this->jsonDecode($data);
    }
}
