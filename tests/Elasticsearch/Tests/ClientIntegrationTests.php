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

namespace Elasticsearch\Tests;

use Elasticsearch;

/**
 * Class ClientTest
 *
 * @subpackage Tests
 */
class ClientIntegrationTests extends \PHPUnit\Framework\TestCase
{
    public function testCustomQueryParams()
    {
        $client = Elasticsearch\ClientBuilder::create()
            ->setHosts([getenv('ES_TEST_HOST')])
            ->build();

        $getParams = [
            'index' => 'test',
            'type' => 'test',
            'id' => 1,
            'parent' => 'abc',
            'custom' => ['customToken' => 'abc', 'otherToken' => 123],
            'client' => ['ignore' => 400]
        ];
        $exists = $client->exists($getParams);

        $this->assertFalse((bool) $exists);
    }
}
