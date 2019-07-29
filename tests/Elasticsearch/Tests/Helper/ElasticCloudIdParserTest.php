<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Tests\Helper;

use Elasticsearch\Helper\ElasticCloudIdParser;
use Elasticsearch\Common\Exceptions\ElasticCloudIdParseException;

/**
 * Class ElasticCloudIdParserTest
 *
 * @package Elasticsearch\Tests\Helper
 * @author  Philip Krauss <philip.krauss@elastic.co>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    https://elastic.co
 */
class ElasticCloudIdParserTest extends \PHPUnit\Framework\TestCase
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
     * @dataProvider cloudIdsProvider
     * 
     * @covers ElasticCloudIdParser::parse
     * @covers ElasticCloudIdParser::getCloudId
     * @covers ElasticCloudIdParser::getClusterName
     * @covers ElasticCloudIdParser::getClusterDns
     */
    public function testElasticCloudParserAndAccessors($name, $domain, $uuids)
    {
        $cloudId = sprintf('%s:%s', $name, base64_encode(sprintf('%s$%s', $domain, $uuids)));
        $dns     = sprintf('elasticsearch.%s', $domain);

        $cloud = new ElasticCloudIdParser($cloudId);

        $this->assertEquals($cloud->getCloudId(), $cloudId);
        $this->assertEquals($cloud->getClusterName(), $name);
        $this->assertEquals($cloud->getClusterDns(), $dns);
    }

    /**
     * @covers ElasticCloudIdParser::parse
     */
    public function testCloudIdParseExceptionWithMissingCloudId()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudIdParser('');
    }

    /**
     * @covers ElasticCloudIdParser::parse
     */
    public function testCloudIdParseExceptionWithMissingHostPart()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudIdParser('foo:');
    }

    /**
     * @covers ElasticCloudIdParser::parse
     */
    public function testCloudIdParseExceptionWithMissingClusterName()
    {
        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudIdParser(':bar');
    }

    /**
     * @covers ElasticCloudIdParser::parse
     */
    public function testCloudIdParseExceptionWithInvalidHostPart()
    {
        $cloudId = sprintf('name:%s', base64_encode('invalid-format'));

        $this->expectException(ElasticCloudIdParseException::class);
        $cloud = new ElasticCloudIdParser($cloudId);
    }

}
