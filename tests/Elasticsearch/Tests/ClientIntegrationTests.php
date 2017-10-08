<?php

declare(strict_types=1);

namespace Elasticsearch\Tests;

use Elasticsearch;
use stdClass;

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

    /**
     * @dataProvider
     */
    public function testExistAlias($alias)
    {
        $client = Elasticsearch\ClientBuilder::create()->setHosts([$_SERVER['ES_TEST_HOST']])->build();

        $this->createIndexWithAlias($alias, $client);

        $params = array(
            'name' => $alias
        );

        $this->assertTrue($client->indices()->existsAlias($params));
    }

    public function existAliasDataProvider()
    {
        return [
            ['myindextest'],
            ['⿇⽸⾽']
        ];
    }

    /**
     * @param $alias
     * @param $client Elasticsearch\Client
     */
    private function createIndexWithAlias($alias, $client)
    {
        $params = array(
            'index' => $alias . '_v1',
            'body' => array(
                'aliases' => array(
                    $alias => new stdClass()
                )),
        );

        $client->indices()->create($params);
    }

}
