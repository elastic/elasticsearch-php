<?php
/**
 * User: zach
 * Date: 5/6/13
 * Time: 11:16 AM
 */

namespace Elasticsearch\Sniffers;

use Elasticsearch\Transport;

/**
 * Class HostListConstructor
 *
 * @category Elasticsearch
 * @package  Elasticsearch
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class HostListConstructor
{

    /**
     * @var Transport
     */
    private $transport;


    /**
     * Constructor
     *
     * @param Transport $transport Transport class, so
     *                             that the schema can be determined
     *
     * @return \Elasticsearch\Sniffers\HostListConstructor
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;

    }//end __construct()


    /**
     * Returns an array of host:ports derived from sniffing the Cluster API
     *
     * @param array $nodeInfo Array of Node Info from the API
     *
     * @return array
     */
    public function getHosts($nodeInfo)
    {

    }//end getHosts()

}//end class