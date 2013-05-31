<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 15:31:18 pm
 */

namespace Elasticsearch\Endpoints\Cluster;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class State
 * @package Elasticsearch\Endpoints\Cluster
 */
class State extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.state": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-state/",
    "methods": ["GET"],
    "url": {
      "path": "/_cluster/state",
      "paths": ["/_cluster/state"],
      "parts": {
      },
      "params": {
        "filter_blocks": {
          "type" : "boolean",
          "description" : "Do not return information about blocks"
        },
        "filter_index_templates": {
          "type" : "boolean",
          "description" : "Do not return information about index templates"
        },
        "filter_indices": {
          "type" : "list",
          "description" : "Limit returned metadata information to specific indices"
        },
        "filter_metadata": {
          "type" : "boolean",
          "description" : "Do not return information about indices metadata"
        },
        "filter_nodes": {
          "type" : "boolean",
          "description" : "Do not return information about nodes"
        },
        "filter_routing_table": {
          "type" : "boolean",
          "description" : "Do not return information about shard allocation (`routing_table` and `routing_nodes`)"
        },
        "local": {
          "type" : "boolean",
          "description" : "Return local information, do not retrieve the state from master node (default: false)"
        },
        "master_timeout": {
          "type" : "time",
          "description" : "Specify timeout for connection to master"
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

        $uri   = '/_cluster/state';

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'filter_blocks',
            'filter_index_templates',
            'filter_indices',
            'filter_metadata',
            'filter_nodes',
            'filter_routing_table',
            'local',
            'master_timeout',
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