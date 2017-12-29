<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

use Elasticsearch;

/**
 * Class ClientTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientIntegrationTests extends \PHPUnit\Framework\TestCase
{

    public function testAnalyzeIndices()
    {
        $client = ClientBuilder::create()->build();

        $response = $client->analyzeIndices([
            "index" => "fulltext",
            "body" => [
                "tokenizer" => "ik_smart",
                "text" => "用户可以在这里配置远程扩",
            ],
        ]);
        $this->assertInternalType("array", $response);
    }

    public function testCustomQueryParams()
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts([$_SERVER['ES_TEST_HOST']])->build();

        $getParams = [
            'index' => 'test',
            'type' => 'test',
            'id' => 1,
            'parent' => 'abc',
            'custom' => ['customToken' => 'abc', 'otherToken' => 123],
            'client' => ['ignore' => 400]
        ];
        $exists = $client->exists($getParams);

        $this->assertFalse($exists);
    }

}
