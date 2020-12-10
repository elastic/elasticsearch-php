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

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Endpoints\Snapshot\Status;
use Elasticsearch\Common\Exceptions;

class StatusEndpointTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Elasticsearch\Endpoints\Snapshot\Status
     */
    private $endpoint;

    protected function setUp(): void
    {
        $this->endpoint = new Status();
    }

    public static function statusParams()
    {
        return [
            [
                'repository' => 'my_backup',
                'snapshot' => null,
                'expected' => '/_snapshot/my_backup/_status',
            ],
            [
                'repository' => 'my_backup',
                'snapshot' => 'snapshot_1',
                'expected' => '/_snapshot/my_backup/snapshot_1/_status',
            ],
        ];
    }

    /**
     * @dataProvider statusParams
     */
    public function testGetUriReturnsAppropriateUri($repository, $snapshot, $expected)
    {
        if ($repository) {
            $this->endpoint->setRepository($repository);
        }

        if ($snapshot) {
            $this->endpoint->setSnapshot($snapshot);
        }

        $this->assertSame($expected, $this->endpoint->getURI());
    }
}
