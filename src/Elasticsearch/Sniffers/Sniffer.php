<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:16 AM
 */

namespace Elasticsearch\Sniffers;

use Elasticsearch\Transport;

/**
 * Class Sniffer
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class Sniffer
{


    /**
     * Returns an array of host:ports derived from the provided NodeInfo
     *
     * @param string $transportSchema The type of transport
     * @param array  $nodeInfo        Array of Node Info returned
     *                                from Cluster State API
     *
     * @return array
     */
    public function parseNodes($transportSchema, $nodeInfo)
    {
        $pattern       = '/\/([^:]*):([0-9]+)\]/';
        $schemaAddress = $transportSchema.'_address';
        $hosts = array();

        foreach ($nodeInfo['nodes'] as $node) {
            if (isset($node[$schemaAddress]) === true) {
                if (preg_match($pattern, $node[$schemaAddress], $match) === 1) {
                    $hosts[] = array(
                                'host' => $match[1],
                                'port' => (int) $match[2],
                               );
                }
            }
        }

        return $hosts;

    }//end parseNodes()


}//end class