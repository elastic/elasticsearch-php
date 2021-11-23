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

namespace Elasticsearch\Tests\Serializers;

use Elasticsearch\Common\Exceptions\Serializer\JsonErrorException;
use Elasticsearch\Serializers\SmartSerializer;
use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class SmartSerializerTest
 *
 */
class SmartSerializerTest extends TestCase
{
    public function setUp(): void
    {
        $this->serializer = new SmartSerializer();
    }

    /**
     * @requires PHP 7.3
     * @see https://github.com/elastic/elasticsearch-php/issues/1012
     */
    public function testThrowJsonErrorException()
    {
        $this->expectException(JsonErrorException::class);
        $this->expectExceptionCode(JSON_ERROR_SYNTAX);

        $result = $this->serializer->deserialize('{ "foo" : bar" }', []);
    }

    /**
     * Single unpaired UTF-16 surrogate in unicode escape
     * 
     * @requires PHP 7.3
     * @see https://github.com/elastic/elasticsearch-php/issues/1171
     */
    public function testSingleUnpairedUTF16SurrogateInUnicodeEscape()
    {
        $json = '{ "data": "ud83d\ude4f" }';

        $result = $this->serializer->deserialize($json, []);
        $this->assertEquals($result['data'], 'ud83d\ude4f');
    }
}
