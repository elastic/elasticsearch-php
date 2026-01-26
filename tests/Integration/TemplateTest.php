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

namespace Elastic\Elasticsearch\Tests\Integration;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Tests\Utility;
use PHPUnit\Framework\TestCase;

/**
 * @group integration
 */
class TemplateTest extends TestCase
{
    protected Client $client;
    
    public function setUp(): void
    {
        $this->client = Utility::getClient();
    }

    public function testExistsTemplate()
    {
        $response = $this->client->indices()->existsTemplate([
            'name' => 'my_template'
        ]);
        $this->assertEquals(404, $response->getStatusCode());
    }
}