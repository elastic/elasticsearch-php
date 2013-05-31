<?php
/**
 * User: zach
 * Date: 5/24/13
 * Time: 3:05 PM
 */

namespace Elasticsearch\Sniffers;

use Elasticsearch\Transport;

/**
 * Class AbstractSniffer
 *
 * @package Elasticsearch\Sniffers
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
abstract class AbstractSniffer
{

    /**
     * @var Transport
     */
    protected $transport;


    /**
     * Constructor
     *
     * @param Transport $transport Transport object
     *
     * @return \Elasticsearch\Sniffers\AbstractSniffer
     */
    public function __construct($transport)
    {
        $this->transport = $transport;

    }


    /**
     * Parse the node list
     * Abstract function that all children must provide
     *
     * @param string $transportSchema The transport schema (http, etc)
     * @param array  $nodeInfo        Node information returned from ES
     *
     * @return array
     */
    abstract public function parseNodes($transportSchema, $nodeInfo);


    /**
     * Sniff the cluster metadata
     *
     * @param string $transportSchema The transport schema (http, etc)
     *
     * @return array
     */
    public function sniff($transportSchema)
    {
        // We need the node count in case we need to try all of them.
        $nodeCount = count($this->transport->getAllConnections());
        $nodeInfo  = $this->transport->performRequest(
            'GET',
            '/_cluster/nodes',
            null,
            null,
            $nodeCount
        );
        $hosts     = $this->parseNodes($transportSchema, $nodeInfo);

        return $hosts;

    }


}//end class