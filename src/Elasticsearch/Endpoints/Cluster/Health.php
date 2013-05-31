<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:17 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Health
 * @package Elasticsearch\Endpoints\Cluster
 */
class Health extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.health": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-health/",
    "methods": ["GET"],
    "url": {
      "path": "/_cluster/health",
      "paths": ["/_cluster/health", "/_cluster/health/{index}"],
      "parts": {
        "index": {
          "type" : "string",
          "description" : "Limit the information returned to a specific index"
        }
      },
      "params": {
        "level": {
          "type" : "enum",
          "options" : ["cluster","indices","shards"],
          "default" : "cluster",
          "description" : "Specify the level of detail for returned information"
        },
        "local": {
          "type" : "boolean",
          "description" : "Return local information, do not retrieve the state from master node (default: false)"
        },
        "master_timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout for connection to master node"
        },
        "timeout": {
          "type" : "time",
          "description" : "Explicit operation timeout"
        },
        "wait_for_active_shards": {
          "type" : "number",
          "description" : "Wait until the specified number of shards is active"
        },
        "wait_for_nodes": {
          "type" : "number",
          "description" : "Wait until the specified number of nodes is available"
        },
        "wait_for_relocating_shards": {
          "type" : "number",
          "description" : "Wait until the specified number of relocating shards is finished"
        },
        "wait_for_status": {
          "type" : "enum",
          "options" : ["green","yellow","red"],
          "default" : null,
          "description" : "Wait until cluster is in a specific state"
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

        $uri   = '/_cluster/health';
        $index = $this->index;

        if (isset($index) === true) {
            $uri = "/_cluster/health/$index";
        }
        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'level',
            'local',
            'master_timeout',
            'timeout',
            'wait_for_active_shards',
            'wait_for_nodes',
            'wait_for_relocating_shards',
            'wait_for_status',
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