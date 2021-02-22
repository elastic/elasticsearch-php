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

use Elasticsearch\Common\Exceptions;
use Elasticsearch\Common\Exceptions\Serializer\JsonErrorException;

/**
 * Class SmartSerializer
 *
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
            $data = json_encode($data, JSON_PRESERVE_ZERO_FRACTION);
            if ($data === false) {
                throw new Exceptions\RuntimeException("Failed to JSON encode: ".json_last_error());
            }
            if ($data === '[]') {
                return '{}';
            } else {
                return $data;
            }
        }
    }

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
        if (isset($headers['content_type']) === true) {
            if (strpos($headers['content_type'], 'json') !== false) {
                return $this->decode($data);
            } else {
                //Not json, return as string
                return $data;
            }
        } else {
            //No content headers, assume json
            return $this->decode($data);
        }
    }

    /**
     * @todo For 2.0, remove the E_NOTICE check before raising the exception.
     *
     * @param string|null $data
     *
     * @return array
     * @throws JsonErrorException
     */
    private function decode($data)
    {
        if ($data === null || strlen($data) === 0) {
            return "";
        }

        $result = @json_decode($data, true);

        // Throw exception only if E_NOTICE is on to maintain backwards-compatibility on systems that silently ignore E_NOTICEs.
        if (json_last_error() !== JSON_ERROR_NONE && (error_reporting() & E_NOTICE) === E_NOTICE) {
            $e = new JsonErrorException(json_last_error(), $data, $result);
            throw $e;
        }

        return $result;
    }
}
