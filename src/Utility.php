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

namespace Elastic\Elasticsearch;

class Utility
{
    /**
     * Get the ENV variable with a thread safe fallback criteria
     * @see https://github.com/elastic/elasticsearch-php/issues/1237
     * 
     * @return string | false
     */
    public static function getEnv(string $env)
    {
        return $_SERVER[$env] ?? $_ENV[$env] ?? getenv($env);
    }

    /**
     * Remove all the characters not valid for a PHP variable name
     * The valid characters are: a-z, A-Z, 0-9 and _ (underscore)
     * The variable name CANNOT start with a number
     */
    public static function formatVariableName(string $var): string
    {
        // If the first character is a digit, we append the underscore
        if (is_numeric($var[0])) {
            $var = '_' . $var;
        }
        return preg_replace('/[^a-zA-Z0-9_]/', '', $var);
    }
}