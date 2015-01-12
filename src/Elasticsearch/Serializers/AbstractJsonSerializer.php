<?php

namespace Elasticsearch\Serializers;

use Elasticsearch\Common\Exceptions\Serializer\JsonSerializationError;
use Elasticsearch\Common\Exceptions\Serializer\JsonDeserializationError;

/**
 * An abstract base class for serializers that go to/from JSON.
 *
 * @author   Christopher Davis <cdavis9999@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
abstract class AbstractJsonSerializer implements SerializerInterface
{
    /**
     * Encode a php object or array to a JSON string
     *
     * @param   object|array $value
     * @throws  JsonSerializationError if something goes wrong during encoding
     * @return  string
     */
    protected static function jsonEncode($value)
    {
        $result = json_encode($value);

        if (static::hasJsonError()) {
            throw new JsonSerializationError(json_last_error(), $value, $result);
        }

        return '[]' === $result ? '{}' : $result;
    }

    /**
     * Decode a JSON string to a PHP array.
     *
     * @param   string $json
     * @throws  JsonDeserializationError if something goes wrong during decoding
     * @return  array
     */
    protected static function jsonDecode($json)
    {
        $result = json_decode($json, true);

        if (static::hasJsonError()) {
            throw new JsonDeserializationError(json_last_error(), $json, $result);
        }

        return $result;
    }

    /**
     * Check to see if the last `json_{encode,decode}` call produced an error.
     *
     * @return  boolean
     */
    protected static function hasJsonError()
    {
        return json_last_error() !== JSON_ERROR_NONE;
    }
}
