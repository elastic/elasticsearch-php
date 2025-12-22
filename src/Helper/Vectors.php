<?php
/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elastic\Elasticsearch\Helper;

class Vectors
{
    /**
     * Pack a dense vector for efficient uploading.
     *
     * @param array<float> $vector
     */
    public static function packDenseVector(array $vector): string
    {
        return base64_encode(pack('G*', ...$vector));
    }
}
