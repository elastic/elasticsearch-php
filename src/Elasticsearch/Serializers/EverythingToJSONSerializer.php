<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Serializers;

use Elasticsearch\Common\Exceptions\RuntimeException;

/**
 * Class EverythingToJSONSerializer
 *
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
