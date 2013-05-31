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
 * Class Stats
 * @package Elasticsearch\Endpoints\Cluster\Node
 */
class Stats extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "cluster.node.stats": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-cluster-nodes-stats/",
    "methods": ["GET"],
    "url": {
      "path": "/_cluster/nodes/stats",
      "paths": [
        "/_cluster/nodes/stats",
        "/_cluster/nodes/{nodeId}/stats",
        "/_nodes/stats",
        "/_nodes/{nodeId}/stats",
        "/_nodes/stats/{metric_family}",
        "/_nodes/{nodeId}/stats/{metric_family}",
        "/_nodes/{metric_family}/stats",
        "/_nodes/{nodeId}/{metric_family}/stats",
        "/_nodes/stats/indices/{metric}/{fields}",
        "/_nodes/{nodeId}/stats/indices/{metric}/{fields}",
        "/_nodes/indices/{metric}/{fields}/stats",
        "/_nodes/{nodeId}/indices/{metric}/{fields}/stats"
      ],
      "parts": {
        "fields" : {
          "type" : "list",
          "description" : "A comma-separated list of fields to return detailed information for, when returning the `indices` metric family (supports wildcards)"
        },
        "metric_family" : {
          "type" : "enum",
          "values" : ["all","fs","http","indices","jvm","network","os","process","thread_pool","transport"],
          "description" : "Limit the information returned to a certain metric family"
        },
        "metric" : {
          "type" : "enum",
          "values" : ["docs", "fielddata", "filter_cache", "flush", "get", "id_cache", "indexing", "merges", "refresh", "search", "store", "warmer"],
          "description" : "Limit the information returned for `indices` family to a specific metric"
        },
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
          "description" : "Reset the default level of detail"
        },
        "fields": {
          "type" : "list",
          "description" : "A comma-separated list of fields for `fielddata` metric (supports wildcards)"
        },
        "fs": {
          "type" : "boolean",
          "description" : "Return information about the filesystem"
        },
        "http": {
          "type" : "boolean",
          "description" : "Return information about HTTP"
        },
        "indices": {
          "type" : "boolean",
          "description" : "Return information about indices"
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
        "process": {
          "type" : "boolean",
          "description" : "Return information about the Elasticsearch process"
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

        $fields = $this->fields;
        $metric_family = $this->metric_family;
        $metric = $this->metric;
        $nodeId = $this->nodeId;
        $uri   = "/_cluster/nodes/stats";

        if (isset($fields) === true) {
            $uri = "/_cluster/nodes/$nodeId/stats";
        } elseif (isset($metric_family) === true && isset($fields) === true) {
            $uri = "/_nodes/stats";
        }
 elseif (isset($metric) === true && isset($metric_family) === true && isset($fields) === true) {
            $uri = "/_nodes/$nodeId/stats";
        }
 elseif (isset($nodeId) === true && isset($metric) === true && isset($metric_family) === true && isset($fields) === true) {
            $uri = "/_nodes/stats/$metric_family";
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
            'fields',
            'fs',
            'http',
            'indices',
            'jvm',
            'network',
            'os',
            'process',
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