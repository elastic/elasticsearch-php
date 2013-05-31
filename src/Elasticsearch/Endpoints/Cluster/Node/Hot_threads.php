<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Node;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Hot_Threads
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Hot_Threads extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.node.hot_threads": {
    "documentation": "http://www.elasticsearch.org/guide/reference/api/admin-cluster-nodes-hot-threads/",
    "methods": ["GET"],
    "url": {
      "path": "/_cluster/nodes/hot_threads",
      "paths": ["/_cluster/nodes/hotthreads", "/_cluster/nodes/hot_threads", "/_cluster/nodes/{nodeId}/hotthreads", "/_cluster/nodes/{nodeId}/hot_threads", "/_nodes/hotthreads", "/_nodes/hot_threads", "/_nodes/{nodeId}/hotthreads", "/_nodes/{nodeId}/hot_threads"],
      "parts": {
        "nodeId": {
          "type" : "list",
          "description" : "A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes"
        }
      },
      "params": {
        "interval": {
          "type" : "time",
          "description" : "The interval for the second sampling of threads"
        },
        "snapshots": {
          "type" : "string",
          "description" : "TODO: ?"
        },
        "threads": {
          "type" : "number",
          "description" : "Specify the number of threads to provide information for (default: 3)"
        },
        "type": {
          "type" : "enum",
          "options" : ["cpu", "wait", "block"],
          "description" : "The type to sample (default: cpu)"
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

        $uri   = '/_cluster/nodes/hot_threads';
        $nodeId = $this->nodeId;

        if (isset($nodeId) === true) {
            $uri = "/_cluster/nodes/hot_threads";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'interval',
            'snapshots',
            'threads',
            'type',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}