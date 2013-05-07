<?php

namespace Elasticsearch\Tests\Sniffers;
use Elasticsearch;

/**
 * Class SnifferTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/Sniffers
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class SnifferTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Cluster state with one host
     *
     * @covers Sniffer::parseNodes
     *
     * @return void
     */
    public function testParserOneHost()
    {
        $nodeInfo = array ( 'ok' => true, 'cluster_name' => 'elasticsearch_zach', 'nodes' => array ( 'pDXSdoudTcmLY1D2F3ks_A' => array ( 'name' => 'Magilla', 'transport_address' => 'inet[/192.168.1.119:9300]', 'hostname' => 'zach-ThinkPad-W530', 'version' => '0.20.5', 'http_address' => 'inet[/192.168.1.119:9200]', ), ), );

        $sniffer = new Elasticsearch\Sniffers\Sniffer();
        $hosts   = $sniffer->parseNodes('http', $nodeInfo);

        $expected = array(
                     array(
                      'host' => '192.168.1.119',
                      'port' => 9200,
                     ),
                    );
        $this->assertEquals($expected, $hosts);

    }//end testParserOneHost()


    /**
     * Cluster state with multiple host
     *
     * @covers Sniffer::parseNodes
     *
     * @return void
     */
    public function testParserMultipleHost()
    {
        $hosts = array();
        for ($i = 0; $i < 10; ++$i) {
            $hosts['node_name_'.$i] = array ( 'name' => 'Magilla', 'transport_address' => 'inet[/192.168.1.119:9300]', 'hostname' => 'zach-ThinkPad-W530', 'version' => '0.20.5', 'http_address' => 'inet[/192.168.1.119:9200]', );

            $expected[] = array(
                           'host' => '192.168.1.119',
                           'port' => 9200,
                          );
        }

        $nodeInfo = array ( 'ok' => true, 'cluster_name' => 'elasticsearch_zach', 'nodes' => $hosts, );

        $sniffer = new Elasticsearch\Sniffers\Sniffer();
        $hosts   = $sniffer->parseNodes('http', $nodeInfo);

        $this->assertEquals($expected, $hosts);

    }//end testParserMultipleHost()

}//end class