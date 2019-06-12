<?php

declare(strict_types = 1);

namespace Elasticsearch\Serializers;

use Elasticsearch\Common\Exceptions\RuntimeException;

if (!defined('JSON_INVALID_UTF8_SUBSTITUTE')) {
    //PHP < 7.2 Define it as 0 so it does nothing
    define('JSON_INVALID_UTF8_SUBSTITUTE', 0);
}

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
     * {@inheritdoc}
     */
    public function serialize($data): string
    {
        $data = json_encode($data, JSON_PRESERVE_ZERO_FRACTION + JSON_INVALID_UTF8_SUBSTITUTE);
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
     * {@inheritdoc}
     */
    public function deserialize(?string $data, array $headers)
    {
        return json_decode($data, true);
    }
}
