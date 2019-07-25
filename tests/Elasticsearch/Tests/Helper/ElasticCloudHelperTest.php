<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Tests\Helper;

use Elasticsearch\Helper\ElasticCloudHelper;
use Elasticsearch\Common\Exceptions\ElasticCloudIdParseException;

/**
 * Class ElasticCloudHelperTest
 *
 * @package Elasticsearch\Tests\Helper
 * @author  Philip Krauss <philip.krauss@elastic.co>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    https://elastic.co
 */
class ElasticCloudHelperTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @return array
     */
    public function cloudIdsProvider()
    {
        return [
            ['name' => 'my-cluster-001', 'domain' => 'd-001.com', 'uuids' => 'elasticsearch'],
            ['name' => 'my-cluster-002', 'domain' => 'd-002.net', 'uuids' => 'elasticsearch:kibana'],
            ['name' => 'my-cluster-003', 'domain' => 'd-003.org', 'uuids' => 'elasticsearch:kibana:apm'],
        ];
    }

    /**
     * @return array 
     */
    public function hostArrayProvider()
    {
        return [
            [
                [
                    'host'   => 'es.d.co',
                    'port'   => '',
                    'scheme' => 'https',
                ]
            ]
        ];
    }

    /**
     * @dataProvider cloudIdsProvider
     * 
     * @covers \ElasticCloudHelperTest::parse
     * @covers \ElasticCloudHelperTest::getCloudId
     * @covers \ElasticCloudHelperTest::getClusterName
     * @covers \ElasticCloudHelperTest::getClusterDns
     */
    public function testElasticCloudParserAndAccessors($name, $domain, $uuids)
    {
        $cloudId = sprintf('%s:%s', $name, base64_encode(sprintf('%s$%s', $domain, $uuids)));
        $dns     = sprintf('elasticsearch.%s', $domain);

        $cloud = new ElasticCloudHelper($cloudId);

        $this->assertEquals($cloud->getCloudId(), $cloudId);
        $this->assertEquals($cloud->getClusterName(), $name);
        $this->assertEquals($cloud->getClusterDns(), $dns);
    }

    /**
     * @depends testElasticCloudParserAndAccessors
     * 
     * @dataProvider hostArrayProvider
     * 
     * @covers \ElasticCloudHelperTest::getHost
     */
    public function testGetHostWithoutBasicAuthentication($expected)
    {
        $cloudId = sprintf('name:%s', base64_encode(sprintf('d.co$es')));

        $cloud = new ElasticCloudHelper($cloudId);
        
        $host  = $cloud->getHost();

        $this->assertArrayHasKey(0, $host);
        $this->assertEquals(1, count($host));
        $this->assertEquals($expected, $host[0]);
        
        $this->assertArrayNotHasKey('user', $host[0]);
        $this->assertArrayNotHasKey('pass', $host[0]);
    }

    /**
     * @depends testGetHostWithoutBasicAuthentication
     * 
     * @dataProvider hostArrayProvider
     * 
     * @covers \ElasticCloudHelperTest::getHost
     */
    public function testGetHostWithBasicAuthentication($expected)
    {
        $cloudId = sprintf('name:%s', base64_encode(sprintf('d.co$es')));

        $cloud = new ElasticCloudHelper($cloudId);

        // Hook Basic Auth Credentials in the Host config
        $expected['user'] = 'username';
        $expected['pass'] = 'super-secret-password';
        $cloud->setBasicAuthentication($expected['user'], $expected['pass']);

        $host  = $cloud->getHost();

        $this->assertArrayHasKey(0, $host);
        $this->assertEquals(1, count($host));
        $this->assertEquals($expected, $host[0]);
    }

    /**
     * @covers \ElasticCloudHelperTest::parse
     */
    public function testCloudIdParseExceptionWithMissingCloudId()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudHelper('');
    }

    /**
     * @covers \ElasticCloudHelperTest::parse
     */
    public function testCloudIdParseExceptionWithMissingHostPart()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudHelper('foo:');
    }

    /**
     * @covers \ElasticCloudHelperTest::parse
     */
    public function testCloudIdParseExceptionWithMissingClusterName()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudHelper(':bar');
    }

    /**
     * @covers \ElasticCloudHelperTest::parse
     */
    public function testCloudIdParseExceptionWithInvalidHostPart()
    {
        $cloudId = sprintf('name:%s', base64_encode('invalid-format'));

        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudHelper($cloudId);
    }

}
