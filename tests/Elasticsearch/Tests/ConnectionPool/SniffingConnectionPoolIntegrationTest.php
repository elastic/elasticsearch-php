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

namespace Elasticsearch\Tests\ConnectionPool;

use Elasticsearch\ClientBuilder;
use Elasticsearch\ConnectionPool\SniffingConnectionPool;
use Elasticsearch\Tests\Utility;

/**
 * Class SniffingConnectionPoolIntegrationTest
 *
 * @subpackage Tests/SniffingConnectionPoolTest
 * @group Integration
 */
class SniffingConnectionPoolIntegrationTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        static::markTestSkipped("All of Sniffing unit tests use outdated cluster state format, need to redo");
    }

    public function testSniff()
    {
        $client = ClientBuilder::create()
            ->setHosts([Utility::getHost()])
            ->setConnectionPool(SniffingConnectionPool::class, ['sniffingInterval' => -10])
            ->build();

        $pinged = $client->ping();
        $this->assertTrue($pinged);
    }
}
