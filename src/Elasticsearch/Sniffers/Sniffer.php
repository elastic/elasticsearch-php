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
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {

    }//end __construct()


    /**
     * Returns an array of host:ports derived from the provided NodeInfo
     *
     * @return array
     */
    public function parseNodes($transportSchema, $nodeInfo)
    {


    }//end parseNodes()

}//end class