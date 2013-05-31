<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Node;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Shutdown
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Shutdown extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.node.shutdown": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-nodes-shutdown/",
    "methods": ["POST"],
    "url": {
      "path": "/_shutdown",
      "paths": ["/_shutdown", "/_cluster/nodes/_shutdown", "/_cluster/nodes/{nodeId}/_shutdown"],
      "parts": {
        "nodeId": {
          "type" : "list",
          "description" : "A comma-separated list of node IDs or names to perform the operation on; use `_local` to perform the operation on the node you're connected to, leave empty to perform the operation on all nodes"
        }
      },
      "params": {
        "delay": {
          "type" : "time",
          "description" : "Set the delay for the operation (default: 1s)"
        },
        "exit": {
          "type" : "boolean",
          "description" : "Exit the JVM as well (default: true)"
        }
      }
    },
    "body": null
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $uri   = '/_shutdown';
        $nodeId = $this->nodeId;

        if (isset($nodeId) === true) {
            $uri = "/_cluster/nodes/_shutdown";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'delay',
            'exit',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'POST';
    }
}