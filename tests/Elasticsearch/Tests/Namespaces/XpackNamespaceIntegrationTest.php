<?php

namespace Elasticsearch\Tests\Namespaces;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class XpackNamespaceIntegrationTest
 *
 * @category Elasticsearch
 * @package Elasticsearch\Tests\Namespaces
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class XpackNamespaceIntegrationTest extends TestCase
{

    /**
     * @var Client
     */
    protected $client;


    public function setUp()
    {
        $this->client = ClientBuilder::create()->setHosts([$_SERVER['ES_TEST_HOST']])->build();
    }

    public function testGet()
    {
        $response = $this->client->xpack()->get();
        $this->assertTrue(array_key_exists('build', $response));
        $this->assertTrue(array_key_exists('license', $response));
        $this->assertTrue(array_key_exists('features', $response));
        $this->assertTrue(array_key_exists('tagline', $response));
    }

    public function testGetWithCategories()
    {
        $parameter = array(
            'categories' => 'build,features'
        );

        $response = $this->client->xpack()->get($parameter);
        $this->assertTrue(array_key_exists('build', $response));
        $this->assertFalse(array_key_exists('license', $response));
        $this->assertTrue(array_key_exists('features', $response));
        $this->assertTrue(array_key_exists('tagline', $response));
    }

    public function testGetWithHumansFalse()
    {
        $parameter = array(
            'human' => false
        );

        $response = $this->client->xpack()->get($parameter);

        $this->assertFalse(array_key_exists('tagLine', $response));
    }

    public function testGetWithAllParameter()
    {
        $parameter = array(
            'categories' => 'build',
            'human' => false
        );

        $response = $this->client->xpack()->get($parameter);
        $this->assertTrue(array_key_exists('build', $response));
        $this->assertFalse(array_key_exists('license', $response));
        $this->assertFalse(array_key_exists('features', $response));
        $this->assertFalse(array_key_exists('tagLine', $response));
    }
}
