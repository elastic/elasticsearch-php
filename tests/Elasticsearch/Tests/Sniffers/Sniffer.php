<?php

namespace Elasticsearch\Tests\Sniffers;
use Elasticsearch;

/**
 * Class ConnectionPool
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests/Sniffers
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class Sniffer extends \PHPUnit_Framework_TestCase
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

    }//end testParser()

}//end class