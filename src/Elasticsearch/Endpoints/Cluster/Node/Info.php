<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Cluster\Node;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Info
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Info extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.node.info": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-nodes-info/",
    "methods": ["GET"],
    "url": {
      "path": "/_cluster/nodes",
      "paths": ["/_cluster/nodes", "/_cluster/nodes/{nodeId}", "/_nodes", "/_nodes/{nodeId}", "/_nodes/settings", "/_nodes/{nodeId}/settings", "/_nodes/os", "/_nodes/{nodeId}/os", "/_nodes/process", "/_nodes/{nodeId}/process", "/_nodes/jvm", "/_nodes/{nodeId}/jvm", "/_nodes/thread_pool", "/_nodes/{nodeId}/thread_pool", "/_nodes/network", "/_nodes/{nodeId}/network", "/_nodes/transport", "/_nodes/{nodeId}/transport", "/_nodes/http", "/_nodes/{nodeId}/http", "/_nodes/plugin", "/_nodes/{nodeId}/plugin"],
      "parts": {
        "nodeId": {
          "type" : "list",
          "description" : "A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes"
        }
      },
      "params": {
        "all": {
          "type" : "boolean",
          "description" : "Return all available information"
        },
        "clear": {
          "type" : "boolean",
          "description" : "Reset the default settings"
        },
        "http": {
          "type" : "boolean",
          "description" : "Return information about HTTP"
        },
        "jvm": {
          "type" : "boolean",
          "description" : "Return information about the JVM"
        },
        "network": {
          "type" : "boolean",
          "description" : "Return information about network"
        },
        "os": {
          "type" : "boolean",
          "description" : "Return information about the operating system"
        },
        "plugin": {
          "type" : "boolean",
          "description" : "Return information about plugins"
        },
        "process": {
          "type" : "boolean",
          "description" : "Return information about the Elasticsearch process"
        },
        "settings": {
          "type" : "boolean",
          "description" : "Return information about node settings"
        },
        "thread_pool": {
          "type" : "boolean",
          "description" : "Return information about the thread pool"
        },
        "transport": {
          "type" : "boolean",
          "description" : "Return information about transport"
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

        $nodeId = $this->nodeId;
        $uri   = "/_cluster/nodes";

        if (isset($nodeId) === true) {
            $uri = "/_cluster/nodes/$nodeId";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'all',
            'clear',
            'http',
            'jvm',
            'network',
            'os',
            'plugin',
            'process',
            'settings',
            'thread_pool',
            'transport',
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